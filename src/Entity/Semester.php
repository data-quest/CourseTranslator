<?php

namespace DataQuest\Translator\Entity;

use DateTime;

class Semester {

    private $id;
    private $name;
    private $start;
    private $end;

    function __construct($id, $name, DateTime $start, DateTime $end) {
        $this->id    = $id;
        $this->name  = $name;
        $this->start = $start;
        $this->end   = $end;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getStart() {
        return $this->start;
    }

    public function getEnd() {
        return $this->end;
    }

}
