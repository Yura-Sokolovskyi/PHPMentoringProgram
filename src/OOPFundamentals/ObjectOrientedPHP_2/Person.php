<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_2;

class Person
{
    public string $first_name;
    public string $last_name;

    public function __construct(string $firstName, string $lastName)
    {
        $this->first_name = $firstName;
        $this->last_name = $lastName;
    }

    public function get_full_name(): string
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }
}
