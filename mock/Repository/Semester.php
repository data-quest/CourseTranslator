<?php

namespace DataQuest\Mock\Repository;

use DataQuest\Translator\Entity\Semester as SemesterEntity;
use DataQuest\Translator\Repository\Semester as SemesterRepository;
use DateTime;

class Semester implements SemesterRepository {

    /**
     * @var SemesterEntity[] 
     */
    private $semester = array();

    public function add(SemesterEntity $semster) {
        $this->semester[$semster->getId()] = $semster;
    }

    public function create($id, $name, DateTime $start, DateTime $end) {
        return new SemesterEntity($id, $name, $start, $end);
    }

    public function findAll() {
        return $this->semester;
    }

    public function findById($semesterId) {
        return isset($this->semester[$semesterId]) ? $this->semester[$semesterId] : null;
    }

    public function findByName($semesterName) {
        foreach ($this->semester as $semester) {
            if ($semester->getName() === $semesterName)
                return $semester;
        }
        return null;
    }
    public function getUniqueId() {
        $countSemester = count($this->semester);
        $countSemester++;
        return $countSemester;
    }
}
