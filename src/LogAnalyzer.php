<?php

namespace src;

class LogAnalyzer
{
    /** @var boolean */
    private $wasLastFilenNameValid;

    public function isValidFileName($string)
    {
        if (empty($string)) {
            throw new \InvalidArgumentException('No filename provided!');
        }

        $suffix = '.SLF';

        $string = strtoupper($string);

        $this->wasLastFilenNameValid = substr($string, -strlen($suffix)) === $suffix;

        return $this->wasLastFilenNameValid;
    }

    public function wasLastFileNameValid()
    {
        return $this->wasLastFilenNameValid;
    }
}