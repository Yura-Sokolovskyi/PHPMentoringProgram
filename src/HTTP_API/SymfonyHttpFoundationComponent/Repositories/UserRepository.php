<?php

namespace App\HTTP_API\SymfonyHttpFoundationComponent\Repositories;

use App\HTTP_API\SymfonyHttpFoundationComponent\Entities\User;
use Exception;

class UserRepository
{
    public static function getAll(): array
    {
        $users = [];

        foreach (self::getUsersAsJson() as $userData) {
            $users[] = self::buildUser($userData);
        }

        return $users;
    }

    /**
     * @throws Exception
     */
    public static function getOneById(int $Id): User
    {
        foreach (self::getUsersAsJson() as $userData) {
            if ($userData['id'] == $Id) {
                return self::buildUser($userData);
            }
        }

        throw new Exception(sprintf('Users with id %d isn\'t exists', $Id));
    }

    public static function buildUser(array $userData): User
    {
        return new User(
            $userData['id'],
            $userData['fist_name'],
            $userData['last_name'],
            $userData['email'],
            $userData['phone'],
        );
    }

    public static function getUsersAsJson()
    {
        return json_decode(file_get_contents(__DIR__.'/../users.json'), true);
    }
}

