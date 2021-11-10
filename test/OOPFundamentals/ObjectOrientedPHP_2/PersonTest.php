<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_2;

use App\OOPFundamentals\ObjectOrientedPHP_2\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    private string $firstName;
    private string $lastName;
    private Person $person;

    protected function setUp(): void
    {
        parent::setUp();

        $this->firstName = 'John';
        $this->lastName = 'Smith';
        $this->person = new Person($this->firstName, $this->lastName);
    }

    public function test_get_full_name()
    {
        self::assertSame("{$this->firstName} {$this->lastName}", $this->person->get_full_name());

        $first_name = 'Erik';
        $this->person->first_name = $first_name;
        self::assertSame("{$first_name} {$this->lastName}", $this->person->get_full_name());

        $last_name = 'Brown';
        $this->person->last_name = $last_name;
        self::assertSame("{$first_name} {$last_name}", $this->person->get_full_name());
    }
}
