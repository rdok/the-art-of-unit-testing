<?php

namespace tests\ch2_FirstStepsWithPHPUnit;

use src\ch2_FirstStepsWithPHPUnit\LogAnalyzer;
use tests\TestCase;

class LogAnalyzerTest extends TestCase
{
    /** @test */
    public function it_may_determine_if_a_filename_is_invalid()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidLogFileName('invalid-file-name');

       $this->assertFalse($isValidLogFileName) ;
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_valid()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidLogFileName('valid.SLF');

       $this->assertTrue($isValidLogFileName) ;
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_valid_case_insensitive()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidLogFileName('valid.SlF');

        $this->assertTrue($isValidLogFileName) ;
    }

    /** @test */
    public function it_throws_exception_if_filename_is_null()
    {
        $this->expectExceptionMessage('No filename provided!');

        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidLogFileName(null);
    }

    /** @test */
    public function it_throws_exception_if_filename_is_empty()
    {
        $this->expectExceptionMessage('No filename provided!');

        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidLogFileName('');
    }
}