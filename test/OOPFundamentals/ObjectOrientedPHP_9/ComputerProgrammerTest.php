<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_9;

use App\OOPFundamentals\ObjectOrientedPHP_9\ComputerProgrammer;
use PHPUnit\Framework\TestCase;

class ComputerProgrammerTest extends TestCase
{
    const NAME = 'Niki';
    const AGE = 7;
    const GENDER = 'man';
    const OCCUPATION = 'Computer Programmer';

    private ComputerProgrammer $computerProgrammer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->computerProgrammer = new ComputerProgrammer(self::NAME, self::AGE, self::GENDER);
    }

    public function test_introduce()
    {
        $expected = sprintf(
            'Hello, my name is %s, I am %s years old and I am a(n) %s',
            self::NAME,
            self::AGE,
            self::OCCUPATION
        );

        $this->assertEquals($expected, $this->computerProgrammer->introduce());
    }

    public function test_greet()
    {
        $name = 'Bob';

        $expected = sprintf(
            'Hello %s, I\'m %s, nice to meet you',
            $name,
            self::NAME,
        );

        $this->assertEquals($expected, $this->computerProgrammer->greet($name));
    }

    public function test_advertise()
    {
        $expected = 'Don\'t forget to check out my coding projects';

        $this->assertEquals($expected, $this->computerProgrammer->advertise());
    }
}
