<?php

namespace tests\unit\Ch2_A_first_unit_test;

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

    public function validNames()
    {
        return [
            ['name.slf'],
            ['name.SLF'],
            ['name.SlF'],
        ];
    }

    public function invalidNames()
    {
        return [
            ['name'],
            [''],
            [null],
            ['name.sl'],
            ['name.1'],
            ['.'],
            ['.slf'],
            ['.sl'],
        ];
    }
}