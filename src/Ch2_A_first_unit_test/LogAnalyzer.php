<?php

namespace src\Ch2_A_first_unit_test;

use InvalidArgumentException;

class LogAnalyzer
{
    public $lastFilenameValidity;

    public function isValidFileName($filename)
    {
        $this->lastFilenameValidity = false;

        if (empty($filename)) {
            throw new InvalidArgumentException('Filename cannot be empty.');
        }

        // https://regex101.com/r/DI4Uwa/1
        $this->lastFilenameValidity = preg_match('/.+\.slf$/i', $filename) === 1;

        return $this->lastFilenameValidity;
    }
}