<?php

namespace DataQuest\Translator\Repository;

use DataQuest\Translator\Entity\Course as CourseEntity;
use DataQuest\Translator\Entity\Institute as InstituteEntity;

interface Course {

    public function store();

    /**
     * @return CourseEntity
     */
    public function create($id, $germanName, $start, $duration, InstituteEntity $institute);

    public function getUniqueId();

    public function add(CourseEntity $course);

    /**
     * @return CourseEntity[]
     */
    public function findAll();

    /**
     * @return CourseEntity|null
     */
    public function findById($courseId);

    public function setCourseName($coursename);

    public function setInstituteName($instituteName);

    public function setSemesterName($semesterName);

    public function setNotTranslated($notTranslated);

    /**
     * @return CourseEntity[]
     */
    public function findAllByCreteria();
    public function findByName($courseName);
}
