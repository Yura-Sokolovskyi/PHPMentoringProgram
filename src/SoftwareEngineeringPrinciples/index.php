<?php

require_once '../../vendor/autoload.php';

use App\SoftwareEngineeringPrinciples\Controllers\MainController;
use App\SoftwareEngineeringPrinciples\System\Builders\EmployeeBuilder;
use App\SoftwareEngineeringPrinciples\System\Counters\MainWorkHoursCounter;
use App\SoftwareEngineeringPrinciples\System\DataProviders\MainDataProvider;
use App\SoftwareEngineeringPrinciples\System\DataProviders\MainEmployeeDataProvider;
use App\SoftwareEngineeringPrinciples\System\Counters\MainSalaryCounter;
use App\SoftwareEngineeringPrinciples\System\Models\Employee;
use App\SoftwareEngineeringPrinciples\System\Models\Waiter;

$hoursCounter = (new MainWorkHoursCounter())
    ->setDaraProvider(new MainDataProvider());

$employeeBuilder = (new EmployeeBuilder())
    ->setDataProvider(new MainEmployeeDataProvider())
    ->setEmployeeType(Employee::class);

$salaryCounter = (new MainSalaryCounter())
    ->setWorkHoursCounter($hoursCounter)
    ->setEmployeeBuilder($employeeBuilder);

echo MainController::getUsersSalary($salaryCounter);

$employeeBuilder->setEmployeeType(Waiter::class);

echo MainController::getUsersSalary($salaryCounter);
