<?php

namespace src\Ch2_A_first_unit_test;

class LogAnalyzer
{
    /**
     * https://regex101.com/r/DI4Uwa/1
     *
     * @param $filename
     * @return bool
     */
    public function isValidFileName($filename)
    {
        return preg_match('/.+\.slf$/i', $filename) === 1;
    }
}