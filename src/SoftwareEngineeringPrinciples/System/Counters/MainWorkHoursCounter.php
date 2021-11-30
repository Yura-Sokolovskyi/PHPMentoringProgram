<?php

namespace App\SoftwareEngineeringPrinciples\System\Counters;

use App\SoftwareEngineeringPrinciples\System\Interfaces\DataProvider;
use App\SoftwareEngineeringPrinciples\System\Interfaces\WorkHoursCounter;
use App\SoftwareEngineeringPrinciples\System\Models\Employee;

class MainWorkHoursCounter implements WorkHoursCounter
{
    private DataProvider $dataProvider;

    /**
     * @param  DataProvider  $provider
     * @return MainWorkHoursCounter
     */
    public function setDaraProvider(DataProvider $provider): self
    {
        $this->dataProvider = $provider;

        return $this;
    }

    /**
     * @param  Employee  $employee
     * @return float
     */
    public function countHours(Employee $employee): float
    {
        return array_sum($this->dataProvider->getById($employee->getId()));
    }
}
