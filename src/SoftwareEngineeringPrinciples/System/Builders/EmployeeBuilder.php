<?php

namespace App\SoftwareEngineeringPrinciples\System\Builders;

use App\SoftwareEngineeringPrinciples\System\Interfaces\DataProvider;
use App\SoftwareEngineeringPrinciples\System\Interfaces\EmployeeBuilderInterface;

class EmployeeBuilder implements EmployeeBuilderInterface
{
    private DataProvider $dataProvider;
    private string $employeeType;

    /**
     * @param  string  $employeeType
     * @return EmployeeBuilder
     */
    public function setEmployeeType(string $employeeType): self
    {
        $this->employeeType = $employeeType;

        return $this;
    }

    /**
     * @param  DataProvider  $dataProvider
     * @return EmployeeBuilder
     */
    public function setDataProvider(DataProvider $dataProvider): self
    {
        $this->dataProvider = $dataProvider;

        return $this;
    }

    public function getEmployees(): array
    {
        $employees = [];

        foreach ($this->dataProvider->getAll() as $id => $employee) {
            $employees[] = new $this->employeeType($id, ...$employee);
        }

        return $employees;
    }
}
