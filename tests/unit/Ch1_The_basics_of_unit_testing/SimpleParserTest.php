<?php

namespace tests\unit\Ch1_The_basics_of_unit_testing;

use InvalidArgumentException;
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

        $this->assertSame(0, $actual);
    }

    /** @test */
    public function it_parses_the_number_when_no_comma_is_present()
    {
        $actual = $this->simpleParser->parseAndSum('5');

        $this->assertSame(5, $actual);
    }

    /** @test */
    public function it_parses_and_sums_two_numbers()
    {
        $actual = $this->simpleParser->parseAndSum('5,7');

        $this->assertSame(12, $actual);
    }

    /** @test */
    public function it_errors_for_non_integer_numbers()
    {
        $this->expectExceptionMessage('Can only handle integer numbers.');
        $this->expectException(InvalidArgumentException::class);

        $this->simpleParser->parseAndSum('1.2');
    }
}
