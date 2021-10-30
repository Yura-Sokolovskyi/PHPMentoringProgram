<?php

use App\SampleClass;
use PHPUnit\Framework\TestCase;

class SampleClassTest extends TestCase
{

    public function testGetHelloWorld()
    {
        $this->assertEquals("Hello World", (new SampleClass())->getHelloWorld());
    }

    public function testTree()
    {
        $this->assertTrue(true);
    }
}
