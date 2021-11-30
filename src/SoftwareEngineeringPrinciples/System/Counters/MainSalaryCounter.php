<?php

namespace App\SoftwareEngineeringPrinciples\System\Counters;

use App\SoftwareEngineeringPrinciples\System\Interfaces\EmployeeBuilderInterface;
use App\SoftwareEngineeringPrinciples\System\Interfaces\SalaryCounter;
use App\SoftwareEngineeringPrinciples\System\Interfaces\WorkHoursCounter;

class MainSalaryCounter implements SalaryCounter
{
    private EmployeeBuilderInterface $employeeBuilder;
    private WorkHoursCounter $workHoursCounter;

    /**
     * @param  EmployeeBuilderInterface  $employeeBuilder
     * @return MainSalaryCounter
     */
    public function setEmployeeBuilder(EmployeeBuilderInterface $employeeBuilder): self
    {
        $this->employeeBuilder = $employeeBuilder;

        return $this;
    }

    /**
     * @param  WorkHoursCounter  $workHoursCounter
     * @return MainSalaryCounter
     */
    public function setWorkHoursCounter(WorkHoursCounter $workHoursCounter): self
    {
        $this->workHoursCounter = $workHoursCounter;

        return $this;
    }

    /**
     * @return array
     */
    public function countSalary(): array
    {
        $salary = [];

        foreach ($this->employeeBuilder->getEmployees() as $employee) {
            $hours = $this->workHoursCounter->countHours($employee);
            $salary[$employee->getFullName()] = $employee->countSalary($hours).'$';
        }

        return $salary;
    }
}
