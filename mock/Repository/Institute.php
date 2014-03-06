<?php

namespace DataQuest\Mock\Repository;

use DataQuest\Translator\Entity\Institute as InstituteEntity;
use DataQuest\Translator\Repository\Institute as InstituteInterface;
use Exception;

/**
 * Description of Institute
 *
 * @author Witali
 */
class Institute implements InstituteInterface {

    /**
     * @var InstituteEntity[] 
     */
    private $institutions = array();

    public function add(InstituteEntity $institute) {

        $this->institutions[$institute->getId()] = $institute;
    }

    public function create($id, $name) {
        return new InstituteEntity($id, $name);
    }

    public function findByName($instituteName) {
        foreach ($this->institutions as $institute) {
            if ($institute->getName() === $instituteName) {
                return $institute;
            }
        }
    }

    public function findById($instituteId) {
        if (!isset($this->institutions[$instituteId])) {
            throw new Exception(sprintf('InsituteID "%s" not exissts in Repository %s', $instituteId, get_called_class()));
        }
        return $this->institutions[$instituteId];
    }
    public function getUniqueId() {
        $countInstitutions = count($this->institutions);
        $countInstitutions++;
        return $countInstitutions;
    }
}
