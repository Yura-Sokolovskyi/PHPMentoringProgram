<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_5;

use App\OOPFundamentals\ObjectOrientedPHP_4\Person;

class ComputerProgrammer extends Person
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'Computer Programmer');
    }

    public function describe_job(): string
    {
        return sprintf('%s, don\'t forget to check out my Codewars account ;)', parent::describe_job());
    }
}
