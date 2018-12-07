<?php

namespace tests\unit;

use src\LogAnalyzer;
use tests\TestCase;

class LogAnalyzerTest extends TestCase
{
    /** @test */
    public function isValidFileName_validFile_ReturnsTrue()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidFileName('valid.SLF');

        $this->assertTrue($isValidLogFileName);
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_invalid()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidFileName('invalid-file-name');

        $this->assertFalse($isValidLogFileName);
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_valid()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidFileName('valid.SLF');

        $this->assertTrue($isValidLogFileName);
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_valid_case_insensitive()
    {
        $logAnalyzer = new LogAnalyzer();

        $isValidLogFileName = $logAnalyzer->isValidFileName('valid.SlF');

        $this->assertTrue($isValidLogFileName);
    }

    /** @test */
    public function it_throws_exception_if_filename_is_null()
    {
        $this->expectExceptionMessage('No filename provided!');

        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidFileName(null);
    }

    /** @test */
    public function it_throws_exception_if_filename_is_empty()
    {
        $this->expectExceptionMessage('No filename provided!');

        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidFileName('');
    }

    /** @test */
    public function it_may_keep_track_the_valid_status_of_the_last_filename_checked()
    {
        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidFileName('invalid-file-name');
        $this->assertFalse($logAnalyzer->wasLastFileNameValid());

        $logAnalyzer->isValidFileName('valid.slf');
        $this->assertTrue($logAnalyzer->wasLastFileNameValid());
    }

    /** @test */
    public function it_may_keep_track_the_invalid_status_of_the_last_filename_checked()
    {
        $logAnalyzer = new LogAnalyzer();

        $logAnalyzer->isValidFileName('valid.slf');
        $this->assertTrue($logAnalyzer->wasLastFileNameValid());

        $logAnalyzer->isValidFileName('invalid');
        $this->assertFalse($logAnalyzer->wasLastFileNameValid());
    }
}