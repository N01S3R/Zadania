<?php

include_once 'TextInput.php';

class NumericInput extends TextInput
{
    public function add($text)
    {
        if (is_numeric($text)) {
            $this->value .= $text;
        }
    }
}

$input = new NumericInput();
$input->add('44242sadada');
$input->add('444');
echo $input->getValue();
