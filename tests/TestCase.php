<?php

namespace tests;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        parent::setUp();

        require __DIR__ . '/../vendor/autoload.php';
    }
}