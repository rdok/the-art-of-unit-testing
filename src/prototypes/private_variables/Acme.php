<?php

namespace src\prototypes\private_variables;

class Acme
{
    /** @var ExpectedClass */
    private $aProperty;

    public function __construct()
    {
        $this->aProperty = new ExpectedClass;
    }

    public function handle()
    {
        $this->aProperty->handle();
    }
}