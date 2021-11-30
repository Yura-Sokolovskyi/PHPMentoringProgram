<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_8;

use App\OOPFundamentals\ObjectOrientedPHP_8\Duck;
use App\OOPFundamentals\ObjectOrientedPHP_8\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    const NAME = 'Donald';
    const AGE = 17;
    const OCCUPATION = 'Developer';

    private Person $person;

    protected function setUp(): void
    {
        parent::setUp();

        $this->person = new Person(self::NAME, self::AGE, self::OCCUPATION);
    }

    public function test_greet()
    {
        $name = 'Mark';

        $expected = sprintf('Hello %s, how are you?', $name);

        $this->assertSame($expected, $this->person->greet($name));
    }

    public function test_speak()
    {
        $expected = 'What am I supposed to say again?';

        $this->assertSame($expected, $this->person->speak());
    }

    public function test_introduce()
    {
        $expected = sprintf(
            'Hello, my name is %s, I am %s years old and I am currently working as a(n) %s',
            self::NAME,
            self::AGE,
            self::OCCUPATION,
        );

        $this->assertSame($expected, $this->person->introduce());
    }
}
