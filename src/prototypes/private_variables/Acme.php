<?php

namespace src\prototypes\private_variables;

class Acme
{
    /** @var ExpectedClass */
    private $expectedClass;

    public function __construct()
    {
        $this->expectedClass = new ExpectedClass;
    }

    public function handle()
    {
        $this->expectedClass->handle();
    }
}