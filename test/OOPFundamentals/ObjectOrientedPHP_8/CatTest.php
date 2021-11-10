<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_8;

use App\OOPFundamentals\ObjectOrientedPHP_8\Cat;
use PHPUnit\Framework\TestCase;

class CatTest extends TestCase
{
    private Cat $cat;

    protected function setUp(): void
    {
        parent::setUp();

        $this->cat = new Cat();
    }

    public function test_meow()
    {
        $expected = 'Meow meow';

        $this->assertSame($expected, $this->cat->meow());
    }

    public function test_climb()
    {
        $expected = 'Look, I\'m climbing a tree';

        $this->assertSame($expected, $this->cat->climb());
    }
}
