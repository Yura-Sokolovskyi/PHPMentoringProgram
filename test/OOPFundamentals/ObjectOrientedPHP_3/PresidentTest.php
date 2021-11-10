<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_3;

use App\OOPFundamentals\ObjectOrientedPHP_3\CurrentUSPresident;
use PHPUnit\Framework\TestCase;

class PresidentTest extends TestCase
{
    public function test_greet()
    {
        $name = 'Donald';
        $expectedGreetings = sprintf(
            'Hello %s, my name is %s, nice to meet you!',
            $name,
            CurrentUSPresident::NAME
        );

        self::assertSame($expectedGreetings, CurrentUSPresident::greet($name));
    }
}
