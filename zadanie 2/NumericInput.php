<?php

include_once 'TextInput.php';

class NumericInput extends TextInput
{
    public function add($text)
    {
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}
