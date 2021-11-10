<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_5;

use App\OOPFundamentals\ObjectOrientedPHP_4\Person;

class Salesman extends Person
{
    public function __construct(string $name, int $age)
    {
        parent::__construct($name, $age, 'Salesman');
    }

    public function introduce(): string
    {
        return sprintf('%s, don\'t forget to check out my products!', parent::introduce());
    }
}
