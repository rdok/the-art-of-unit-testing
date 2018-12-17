<?php

namespace src;

class LogAnalyzer
{
    /** @var boolean */
    private $wasLastFileNameValid;
    /** @var FileExtensioner */
    private $fileExtensioner;

    public function __construct(FileExtensioner $fileExtensioner)
    {
        $this->fileExtensioner = $fileExtensioner;
    }

    public function isValidFileName($string)
    {
        $this->wasLastFileNameValid = $this->fileExtensioner->isValid($string);

        return $this->wasLastFileNameValid;
    }

    public function wasLastFileNameValid()
    {
        return $this->wasLastFileNameValid;
    }
}