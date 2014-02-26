<?php

namespace DataQuest\Translator\Repository;

use DataQuest\Translator\Entity\Institute as InstituteEntity;

interface Institute {

    public function create($id, $name);

    public function add(InstituteEntity $institute);
    public function findByName($instituteName);
    public function findById($instituteId);
}
