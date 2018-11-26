<?php

namespace tests\prototypes\private_variables;

use src\prototypes\private_variables\Acme;
use src\prototypes\private_variables\ExpectedClass;
use tests\TestCase;

class AcmeTest extends TestCase
{
    /** @test */
    public function a_method_uses_a_private_method_as_expected()
    {
        $acme = new Acme;

        $expectedClassMock = $this->getMockBuilder(ExpectedClass::class)->setMethods(['handle'])->getMock();
        $expectedClassMock->expects($this->once())->method('handle');

        $propertyKey = 'expectedClass';

        $closure = function () use ($propertyKey, $expectedClassMock) {
            $this->{$propertyKey} = $expectedClassMock;
        };

        $bindClosure = $closure->bindTo($acme, get_class($acme));

        $bindClosure();

        $acme->handle();
    }
}