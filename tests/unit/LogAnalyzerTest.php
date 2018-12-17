<?php

namespace tests\unit;

use src\FileExtensioner;
use src\LogAnalyzer;
use tests\TestCase;

class LogAnalyzerTest extends TestCase
{
    /** @test */
    public function it_may_keep_track_the_status_of_the_last_filename_checked()
    {
        $fileExtensionerMock = $this->createMock(FileExtensioner::class);
        $fileExtensionerMock->expects($this->once())->method('isValid')->willReturn(false);
        $logAnalyzer = new LogAnalyzer($fileExtensionerMock);

        $logAnalyzer->isValidFileName('any-value');

        $this->assertFalse($logAnalyzer->wasLastFileNameValid());
    }
}