<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_3;

class CurrentUSPresident
{
    const NAME = 'Barack Obama';

    public static function greet(string $name): string
    {
        return sprintf('Hello %s, my name is %s, nice to meet you!', $name, self::NAME);
    }
}
