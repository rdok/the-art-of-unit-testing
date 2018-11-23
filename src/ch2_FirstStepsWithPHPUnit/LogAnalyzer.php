<?php

namespace src\ch2_FirstStepsWithPHPUnit;

class LogAnalyzer
{
    public function isValidLogFileName($string)
    {
        if (empty($string)) {
            throw new \InvalidArgumentException('No filename provided!');
        }

        $suffix = '.SLF';

        $string = strtoupper($string);

        return substr($string, -strlen($suffix)) === $suffix;
    }
}