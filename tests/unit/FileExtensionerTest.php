<?php

namespace tests\unit;

use src\FileExtensioner;
use tests\TestCase;

class FileExtensionerTest extends TestCase
{
    /** @var FileExtensioner */
    private $fileExtensioner;

    public function setUp()
    {
        parent::setUp();

        $this->fileExtensioner = new FileExtensioner;
    }

    /** @test */
    public function it_may_determine_if_a_filename_is_invalid()
    {
        $isValidLogFileName = $this->fileExtensioner->isValid('invalid-file-name');

        $this->assertFalse($isValidLogFileName);
    }


    /** @test */
    public function it_may_determine_if_a_filename_is_valid_case_insensitive()
    {
        $isValidLogFileName = $this->fileExtensioner->isValid('valid.SlF');

        $this->assertTrue($isValidLogFileName);
    }

    /** @test */
    public function it_throws_exception_if_filename_is_null()
    {
        $this->expectExceptionMessage('No filename provided!');

        $this->fileExtensioner->isValid(null);
    }

    /** @test */
    public function it_throws_exception_if_filename_is_empty()
    {
        $this->expectExceptionMessage('No filename provided!');

        $this->fileExtensioner->isValid('');
    }
}