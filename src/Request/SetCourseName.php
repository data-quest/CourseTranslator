<?php

namespace DataQuest\Translator\Request;

/**
 * Description of SetCourseName
 *
 * @author Witali
 */
class SetCourseName {

    private $courseId;
    private $englishName;

    function __construct($courseId, $englishName) {
        $this->courseId    = $courseId;
        $this->englishName = $englishName;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function getEnglishName() {
        return $this->englishName;
    }

}
