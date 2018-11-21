<?php

namespace src\ch1_TheBasicsOfUnitTesting;

class SimpleParser
{
    public function parseAndSum($string)
    {
        $numbers = explode(',', $string);

        return array_sum($numbers);
    }
}