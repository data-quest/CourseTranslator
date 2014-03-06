<?php

use DataQuest\Translator\Repository\Semester as SemesterRepository;

class SemesterHelper {

    private $semesterRepository;
    private $selectedSemesterName;
    function __construct(SemesterRepository $semesterRepository) {
        $this->semesterRepository = $semesterRepository;
    }
    public function getSelectedSemesterName() {
        return $this->selectedSemesterName;
    }

    public function setSelectedSemesterName($selectedSemesterName) {
        $this->selectedSemesterName = $selectedSemesterName;
    }

    
    public function createDummySemester( $name, $start, $end) {
        $startDate       = new DateTime;
        $startDate->setTimestamp($start);
        $endDate         = new DateTime;
        $endDate->setTimestamp($end);
        $id = $this->semesterRepository->getUniqueId();
        $semester        = $this->semesterRepository->create($id, $name,
                $startDate, $endDate);
        $this->semesterRepository->add($semester);
    }

}
