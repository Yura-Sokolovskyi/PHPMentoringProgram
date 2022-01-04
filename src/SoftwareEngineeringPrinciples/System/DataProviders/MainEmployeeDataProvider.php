<?php

namespace App\SoftwareEngineeringPrinciples\System\DataProviders;

use App\SoftwareEngineeringPrinciples\System\Interfaces\DataProvider;

class MainEmployeeDataProvider implements DataProvider
{
    private array $data = [
        1 => [
            'Tom',
            'Brown',
            2.5,
        ],
        2 => [
            'Bill',
            'White',
            3.5,
        ],
        3 => [
            'Dany',
            'Rouse',
            5.0,
        ],
    ];

    /**
     * @param  int  $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->data[$id];
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->data;
    }
}
