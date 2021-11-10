<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_4;

class Person
{
    const SPECIES = 'Homo Sapiens';

    public function __construct(public string $name, public int $age, public string $occupation)
    {
    }

    public function introduce(): string
    {
        return sprintf('Hello, my name is %s', $this->name);
    }

    public function describe_job(): string
    {
        return sprintf('I am currently working as a(n) %s', $this->occupation);
    }

    public static function greet_extraterrestrials($species): string
    {
        return sprintf('Welcome to Planet Earth %s!', $species);
    }
}
