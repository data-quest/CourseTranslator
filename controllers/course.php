<?php

/**
 * Description of Course
 *
 * @author Witali
 */
require_once __DIR__ . '/index.php';
require_once 'lib/classes/Institute.class.php';

use DataQuest\Translator\Request\ViewCourses as ViewCoursesRequest,
    DataQuest\Translator\Request\SetCourseName as SetCourseNameRequest;
use DataQuest\Translator\Interactor\ViewCourses as ViewCoursesInteractor,
    DataQuest\Translator\Interactor\SetCourseName as SetCourseNameInteractor;
use DataQuest\Translator\Delivery\Repository\PDOCourse as CourseRepository;
use DataQuest\Translator\Delivery\Service\FuzzySuggestor;

class CourseController extends IndexController {

    protected $courseRepository;
    protected $suggestor;
    protected $renderer;
    protected $selectedInstituteName;
    protected $selectedCourseName;
    protected $selectedSemesterName;
    protected $selectedNotTranslated;

    public function before_filter(&$action, &$args) {
        parent::before_filter($action, $args);
        $dbManager              = DBManager::get();
        $this->courseRepository = new CourseRepository($dbManager, $this->config['datafieldId'],$this->config['courseStatus']);
        $this->suggestor        = new FuzzySuggestor();
        $this->renderer         = new Flexi_TemplateFactory($this->config['templatePath']);
        $this->setRequest();
        $this->addToInfobox(_('Suche:'), $this->getFilter());
    }

    private function setRequest() {
        $this->selectedCourseName    = Request::get('courseName');
        $this->selectedInstituteName = Request::get('instituteName');
        $this->selectedSemesterName  = Request::get('semesterName', $this->config['defaultSemesterName']);
        $this->selectedNotTranslated = (bool) Request::get('notTranslated');
    }

    private function getFilter() {
        $institions = Institute::getInstitutes();
        array_unshift($institions, array('Name' => $this->config['emptyInstituteName'], 'is_fak' => 0, 'Institut_id' => 'null'));

        $semester = array_reverse(SemesterData::getAllSemesterData());
        array_unshift($semester, array('name' => $this->config['emptySemesterName'], 'semester_id' => 'null'));

        $attributes = array(
            'courseName'        => $this->selectedCourseName,
            'semester'          => $semester,
            'institutions'      => $institions,
            'selectedInstitute' => $this->selectedInstituteName,
            'selectedSemester'  => $this->selectedSemesterName,
            'notTranslated'     => $this->selectedNotTranslated,
            'filterAction'      => $this->url_for('course/list')
        );

        return $this->renderer->render('filter', $attributes);
    }

    public function list_action() {
        $request = new ViewCoursesRequest;
        $request->setCourseName($this->selectedCourseName);
        $request->setNotTranslated($this->selectedNotTranslated);
        if ($this->config['emptyInstituteName'] !== $this->selectedInstituteName) {
            $request->setInstituteName($this->selectedInstituteName);
        }

        if ($this->config['emptySemesterName'] !== $this->selectedSemesterName) {
            $request->setSemesterName($this->selectedSemesterName);
        }


        $interactor = new ViewCoursesInteractor($this->courseRepository, $this->suggestor);
        $response   = $interactor->process($request);

        $this->courses       = $response->courses;
        $this->countCourses  = count($response->courses);
        $this->semesterName  = $this->selectedSemesterName;
        $this->editAction    = $this->url_for('course/edit');
    }

    public function edit_action() {
        $this->list_action();
        $modified = array();
        foreach (Request::getArray('courses') as $course) {
            $courseId    = $course['courseId'];
            $englishName = $course['englishName'];
            $currentEnglishName = $this->courses[$courseId]->englishName;
            $isSameEnglishName = $englishName === $currentEnglishName;
            if (($englishName && !$isSameEnglishName) || (!$englishName && $currentEnglishName)) {
                $request                  = new SetCourseNameRequest($courseId, $englishName);
                $interactor               = new SetCourseNameInteractor($this->courseRepository, $this->suggestor);
                $response                 = $interactor->process($request);
                $this->courses[$courseId] = $response->course;
                $modified[$courseId]       = _(sprintf('"%s" wurde in "%s" übersetzt, vorher: "%s"',$response->course->germanName,$englishName,$currentEnglishName));
            }
        }
        $this->countModified = count($modified);
        $this->modified      = $modified;
        $this->render_action('list');
    }

    public function after_filter($action, $args) {

        parent::after_filter($action, $args);
        $this->courseRepository->store();
    }

}
