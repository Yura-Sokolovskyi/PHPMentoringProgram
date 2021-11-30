<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_9;

class ComputerProgrammer extends Person
{
    public string $occupation;

    public function __construct(string $name, string $age, string $gender)
    {
        parent::__construct($name, $age, $gender);
        $this->occupation = 'Computer Programmer';
    }

    public function introduce(): string
    {
        return sprintf(
            'Hello, my name is %s, I am %s years old and I am a(n) %s',
            $this->name,
            $this->age,
            $this->occupation
        );
    }

    public function greet($name): string
    {
        return sprintf(
            'Hello %s, I\'m %s, nice to meet you',
            $name,
            $this->name,
        );
    }

    public function advertise(): string
    {
        return 'Don\'t forget to check out my coding projects';
    }
}
