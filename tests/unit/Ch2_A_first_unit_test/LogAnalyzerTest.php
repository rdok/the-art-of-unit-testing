<?php

namespace tests\unit\Ch2_A_first_unit_test;

use Exception;
use InvalidArgumentException;
use src\Ch2_A_first_unit_test\LogAnalyzer;
use tests\TestCase;

class LogAnalyzerTest extends TestCase
{
    /** @var LogAnalyzer */
    private $logAnalyzer;

    public function setUp()
    {
        parent::setUp();

        $this->logAnalyzer = new LogAnalyzer();
    }

    /**
     * @test
     * @dataProvider validNames
     */
    public function it_may_identify_if_a_file_has_valid_log_file_name($filename)
    {
        $condition = $this->logAnalyzer->isValidFileName('name.SLF');

        $message = "Failed asserting $filename is a valid file name";

        $this->assertTrue($condition, $message);
    }

    /**
     * @test
     * @dataProvider invalidNames
     */
    public function it_may_identify_if_a_file_has_invalid_log_file_name($filename)
    {
        $condition = $this->logAnalyzer->isValidFileName($filename);

        $message = "Failed asserting '$filename' is an invalid file name.";

        $this->assertFalse($condition, $message);
    }

    /**
     * @test
     * @dataProvider emptyFilenames
     */
    public function it_errors_for_empty_filename($filename)
    {
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage('Filename cannot be empty.');

        $this->logAnalyzer->isValidFileName($filename);
    }

    public function validNames()
    {
        return [['name.slf'], ['name.SLF'], ['name.SlF'],];
    }

    public function invalidNames()
    {
        return [['name'], ['name.sl'], ['name.1'], ['.'], ['.slf'], ['.sl'],];
    }

    public function emptyFilenames()
    {
        return [[''], [null],];
    }

    /** @test */
    public function it_keeps_track_of_latest_valid_filename_validity()
    {
        $this->logAnalyzer->isValidFileName('filename.slf');

        $this->assertTrue($this->logAnalyzer->lastFilenameValidity);
    }

    /** @test */
    public function it_keeps_track_of_latest_invalid_filename_validity()
    {
        $this->logAnalyzer->isValidFileName('invalid');

        $this->assertFalse($this->logAnalyzer->lastFilenameValidity);
    }

    /** @test */
    public function it_keeps_track_of_latest_invalid_filename_validity_on_error()
    {
        try {
            $this->logAnalyzer->isValidFileName('');
        } catch (Exception $e) {

        }

        $this->assertFalse($this->logAnalyzer->lastFilenameValidity);
    }
}