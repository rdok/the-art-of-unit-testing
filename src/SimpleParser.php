<?php

namespace src;

class SimpleParser
{
    public function parseAndSum($string)
    {
        $numbers = explode(',', $string);

        return array_sum($numbers);
    }
}