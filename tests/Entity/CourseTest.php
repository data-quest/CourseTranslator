<?php

namespace DataQuest\Translator\Test\Entity;

class CourseTest extends \PHPUnit_Framework_TestCase {

    public function testCanBeCreated() {
        $id         = 1;
        $germanName = 'Test';
        $start      = new \DateTime;
        $duration   = 100;
        $institute  = new \DataQuest\Translator\Entity\Institute(1, 'test');
        $course     = new \DataQuest\Translator\Entity\Course($id, $germanName, $start, $duration, $institute);
        $this->assertNotNull($course);
    }

}
