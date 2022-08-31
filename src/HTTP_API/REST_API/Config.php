<?php

namespace App\HTTP_API\REST_API;

class Config
{
    public static array $get = [
        'isStub' => false,
        'isEnabledLogger' => true,
        'isCachingResponse' => false,
        'baseUri' => 'https://dog.ceo/api/',
    ];
}
