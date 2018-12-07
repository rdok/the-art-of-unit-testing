<?php

namespace tests\unit;

use src\SimpleParser;
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
    public function it_returns_an_integer_if_it_contais_numbers()
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