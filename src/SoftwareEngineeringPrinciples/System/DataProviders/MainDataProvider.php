<?php

namespace App\SoftwareEngineeringPrinciples\System\DataProviders;

use App\SoftwareEngineeringPrinciples\System\Interfaces\DataProvider;

class MainDataProvider implements DataProvider
{
    private array $data = [
        1 => [6, 5, 8, 8, 5.5],
        2 => [6, 5.5, 8, 8, 5],
        3 => [6.5, 5, 8, 8, 5.5],
    ];

    public function getById(int $id): array
    {
        return $this->data[$id];
    }

    public function getAll(): array
    {
        return $this->data;
    }
}
