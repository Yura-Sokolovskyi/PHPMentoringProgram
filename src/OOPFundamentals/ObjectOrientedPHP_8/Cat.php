<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_8;

class Cat implements CanClimb
{
    public function play($name): string
    {
        return sprintf('Hey %s, let\'s play!', $name);
    }

    public function meow(): string
    {
        return 'Meow meow';
    }

    public function climb(): string
    {
        return 'Look, I\'m climbing a tree';
    }
}
