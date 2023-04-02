<?php

class Pipeline
{
    public $arg = 6;

    public function make($anonFunc)
    {
        $result = $this->arg;

        foreach ($anonFunc as $func) {
            $result = $func($result);
        }

        return $result;
    }
}

$calculation = new Pipeline();
$results = $calculation->make(
    [
        function ($var) {
            return $var * 3;
        },
        function ($var) {
            return $var + 1;
        },
        function ($var) {
            return $var / 2;
        }
    ]
);

echo $results;
