<?php

namespace DataQuest\Translator\Interactor;

use DataQuest\Translator\Repository\Course as CourseRepository;
use DataQuest\Translator\Request\ViewCourses as ViewCoursesRequest;
use DataQuest\Translator\Response\ViewCourses as ViewCoursesResponse;
use DataQuest\Translator\Service\Suggestor;
use DataQuest\Translator\View\Course as CourseView;

class ViewCourses {
    /**
     * @var CourseRepository
     */
    private $courseRepository;
    /**
     * @var Suggestor 
     */
    private $suggestor;
    /**
     * @param CourseRepository $courseRepository
     * @param Suggestor $suggestor
     */
    function __construct(CourseRepository $courseRepository, Suggestor $suggestor) {
        $this->courseRepository = $courseRepository;
        $this->suggestor        = $suggestor;
    }

    /**
     * @param ViewCoursesRequest $request
     * @return ViewCoursesResponse
     */
    public function process(ViewCoursesRequest $request) {
        $response = new ViewCoursesResponse;

        $this->courseRepository->setCourseName($request->getCourseName());
        $this->courseRepository->setInstituteName($request->getInstituteName());
        $this->courseRepository->setSemesterName($request->getSemesterName());
        $this->courseRepository->setNotTranslated($request->getNotTranslated());
        $courses = $this->courseRepository->findAllByCreteria();

        foreach ($courses as $course) {
            $courseView = new CourseView($course);
            if (!$course->getEnglishName()) {
                $courseView->englishName = $this->suggestor->suggestEnglishName($course->getId());
            }
            $response->courses[$course->getId()] = $courseView;
        }
        return $response;
    }

}
