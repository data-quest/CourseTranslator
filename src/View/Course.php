<?php



namespace DataQuest\Translator\View;

use DataQuest\Translator\Entity\Course as CourseEntity;
class Course {
    public $id;
    public $germanName;
    public $englishName;
    public function __construct(CourseEntity $course) {
        $this->id = $course->getId();
        $this->germanName = $course->getGermanName();
        $this->englishName = $course->getEnglishName();
    }
}
