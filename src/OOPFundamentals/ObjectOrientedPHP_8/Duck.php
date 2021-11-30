<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_8;

class Duck extends Bird implements CanSwim
{
    public function fly(): string
    {
        return 'I am flying';
    }

    public function chirp(): string
    {
        return 'Quack quack';
    }

    public function swim(): string
    {
        return 'Splash! I\'m swimming';
    }
}
