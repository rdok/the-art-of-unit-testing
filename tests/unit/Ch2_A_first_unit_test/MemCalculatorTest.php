<?php

namespace tests\unit\Ch2_A_first_unit_test;

use src\Ch2_A_first_unit_test\MemCalculator;
use tests\TestCase;

class MemCalculatorTest extends TestCase
{
    /** @var MemCalculator */
    private $memCalculator;

    public function setUp()
    {
        parent::setUp();

        $this->memCalculator = new MemCalculator;
    }

    /** @test */
    public function it_adds_a_number()
    {
        $this->memCalculator->add(1);

        $this->assertEquals(1, $this->memCalculator->sum());
    }

    /** @test */
    public function it_adds_two_numbers()
    {
        $this->memCalculator->add(1);
        $this->memCalculator->add(2);

        $this->assertEquals(3, $this->memCalculator->sum());
    }

    /** @test */
    public function it_resets_the_sum_when_getting_the_sum()
    {
        $this->memCalculator->add(1);
        $this->memCalculator->sum();

        $this->memCalculator->add(2);

        $this->assertEquals(2, $this->memCalculator->sum());
    }

    /** @test */
    public function it_sums_to_zero_by_default()
    {
        $this->assertEquals(0, $this->memCalculator->sum());
    }
}