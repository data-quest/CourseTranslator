<?php

namespace DataQuest\Translator\Request;

class ViewCourses {

    private $semesterName;
    private $instituteName;
    private $courseName;
    private $notTranslated = false;

    public function getCourseName() {
        return $this->courseName;
    }

    public function getNotTranslated() {
        return $this->notTranslated;
    }

    public function setNotTranslated($notTranslated) {
        $this->notTranslated = $notTranslated;
    }

    public function setCourseName($courseName) {
        $this->courseName = $courseName;
    }

    public function getInstituteName() {
        return $this->instituteName;
    }

    public function setInstituteName($instituteName) {
        $this->instituteName = $instituteName;
    }

    public function getSemesterName() {
        return $this->semesterName;
    }

    public function setSemesterName($semesterName) {
        $this->semesterName = $semesterName;
    }

}
