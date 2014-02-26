<?php

namespace DataQuest\Translator\Delivery\Repository;

use DataQuest\Translator\Entity\Course;
use DataQuest\Translator\Entity\Institute;
use DataQuest\Translator\Entity\Semester;
use DataQuest\Translator\Repository\Course as CourseRepository;
use DateTime;
use PDO;
use PDOException;
use stdClass;

class PDOCourse implements CourseRepository {

    private $db;
    private $courseName;
    private $instituteName;
    private $semesterName;
    private $notTranslated;
    private $courses   = array();
    private $datafieldId;
    private $status;
    private $baseQuery = 'SELECT DISTINCT s.Seminar_id as courseId,s.Name as germanCourseName,de.content as englishCourseName,s.start_time as courseBegin,s.duration_time as courseDuration,i.Institut_id as instituteId,i.Name as instituteName,semester_id as semesterId,sd.name as semesterName,sd.beginn as semesterStart,sd.ende as semesterEnd 
             FROM seminare s INNER JOIN Institute i USING(Institut_id) 
             LEFT JOIN semester_data sd ON
            (
                (s.start_time >= sd.beginn AND (s.start_time + s.duration_time <= sd.ende) AND s.duration_time = 0 AND s.duration_time <> -1)
                OR (s.duration_time <> 0 AND s.duration_time <> -1 AND (s.start_time + s.duration_time) = sd.beginn)
                OR (s.duration_time = -1 AND s.duration_time <> 0)
           ) 
            LEFT JOIN datafields_entries de ON (de.range_id = s.Seminar_id AND de.datafield_id = "%s")';
    private $modified  = array();

    private function createSemester($id, $name, $start, $end) {
        $semesterStart = new DateTime;
        $semesterStart->setTimestamp($start);
        $semesterEnd   = new DateTime;
        $semesterEnd->setTimestamp($end);
        return new Semester($id, $name, $semesterStart, $semesterEnd);
    }

    private function createInstitute($id, $name) {
        return new Institute($id, $name);
    }

    private function rowToEntity(stdClass $row) {

        $semester = $this->createSemester($row->semesterId, $row->semesterName, $row->semesterStart, $row->semesterEnd);

        $institute = $this->createInstitute($row->instituteId, $row->instituteName);
        $course    = $this->findById($row->courseId);

        if (!$course) {
            $course = $this->create($row->courseId, $row->germanCourseName, $row->courseBegin, $row->courseDuration, $institute);
        }
        $course->setEnglishName($row->englishCourseName);
        $course->addSemester($semester);

        return $course;
    }

    private function loadCourses() {
        $criteria       = array('s.status = :status');
        
        $parameters     = array(':status'=>$this->status);
        $queryExtension = '';
        if ($this->courseName) {
            $criteria[]                = 's.Name LIKE :courseName OR de.content LIKE :courseName';
            $parameters[':courseName'] = '%' . $this->courseName . '%';
        }
        if ($this->instituteName) {
            $criteria[]                   = 'i.Name LIKE :instituteName';
            $parameters[':instituteName'] = '%' . $this->instituteName . '%';
        }
        if ($this->semesterName) {
            $criteria[]                  = 'sd.name LIKE :semesterName';
            $parameters[':semesterName'] = '%' . $this->semesterName . '%';
        }
        if ($this->notTranslated) {
            $criteria[] = "de.content IS NULL";
        }
        if (count($criteria) > 0) {
            $queryExtension .= ' WHERE ' . implode(' AND ', $criteria);
        }

        $query = $this->baseQuery . $queryExtension. ' ORDER BY s.Name';
        
        $result = array();
        try {
            $statement = $this->db->prepare($query);
            $statement->execute($parameters);
            $result    = $statement->fetchAll(PDO::FETCH_OBJ);
                
        } catch (PDOException $ex) {
            var_dump($ex);
        }

        foreach ($result as $row) {
            $course = $this->rowToEntity($row);
            $this->add($course);
        }
    }

    private function removeUnusedDatafields() {
        $sql      = "DELETE FROM datafields_entries WHERE datafield_id=:datafieldId AND (content IS NULL OR content = '')";
        $statment = $this->db->prepare($sql);
        $statment->execute(array(':datafieldId' => $this->datafieldId));
    }

    public function __construct(PDO $db, $datafieldId,$status) {
        $this->db          = $db;
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->datafieldId = $datafieldId;
        $this->baseQuery   = sprintf($this->baseQuery, $this->datafieldId);
        $this->status = $status;
    }

    public function add(Course $course) {
        if (isset($this->courses[$course->getId()]) && $this->courses[$course->getId()] === $course) {
            $this->modified[] = $course->getId();
        }
        $this->courses[$course->getId()] = $course;
    }

    public function create($id, $germanName, $start, $duration, Institute $institute) {
        $startDate = new DateTime;
        $startDate->setTimestamp($start);
        $course    = new Course($id, $germanName, $startDate, $duration, $institute);

        return $course;
    }

    public function findAll() {
        
    }

    public function findAllByCreteria() {

        $this->loadCourses();
    
        return $this->courses;
    }

    public function findById($courseId) {

        if (!isset($this->courses[$courseId])) {
            return null;
        }
        return $this->courses[$courseId];
    }

    public function getUniqueId() {
        return $this->seminar->getUniqueId();
    }

    public function setCourseName($courseName) {
        $this->courseName = $courseName;
    }

    public function setInstituteName($instituteName) {
        $this->instituteName = $instituteName;
    }

    public function setSemesterName($semesterName) {
        $this->semesterName = $semesterName;
    }

    public function setNotTranslated($notTranslated) {
        $this->notTranslated = $notTranslated;
    }

    public function store() {
        $query = "REPLACE INTO datafields_entries (datafield_id,range_id,content,mkdate,chdate) VALUES(:datafieldId,:seminarId,:englishName,:timestamp,:timestamp)";

        $statment = $this->db->prepare($query);
        foreach ($this->modified as $id) {
            if (isset($this->courses[$id])) {
                $course = $this->courses[$id];
                $statment->execute(array(
                    ':englishName' => $course->getEnglishName(),
                    ':seminarId'   => $course->getId(),
                    ':datafieldId' => $this->datafieldId,
                    ':timestamp'   => time()
                ));
            }
        }
        $this->removeUnusedDatafields();
    }

}
