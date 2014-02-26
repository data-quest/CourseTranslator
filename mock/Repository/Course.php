<?php

namespace DataQuest\Mock\Repository;

use DataQuest\Translator\Entity\Course as CourseEntity;
use DataQuest\Translator\Entity\Institute;
use DataQuest\Translator\Repository\Course as CourseRepository;
use Exception;

class Course implements CourseRepository {

    /**
     * @var CourseEntity[] 
     */
    private $courses       = array();
    private $courseName    = null;
    private $instituteName = null;
    private $semesterName  = null;
    private $notTranslated = false;
    public function add(CourseEntity $course) {
        $this->courses[$course->getId()] = $course;
    }

    /**
     * @return CourseEntity[]
     */
    public function findAll() {
        return $this->courses;
    }

    public function store() {
        
    }

    public function create($id, $germanName, $start, $duration, Institute $institute) {
        return new CourseEntity($id, $germanName, $start, $duration, $institute);
    }
    public function getUniqueId() {
        
    }

    public function findById($courseId) {
        if (!isset($this->courses[$courseId])) {
            throw new Exception(sprintf('CourseID "%s" not found in %s', $courseId, get_called_class()));
        }
        return $this->courses[$courseId];
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
    public function findAllByCreteria() {
        if (!$this->courseName && !$this->instituteName && !$this->semesterName && !$this->notTranslated) {
            return $this->courses;
        }

        $found               = array();
        $foundByCourseName   = array();
        $foundByInsituteName = array();
        $foundBySemesterName = array();
        $foundNotTranslated  = array();
        foreach ($this->courses as $course) {
            if ($this->courseName && $course->hasCourseName($this->courseName)) {
                $foundByCourseName[$course->getId()] = $course;
                $found[$course->getId()]             = $course;
            }
            if ($this->instituteName && $course->getInstitute()->getName() === $this->instituteName) {
                $foundByInsituteName[$course->getId()] = $course;
                $found[$course->getId()]               = $course;
            }
            if ($this->semesterName && $course->hasSemesterName($this->semesterName)) {
                $foundBySemesterName[$course->getId()] = $course;
                $found[$course->getId()]               = $course;
            }
            if ($this->notTranslated && $course->hasEmptyEnglishName()) {
                $foundNotTranslated[$course->getId()] = $course;
                $found[$course->getId()]              = $course;
            }
        }
        if ($this->courseName) {
            $found = array_intersect_key($foundByCourseName, $found);
        }
        if ($this->instituteName) {
            $found = array_intersect_key($foundByInsituteName, $found);
        }
        if ($this->semesterName) {
            $found = array_intersect_key($foundBySemesterName, $found);
        }
        if ($this->notTranslated) {
            $found = array_intersect_key($foundNotTranslated, $found);
        }

        return $found;
    }

}
