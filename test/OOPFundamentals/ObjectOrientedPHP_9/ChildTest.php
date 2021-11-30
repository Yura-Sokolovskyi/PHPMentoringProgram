<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_9;

use App\OOPFundamentals\ObjectOrientedPHP_9\Child;
use PHPUnit\Framework\TestCase;

class ChildTest extends TestCase
{
    const NAME = 'Niki';
    const AGE = 7;
    const GENDER = 'man';
    const ASPIRATIONS = [
        'Teacher',
        'Lawyer',
        'Police Officer',
    ];

    private Child $child;

    protected function setUp(): void
    {
        parent::setUp();

        $this->child = new Child(self::NAME, self::AGE, self::GENDER, self::ASPIRATIONS);
    }

    public function test_introduce()
    {
        $expected = sprintf('Hi, I\'m %s and I am %s years old', self::NAME, self::AGE);

        $this->assertEquals($expected, $this->child->introduce());
    }

    public function test_greet()
    {
        $name = 'Bob';

        $expected = sprintf('Hi %s, let\'s play!', $name);

        $this->assertEquals($expected, $this->child->greet($name));
    }

    public function test_say_dreams()
    {
        $expected = 'I would like to be a(n) Teacher, Lawyer or Police Officer when I grow up.';

        $this->assertEquals($expected, $this->child->say_dreams());
    }
}
