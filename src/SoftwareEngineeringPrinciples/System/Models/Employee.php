<?php

namespace App\SoftwareEngineeringPrinciples\System\Models;

use App\SoftwareEngineeringPrinciples\System\Interfaces\EmployeeInterface;

class Employee implements EmployeeInterface
{
    public function __construct(
        protected int $id,
        protected string $firstName,
        protected string $lastName,
        protected float $hourRate
    ) {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return sprintf('%s %s', $this->firstName, $this->lastName);
    }

    /**
     * @param  float  $hours
     * @return float
     */
    public function countSalary(float $hours): float
    {
        return $hours * $this->hourRate;
    }
}
