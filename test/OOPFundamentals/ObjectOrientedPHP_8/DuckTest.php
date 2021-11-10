<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_8;

use App\OOPFundamentals\ObjectOrientedPHP_8\Duck;
use PHPUnit\Framework\TestCase;

class DuckTest extends TestCase
{
    private Duck $duck;

    protected function setUp(): void
    {
        parent::setUp();

        $this->duck = new Duck('Duck');
    }

    public function test_fly()
    {
        $expected = 'I am flying';

        $this->assertSame($expected, $this->duck->fly());
    }

    public function test_chirp()
    {
        $expected = 'Quack quack';

        $this->assertSame($expected, $this->duck->chirp());
    }

    public function test_swim()
    {
        $expected = 'Splash! I\'m swimming';

        $this->assertSame($expected, $this->duck->swim());
    }
}
