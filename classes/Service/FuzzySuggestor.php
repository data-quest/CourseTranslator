<?php

namespace DataQuest\Translator\Delivery\Service;

use DataQuest\Translator\Service\Suggestor as SuggestorInterface;

/**
 * Description of FuzzySuggestor
 *
 * @author Witali
 */
class FuzzySuggestor implements SuggestorInterface {

    public function suggestEnglishName($courseId) {
        return $this->findSuggestion($courseId);
    }
    /**
     * Method to create a guzzy suggestion for english translation
     * @param \interger $courseId
     * @return string
     */
    public function findSuggestion($courseId) {
       return '';
    }

}
