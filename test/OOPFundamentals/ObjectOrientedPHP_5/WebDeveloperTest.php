<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_5;

use App\OOPFundamentals\ObjectOrientedPHP_5\WebDeveloper;
use PHPUnit\Framework\TestCase;

class WebDeveloperTest extends TestCase
{
    private WebDeveloper $webDeveloper;

    protected function setUp(): void
    {
        parent::setUp();

        $this->webDeveloper = new WebDeveloper('Donald', 17);
    }

    public function test_describe_job()
    {
        $expected = 'I am currently working as a(n) Web Developer, don\'t forget to check out my Codewars account ;) And don\'t forget to check on my website :D';

        $this->assertSame($expected, $this->webDeveloper->describe_job());
    }

    public function test_describe_website()
    {
        $expected = 'My professional world-class website is made from HTML, CSS, Javascript and PHP!';

        $this->assertSame($expected, $this->webDeveloper->describe_website());
    }
}
