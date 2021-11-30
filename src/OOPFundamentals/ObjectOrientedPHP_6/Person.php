<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_6;

use InvalidArgumentException;

class Person
{
    protected string $name;
    protected int $age;
    protected string $occupation;

    public function __construct($name, $age, $occupation)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setOccupation($occupation);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->validate(
            ! is_string($name),
            'Name must be a string!'
        );
        $this->name = $name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): void
    {
        $this->validate(
            ! is_numeric($age) || $age < 0,
            'Age must be a non-negative integer!'
        );
        $this->age = $age;
    }

    public function getOccupation(): string
    {
        return $this->occupation;
    }

    public function setOccupation($occupation): void
    {
        $this->validate(
            ! is_string($occupation),
            'Occupation must be a string!'
        );
        $this->occupation = $occupation;
    }

    private function validate($condition, $errorMessage)
    {
        if ($condition) {
            throw new InvalidArgumentException($errorMessage);
        }
    }
}
