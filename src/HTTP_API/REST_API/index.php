<?php

use App\HTTP_API\REST_API\Builders\ClientBuilder;
use Symfony\Component\HttpFoundation\Request;

require_once '../../../vendor/autoload.php';

$client = ClientBuilder::build();

echo match ((Request::createFromGlobals())->query->get('route')) {
    'allBreeds' => (string) ($client->request(
        'GET',
        'breeds/list/all'
    ))->getBody(),
    'randomImage' => (string) ($client->request(
        'GET',
        'breed/hound/images/random'
    ))->getBody(),
    default => 'Wrong rout',
};
