<?php

$description = 'An amazing PHP Kata Series, complete with 10 top-quality Kata containing a large number of both fixed and random tests, that teaches both the fundamentals of object-oriented programming in PHP (in the first 7 Kata of this Series) and more advanced OOP topics in PHP (in the last 3 Kata of this Series) such as interfaces, abstract classes and even anonymous classes in a way that stimulates critical thinking and encourages independent research';

$kataList = [
    'Object-Oriented PHP #1',
    'Object-Oriented PHP #2',
    'Object-Oriented PHP #3',
    'Object-Oriented PHP #4',
    'Object-Oriented PHP #5',
    'Object-Oriented PHP #6',
    'Object-Oriented PHP #7',
    'Object-Oriented PHP #8',
    'Object-Oriented PHP #9',
    'Object-Oriented PHP #10',
];

$donald = $object_oriented_php = new class('Donald', 17, 'Male', 'Computer Programmer') {
    public function __construct(
        public string $name,
        public int $age,
        public string $gender,
        public string $occupation
    ) {
    }

    public function __toString()
    {
        return sprintf(
            '%s, aged %s, who is a %s proficient in Javascript and PHP and is a PHP enthusiast',
            $this->name,
            $this->age,
            strtolower($this->occupation)
        );
    }
};

$object_oriented_php = new class($description, $kataList, $donald) {
    public int $kata_count;

    public function __construct(
        public string $description,
        public array $kata_list,
        public object $author
    ) {
        $this->kata_count = count($this->kata_list);
    }

    public function advertise($name): string
    {
        return sprintf(
            'Hey %s, don\'t forget to check out this great PHP Kata Series authored by Donald called "Object-Oriented PHP"',
            $name
        );
    }

    public function get_kata_by_number($kata_number): string
    {
        if ($kata_number > 0 and $kata_number <= $this->kata_count) {
            return $this->kata_list[$kata_number - 1];
        } else {
            throw new InvalidArgumentException('Invalid kata number');
        }
    }

    public function complete(): string
    {
        return 'Hooray, I\'ve finally completed the entire \"Object-Oriented PHP\" Kata Series!!!';
    }

    public function __toString(): string
    {
        return $this->description;
    }
};
