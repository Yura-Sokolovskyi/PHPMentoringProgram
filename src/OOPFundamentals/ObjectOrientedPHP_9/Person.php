<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_9;

abstract class Person
{
    public function __construct(public string $name, public string $age, public string $gender)
    {
    }

    abstract public function introduce();

    public function greet($name): string
    {
        return sprintf('Hello %s', $name);
    }
}
