<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_5;

use App\OOPFundamentals\ObjectOrientedPHP_5\ComputerProgrammer;
use PHPUnit\Framework\TestCase;

class ComputerProgrammerTest extends TestCase
{
    public function test_describe_job()
    {
        $computerProgrammer = new ComputerProgrammer('Donald', 17);

        $expected = 'I am currently working as a(n) Computer Programmer, don\'t forget to check out my Codewars account ;)';

        $this->assertSame($expected, $computerProgrammer->describe_job());
    }
}
