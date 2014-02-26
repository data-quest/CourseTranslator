<?php

use DataQuest\Translator\Repository\Course as CourseRepository;
use DataQuest\Translator\Repository\Institute as InstituteRepository;
use DataQuest\Translator\Repository\Semester as SemesterRepository;

class CourseHelper {

    private $courseRepository;
    private $semesterRepository;
    private $instituteRepository;
    private $selectedCourseName;
    private $notTranslated = false;
    public function __construct(CourseRepository $courseRepository, SemesterRepository $semesterRepository, InstituteRepository $instituteRepository) {
        $this->courseRepository    = $courseRepository;
        $this->semesterRepository  = $semesterRepository;
        $this->instituteRepository = $instituteRepository;
    }

    public function createDummyCourse($id, $germanName, $englishName, $courseStart, $courseDuration, $semesterId, $instituteId) {
        try {
            $course = $this->courseRepository->findById($id);
        } catch (Exception $ex) {
            $startDate = new DateTime;
            $startDate->setTimestamp($courseStart);
            $institute = $this->instituteRepository->findById($instituteId);

            $course = $this->courseRepository->create($id, $germanName, $startDate,$courseDuration, $institute);
         
            $course->setEnglishName($englishName);
        }


        $semester = $this->semesterRepository->findById($semesterId);

        $course->addSemester($semester);
        $this->courseRepository->add($course);
    }
        public function getSelectedCourseName() {
        return $this->selectedCourseName;
    }

    public function setSelectedCourseName($selectedCourseName) {
        $this->selectedCourseName = $selectedCourseName;
    }
    public function getNotTranslated() {
        return $this->notTranslated;
    }

    public function setNotTranslated($notTranslated) {
        $this->notTranslated = $notTranslated;
    }



}
