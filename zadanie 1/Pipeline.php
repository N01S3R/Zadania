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
