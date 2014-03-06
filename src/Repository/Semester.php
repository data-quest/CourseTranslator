<?php

namespace DataQuest\Translator\Repository;

use DataQuest\Translator\Entity\Semester as SemesterEntity;
use DateTime;

interface Semester {

    public function add(SemesterEntity $semster);

    /**
     * @return SemesterEntity[]
     */
    public function findAll();

    /**
     * @return SemesterEntity
     */
    public function create($id, $name, DateTime $start, DateTime $end);

    /**
     * @return SemesterEntity|null
     */
    public function findById($semesterId);

    /**
     * @return SemesterEntity|null
     */
    public function findByName($semesterName);
    public function getUniqueId();
}
