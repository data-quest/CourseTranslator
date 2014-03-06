<?php

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

//


use Behat\Behat\Context\BehatContext;
use Behat\Gherkin\Node\TableNode;
use DataQuest\Mock\Repository\Course as CourseRepository;
use DataQuest\Mock\Repository\Institute as InstituteRepository;
use DataQuest\Mock\Repository\Semester as SemesterRepository;
use DataQuest\Mock\Service\TestSuggestor as Suggestor;
use DataQuest\Translator\Interactor\SetCourseName as SetCourseNameInteractor;
use DataQuest\Translator\Interactor\ViewCourses as ViewCoursesInteractor;
use DataQuest\Translator\Request\SetCourseName as SetCourseNameRequest;
use DataQuest\Translator\Request\ViewCourses as ViewCoursesRequest;
use DataQuest\Translator\Response\SetCourseName as SetCourseNameResponse;
use DataQuest\Translator\Response\ViewCourses as ViewCoursesResponse;

/**
 * Features context.
 */
class FeatureContext extends BehatContext {

    private $courseRepository;
    private $semesterRepository;
    private $instituteRepository;
    private $courseHelper;
    private $semesterHelper;
    private $instituteHelper;
    private $suggestor;

    /**
     * @var ViewCoursesResponse
     */
    private $viewCoursesResponse;

    /**
     * @var SetCourseNameResponse
     */
    private $setCourseNameResponse;

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters) {
        $this->courseRepository    = new CourseRepository;
        $this->semesterRepository  = new SemesterRepository;
        $this->instituteRepository = new InstituteRepository;
        $this->instituteHelper     = new InstituteHelper($this->instituteRepository);
        $this->semesterHelper      = new SemesterHelper($this->semesterRepository);
        $this->courseHelper        = new CourseHelper($this->courseRepository, $this->semesterRepository, $this->instituteRepository);
        $this->suggestor           = new Suggestor;
    }

    /**
     * @Given /^following courses:$/
     */
    public function followingCourses(TableNode $table) {
        foreach ($table->getHash() as $row) {
        
            $germanName     = $row['germanName'];
            $englishName    = $row['englishName'];
            $courseStart    = $row['courseStart'];
            $courseDuration = $row['courseDuration'];
            $semesterName     = $row['semesterName'];
            $instituteName    = $row['instituteName'];

            $this->courseHelper->createDummyCourse($germanName, $englishName, $courseStart, $courseDuration, $semesterName, $instituteName);
        }
    
    }

    /**
     * @Given /^following semster:$/
     */
    public function followingSemster(TableNode $table) {
        foreach ($table->getHash() as $row) {
           
            $start = $row['start'];
            $name  = $row['name'];
            $end   = $row['end'];
            $this->semesterHelper->createDummySemester( $name, $start, $end);
        }
    }

    /**
     * @Given /^following institutions:$/
     */
    public function followingInstitutions(TableNode $table) {
        foreach ($table->getHash() as $row) {
    
            $name = $row['instituteName'];
            $this->instituteHelper->createDummyInstiute( $name);
        }
    }

    /**
     * @Given /^I have translator role$/
     */
    public function iHaveTranslatorRole() {
        
    }

    /**
     * @When /^I view courses$/
     */
    public function iViewCourses() {
        $request                   = new ViewCoursesRequest();
        $request->setSemesterName($this->semesterHelper->getSelectedSemesterName());
        $request->setInstituteName($this->instituteHelper->getSelectedInsituteName());
        $request->setCourseName($this->courseHelper->getSelectedCourseName());
        $request->setNotTranslated($this->courseHelper->getNotTranslated());
     
        $interactor                = new ViewCoursesInteractor($this->courseRepository, $this->suggestor);
        $this->viewCoursesResponse = $interactor->process($request);
    }

    /**
     * @Then /^I should see courses$/
     */
    public function iShouldSeeCourses() {
        assertNotNull($this->viewCoursesResponse);
        assertInstanceOf('\DataQuest\Translator\Response\ViewCourses', $this->viewCoursesResponse);
    }

    /**
     * @Given /^I selected semester "([^"]*)"$/
     */
    public function iSelectedSemester($semesterName) {
        $this->semesterHelper->setSelectedSemesterName($semesterName);
    }

    /**
     * @Given /^I selected institute "([^"]*)"$/
     */
    public function iSelecteInstitute($instituteName) {
        $this->instituteHelper->setSelectedInsituteName($instituteName);
    }

    /**
     * @Given /^I search for coursename "([^"]*)"$/
     */
    public function iSearchForCoursename($courseName) {
        $this->courseHelper->setSelectedCourseName($courseName);
    }

    /**
     * @Then /^I should see following courses:$/
     */
    public function iShouldSeeFollowingCourses(TableNode $table) {
        assertNotNull($this->viewCoursesResponse);
        assertInstanceOf('\DataQuest\Translator\Response\ViewCourses', $this->viewCoursesResponse);
        $courses = $this->viewCoursesResponse->courses;
        assertSame(count($courses), count($table->getHash()));
        foreach ($table->getHash() as $key => $row) {
            
           // assertSame((array) $courses[$row['id']], $row);
        }
    }

    /**
     * @When /^I input the name "([^"]*)" for course "([^"]*)"$/
     */
    public function iInputTheNameForCourse($englishName, $courseId) {
        $request                     = new SetCourseNameRequest($courseId, $englishName);
        $interactor                  = new SetCourseNameInteractor($this->courseRepository, $this->suggestor);
        $this->setCourseNameResponse = $interactor->process($request);
    }

    /**
     * @Then /^I should changed the coursename$/
     */
    public function iShouldChangedTheCoursename() {
        assertNotNull($this->setCourseNameResponse);
        assertInstanceOf('\DataQuest\Translator\Response\SetCourseName', $this->setCourseNameResponse);
    }

    /**
     * @Given /^english coursename schould be "([^"]*)"$/
     */
    public function englishCoursenameSchouldBe($englishName) {
        $course = $this->setCourseNameResponse->course;
        assertSame($course->englishName, $englishName);
    }

    /**
     * @Given /^suggestor suggest "([^"]*)" as english name$/
     */
    public function suggestorSuggestAsEnglishName($suggestedText) {
        $this->suggestor->setSuggestedText($suggestedText);
    }

    /**
     * @Given /^I hide translated courses$/
     */
    public function iHideTranslatedCourses() {
        $this->courseHelper->setNotTranslated(true);
    }

}
