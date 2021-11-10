<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_7;

use App\OOPFundamentals\ObjectOrientedPHP_7\ComputerProgrammer;
use PHPUnit\Framework\TestCase;

class ComputerProgrammerTest extends TestCase
{
    const NAME = 'Donald';

    public function test_describe_job()
    {
        $computerProgrammer = new ComputerProgrammer(self::NAME, 17);

        $expected = sprintf('Hello, my name is %s and I am a Computer Programmer', self::NAME);

        $this->assertSame($expected, $computerProgrammer->introduce());
    }
}
