<?php

namespace src\Ch1_The_basics_of_unit_testing;

use InvalidArgumentException;

class SimpleParser
{
    public function parseAndSum($string)
    {
        if (empty($string)) {
            return 0;
        }

        $numbers = explode(',', $string);

        array_walk($numbers, [$this, 'validateType']);

        return array_sum($numbers);
    }

    private function validateType($number)
    {
        if (ctype_digit($number)) {
            return;
        }

        $error = 'Can only handle integer numbers.';

        throw new InvalidArgumentException($error);
    }
}
