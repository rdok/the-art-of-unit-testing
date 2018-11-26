<?php

namespace tests\prototypes\private_property;

use src\prototypes\private_variables\Acme;
use src\prototypes\private_variables\ExpectedClass;
use tests\TestCase;

class AcmeTest extends TestCase
{
    /** @test */
    public function the_handle_method_uses_the_private_aProperty_as_expected()
    {
        $acme = new Acme;

        $expectedClassMock = $this->getMockBuilder(ExpectedClass::class)->setMethods(['handle'])->getMock();
        $expectedClassMock->expects($this->once())->method('handle');

        $propertyKey = 'aProperty';

        $closure = function () use ($propertyKey, $expectedClassMock) {
            $this->{$propertyKey} = $expectedClassMock;
        };

        $bindClosure = $closure->bindTo($acme, get_class($acme));

        $bindClosure();

        $acme->handle();
    }
}