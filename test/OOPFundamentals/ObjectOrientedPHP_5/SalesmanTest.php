<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_5;

use App\OOPFundamentals\ObjectOrientedPHP_5\Salesman;
use PHPUnit\Framework\TestCase;

class SalesmanTest extends TestCase
{
    const NAME = 'Donald';

    public function test_introduce()
    {
        $salesman = new Salesman(self::NAME, 17);

        $expected = sprintf('Hello, my name is %s, don\'t forget to check out my products!', self::NAME);

        $this->assertSame($expected, $salesman->introduce());
    }
}
