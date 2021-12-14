<?php

namespace App\HTTP_API\REST_API\Decorators;

interface DecoratorInterface
{
    public function makeRequest($method, $uri, $options);
}
