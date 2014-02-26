<?php

namespace DataQuest\Mock\Service;

use DataQuest\Translator\Service\Suggestor as SuggestorInterface;

/**
 * Description of TestSuggestor
 *
 * @author Witali
 */
class TestSuggestor implements SuggestorInterface {
    private $text = '';
    public function suggestEnglishName($courseId) {
        return $this->text;
    }
    public function setSuggestedText($text){
        $this->text = $text;
    }
}
