<?php

namespace tests\unit;

use src\Calculator;
use tests\TestCase;

class CalculatorTest extends TestCase
{
    /** @var Calculator */
    private $calculator;

    public function setUp()
    {
        parent::setUp();

        $this->calculator = new Calculator;
    }

    /** @test */
    public function the_sum_method_returns_zero_by_default()
    {
        $response = $this->calculator->sum();

        $this->assertSame(0, $response);
    }

    /** @test */
    public function the_sum_method_may_access_the_result_of_add()
    {
        $this->calculator->add(2);

        $this->assertSame(2, $this->calculator->sum());
    }

    /** @test */
    public function the_sum_method_resets_to_zero_after_getting_its_sum()
    {
        $this->calculator->add(2);

        $this->assertSame(2, $this->calculator->sum());
        $this->assertSame(0, $this->calculator->sum());
    }
}