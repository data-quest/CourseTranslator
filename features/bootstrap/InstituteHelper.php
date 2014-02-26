<?php

use DataQuest\Translator\Repository\Institute as InstituteRepository;

class InstituteHelper {

    private $instituteRepository;
    private $selectedInsituteName;

    function __construct(InstituteRepository $instituteRepository) {
        $this->instituteRepository = $instituteRepository;
    }

    public function createDummyInstiute($id, $name) {
        $institute = $this->instituteRepository->create($id, $name);
        $this->instituteRepository->add($institute);
    }

    public function getSelectedInsituteName() {
        return $this->selectedInsituteName;
    }

    public function setSelectedInsituteName($insituteName) {
        $this->selectedInsituteName = $insituteName;
    }

}
