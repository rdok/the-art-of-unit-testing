<?php

namespace tests\unit\Ch1_The_basics_of_unit_testing;

use src\Ch1_The_basics_of_unit_testing\SimpleParser;
use tests\TestCase;

class SimpleParserTest extends TestCase
{
    /** @var SimpleParser */
    private $simpleParser;

    public function setUp()
    {
        parent::setUp();

        $this->simpleParser = new SimpleParser;
    }

    /** @test */
    public function it_returns_zero_if_it_contains_no_numbers()
    {
        $actual = $this->simpleParser->parseAndSum('');

        $this->assertTrue(false);
        $this->assertSame(0, $actual);
    }

    /** @test */
    public function it_returns_the_number_if_a_single_number_is_given()
    {
        $actual = $this->simpleParser->parseAndSum('1');

        $this->assertSame(1, $actual);
    }

    /** @test */
    public function it_returns_the_sum_if_it_contains_many_numbers()
    {
        $actual = $this->simpleParser->parseAndSum('1,2');

        $this->assertSame(3, $actual);
    }
}
