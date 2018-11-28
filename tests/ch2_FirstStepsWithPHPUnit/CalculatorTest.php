<?php

namespace tests\ch2_FirstStepsWithPHPUnit;

use src\ch2_FirstStepsWithPHPUnit\Calculator;
use tests\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function it_sums_to_zero_with_no_add_calls()
    {
        $calculator = new Calculator;

        $response = $calculator->sum();

        $this->assertSame(0, $response);
    }
}