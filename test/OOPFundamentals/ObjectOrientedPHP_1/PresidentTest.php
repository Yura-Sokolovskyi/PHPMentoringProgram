<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_1;

use App\OOPFundamentals\ObjectOrientedPHP_1\President;
use PHPUnit\Framework\TestCase;

class PresidentTest extends TestCase
{
    private string $expectedName;
    private President $president;

    protected function setUp(): void
    {
        parent::setUp();

        $this->expectedName = 'Barack Obama';
        $this->president = new President();
    }

    public function test_name()
    {
        self::assertSame($this->expectedName, $this->president->name);
    }

    public function test_greet()
    {
        $name = 'Donald';
        $expectedGreetings = "Hello {$name}, my name is {$this->expectedName}, nice to meet you!";

        self::assertSame($expectedGreetings, $this->president->greet($name));
    }
}
