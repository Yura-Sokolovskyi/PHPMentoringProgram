<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_7;

use App\OOPFundamentals\ObjectOrientedPHP_7\Person;

class ComputerProgrammer extends Person
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'Computer Programmer');
    }

    public function introduce(): string
    {
        return sprintf('%s and I am a %s', parent::introduce(), $this->occupation);
    }
}
