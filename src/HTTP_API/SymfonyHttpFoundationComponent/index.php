<?php

require_once '../../../vendor/autoload.php';

use App\HTTP_API\SymfonyHttpFoundationComponent\Controllers\MainController;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
$userId = $request->query->get('user');

if ($request->getMethod() === 'GET') {
    if ($userId) {
        MainController::getOne($userId);
    } else {
        MainController::getAll();
    }
}
