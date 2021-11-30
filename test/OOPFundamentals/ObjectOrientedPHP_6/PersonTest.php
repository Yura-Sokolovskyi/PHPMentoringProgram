<?php

namespace Test\OOPFundamentals\ObjectOrientedPHP_6;

use App\OOPFundamentals\ObjectOrientedPHP_6\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    /**
     * @dataProvider invalidDataProvider
     */
    public function test_validation_failed($name, $age, $occupation, $message)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        new Person($name, $age, $occupation);
    }

    public function invalidDataProvider(): array
    {
        return [
          ['Donald', 20, 2, 'Occupation must be a string!'],
          ['Donald', -1, 'Developer', 'Age must be a non-negative integer!'],
          [null, 20, 'Developer', 'Name must be a string!'],
        ];
    }
}
