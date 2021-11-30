<?php

namespace App\OOPFundamentals\ObjectOrientedPHP_9;

final class Child extends Person
{
    public function __construct(string $name, string $age, string $gender, public array $aspirations)
    {
        parent::__construct($name, $age, $gender);
    }

    public function introduce(): string
    {
        return sprintf('Hi, I\'m %s and I am %s years old', $this->name, $this->age);
    }

    public function greet($name): string
    {
        return sprintf('Hi %s, let\'s play!', $name);
    }

    public function say_dreams(): string
    {
        return sprintf('I would like to be a(n) %s when I grow up.', $this->get_say_list());
    }

    private function get_say_list(): string
    {
        $list = '';
        $lastIndex = count($this->aspirations) - 1;

        foreach ($this->aspirations as $key => $value) {
            $separator = $key + 1 == $lastIndex ? ' or ' : ', ';
            $list .= $key == $lastIndex ? $value : $value.$separator;
        }

        return $list;
    }
}
