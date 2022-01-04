<?php

namespace App\SoftwareEngineeringPrinciples\System\Interfaces;

interface DataProvider
{
    public function getById(int $id): array;
    public function getAll(): array;
}
