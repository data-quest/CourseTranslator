<?php
$semesterData = SemesterData::getNextSemesterData();
return array(
    'templatePath'=>  realpath(__DIR__.'/../views').'/',
    'datafieldId'=>'d2e71598fe9429367d2c3ff2d9dd8063',
    'defaultSemesterName'=>$semesterData['name'],
    'emptySemesterName'=>_('Alle'),
    'emptyInstituteName'=>_('Alle'),
    /**
     * @see /config/config.inc.php 
     * Key des arrays $SEM_CLASS bei Lehre
     */
    'courseStatus'=>1 
);