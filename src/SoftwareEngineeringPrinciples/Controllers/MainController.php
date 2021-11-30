<?php

namespace App\SoftwareEngineeringPrinciples\Controllers;

use App\SoftwareEngineeringPrinciples\System\Interfaces\SalaryCounter;

class MainController
{
    public static function getUsersSalary(SalaryCounter $counter): string
    {
        return json_encode($counter->countSalary());
    }
}
