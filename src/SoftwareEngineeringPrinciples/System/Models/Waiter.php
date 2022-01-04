<?php

namespace App\SoftwareEngineeringPrinciples\System\Models;

class Waiter extends Employee
{
    /**
     * @param  float  $hours
     * @return float
     */
    public function countSalary(float $hours): float
    {
        $mainSalary = ($hours * $this->hourRate);
        $tip = $mainSalary * 0.1;

        return $mainSalary + $tip;
    }
}
