<?php

namespace App\HTTP_API\SymfonyHttpFoundationComponent\Controllers;

use App\HTTP_API\SymfonyHttpFoundationComponent\Repositories\UserRepository;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class MainController
{
    public static function getAll()
    {
        self::sendResponse(json_encode(UserRepository::getAll()));
    }

    public static function getOne(int $id)
    {
        try {
            self::sendResponse(json_encode(UserRepository::getOneById($id)));
        } catch (Exception $e) {

            self::sendResponse(json_encode($e->getMessage()), Response::HTTP_NOT_FOUND);
        }
    }

    private static function sendResponse(string $responseContent, int $status = Response::HTTP_OK)
    {
        $response = new Response(
            $responseContent,
            $status,
            ['content-type' => 'application/json']
        );

        $response->send();
    }
}

