<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_8;

use App\OOPFundamentals\ObjectOrientedPHP_8\Bird;
use PHPUnit\Framework\TestCase;

class BirdTest extends TestCase
{
    private Bird $bird;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bird = new Bird('Name');
    }

    public function test_fly()
    {
        $expected = 'I am flying';

        $this->assertSame($expected, $this->bird->fly());
    }

    public function test_chirp()
    {
        $expected = 'Chirp chirp';

        $this->assertSame($expected, $this->bird->chirp());
    }
}
