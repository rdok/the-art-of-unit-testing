<?php

namespace src;

class Calculator
{
    private $number = 0;

    public function sum()
    {
        $sum = $this->number;

        $this->number = 0;

        return $sum;
    }

    public function add($number)
    {
        $this->number += $number;
    }
}
