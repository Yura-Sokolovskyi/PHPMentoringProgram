<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_8;

class Bird implements CanFly
{
    public function __construct(public string $name)
    {
    }

    public function fly(): string
    {
        return 'I am flying';
    }

    public function chirp(): string
    {
        return 'Chirp chirp';
    }
}
