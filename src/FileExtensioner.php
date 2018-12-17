<?php

namespace src;

class FileExtensioner
{
    public function isValid($string)
    {
        if (empty($string)) {
            throw new \InvalidArgumentException('No filename provided!');
        }

        $suffix = '.SLF';

        $string = strtoupper($string);

        return substr($string, -strlen($suffix)) === $suffix;
    }
}