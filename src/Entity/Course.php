<?php

namespace DataQuest\Translator\Entity;

use DataQuest\Translator\Entity\Institute;
use DataQuest\Translator\Entity\Semester;
use DateTime;
/**
 * Course Entity
 */
class Course {

    private $id;
    private $germanName;
    private $englishName;
    private $duration;

    /**
     * @var Semester[] 
     */
    private $semester = array();
    private $start;

    /**
     * @var Institute 
     */
    private $institute;

    function __construct($id, $germanName, DateTime $start, $duration, Institute $institute) {
        $this->id         = $id;
        $this->germanName = $germanName;
        $this->start      = $start;
        $this->institute  = $institute;
        $this->duration   = $duration;
    }

    public function addSemester(Semester $semester) {
        $this->semester[$semester->getId()] = $semester;
    }

    public function getDuration() {

        return $this->duration;
    }

    public function setEnglishName($englishName) {
        $this->englishName = $englishName;
    }

    public function getId() {
        return $this->id;
    }

    public function getGermanName() {
        return $this->germanName;
    }

    public function getEnglishName() {
        return $this->englishName;
    }

    public function getStart() {
        return $this->start;
    }

    /**
     * @return Semester[]
     */
    public function getSemester() {
        return $this->semester;
    }

    /**
     * @return Institute
     */
    public function getInstitute() {
        return $this->institute;
    }

    public function hasSemesterName($semesterName) {
        foreach ($this->semester as $semester) {
            if ($semester->getName() === $semesterName)
                return true;
        }
        return false;
    }

    public function hasCourseName($courseName) {
        return stristr($this->germanName, $courseName) || stristr($this->englishName, $courseName);
    }
    public function hasEmptyEnglishName(){
        return empty($this->englishName);
    }
}
