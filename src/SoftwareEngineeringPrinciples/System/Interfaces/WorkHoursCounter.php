<?php

namespace App\SoftwareEngineeringPrinciples\System\Interfaces;

use App\SoftwareEngineeringPrinciples\System\Models\Employee;

interface WorkHoursCounter
{
    public function countHours(Employee $employee): float;
}
