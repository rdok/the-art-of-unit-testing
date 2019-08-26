<?php

namespace src\Ch2_A_first_unit_test;

class MemCalculator
{
    private $sum;

    public function add($number)
    {
        $this->sum += $number;
    }

    public function sum()
    {
        $sum = $this->sum;

        $this->sum = 0;

        return $sum;
    }
}