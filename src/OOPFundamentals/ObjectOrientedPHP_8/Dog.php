<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_8;

class Dog implements CanSwim, CanGreet
{
    public function bark(): string
    {
        return 'Woof woof';
    }

    public function greet($name): string
    {
        return sprintf('Hello %s, welcome to my home', $name);
    }

    public function swim(): string
    {
        return 'I\'m swimming, woof woof';
    }
}
