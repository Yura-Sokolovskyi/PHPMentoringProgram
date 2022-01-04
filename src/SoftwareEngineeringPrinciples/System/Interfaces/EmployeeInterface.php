<?php

namespace App\SoftwareEngineeringPrinciples\System\Interfaces;

interface EmployeeInterface
{
    public function countSalary(float $hours): float;
    public function getFullName(): string;
}
