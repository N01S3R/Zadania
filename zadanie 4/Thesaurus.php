<?php

class Thesaurus
{
    private $thesaurus;

    public function __construct($thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms($word)
    {
        $synonyms = array_key_exists($word, $this->thesaurus) ? $this->thesaurus[$word] : array();
        $result = array(
            "word" => $word,
            "synonyms" => $synonyms
        );
        return json_encode($result);
    }
}

$thesaurus = new Thesaurus(array("market" => array("trade"), "small" => array("little", "compact")));
echo $thesaurus->getSynonyms("small");
