<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_8;

use App\OOPFundamentals\ObjectOrientedPHP_8\Dog;
use PHPUnit\Framework\TestCase;

class DogTest extends TestCase
{
    private Dog $dog;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dog = new Dog();
    }

    public function test_bark()
    {
        $expected = 'Woof woof';

        $this->assertSame($expected, $this->dog->bark());
    }

    public function test_greet()
    {
        $name = 'dog';
        $expected = sprintf('Hello %s, welcome to my home', $name);

        $this->assertSame($expected, $this->dog->greet($name));
    }

    public function test_swim()
    {
        $expected = 'I\'m swimming, woof woof';

        $this->assertSame($expected, $this->dog->swim());
    }
}
