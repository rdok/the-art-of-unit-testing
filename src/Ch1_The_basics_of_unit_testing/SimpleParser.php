<?php

namespace src\Ch1_The_basics_of_unit_testing;

class SimpleParser
{
    public function parseAndSum($string)
    {
        $numbers = explode(',', $string);

        return array_sum($numbers);
    }
}