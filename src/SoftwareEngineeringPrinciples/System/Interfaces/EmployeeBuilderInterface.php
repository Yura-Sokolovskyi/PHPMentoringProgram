<?php

namespace App\SoftwareEngineeringPrinciples\System\Interfaces;

use App\SoftwareEngineeringPrinciples\System\Models\Employee;

interface EmployeeBuilderInterface
{
    /**
     * @return Employee[]
     */
    public function getEmployees(): array;
}
