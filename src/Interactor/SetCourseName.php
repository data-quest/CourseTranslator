<?php

namespace DataQuest\Translator\Interactor;

use DataQuest\Translator\Repository\Course as CourseRepository;
use DataQuest\Translator\Request\SetCourseName as SetCourseNameRequest;
use DataQuest\Translator\Response\SetCourseName as SetCourseNameResponse;
use DataQuest\Translator\Service\Suggestor;
use DataQuest\Translator\View\Course as CourseView;

/**
 * SetCourseName
 * Find a course from repository, sets the englishname from request. If englishname is not set, suggest a name by suggestor
 */
class SetCourseName {

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
     * @param SetCourseNameRequest $request
     * @return SetCourseNameResponse
     */
    public function process(SetCourseNameRequest $request) {
        $response    = new SetCourseNameResponse;
        $courseId    = $request->getCourseId();
        $englishName = $request->getEnglishName();

        if (empty($englishName)) {
            $englishName = $this->suggestor->suggestEnglishName($courseId);
        }

        $course           = $this->courseRepository->findById($courseId);
        $course->setEnglishName($englishName);
        $this->courseRepository->add($course);
        $response->course = new CourseView($course);
        return $response;
    }

}
