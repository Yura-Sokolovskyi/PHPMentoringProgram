<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_7;

use App\OOPFundamentals\ObjectOrientedPHP_7\Person;
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

    public function test_introduce()
    {
        $expected = sprintf('Hello, my name is %s', self::NAME);

        $this->assertSame($expected, $this->person->introduce());
    }

    public function test_describe_job()
    {
        $expected = sprintf('I am currently working as a(n) %s', self::OCCUPATION);

        $this->assertSame($expected, $this->person->describe_job());
    }

    public function test_greet_extraterrestrials()
    {
        $expected = sprintf('Welcome to Planet Earth %s!', Person::SPECIES);

        $this->assertSame($expected, $this->person->greet_extraterrestrials(Person::SPECIES));
    }
}
