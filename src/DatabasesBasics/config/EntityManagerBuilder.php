<?php

namespace App\DatabasesBasics\config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class EntityManagerBuilder
{
    public static function build(): EntityManager
    {
        $isDevMode = true;
        $proxyDir = null;
        $cache = null;
        $useSimpleAnnotationReader = false;

        $config = Setup::createAnnotationMetadataConfiguration(
            [dirname(__DIR__, 1).'/Entities'],
            $isDevMode,
            $proxyDir,
            $cache,
            $useSimpleAnnotationReader
        );

        $connection = [
            'dbname' => 'test_db',
            'user' => '',
            'password' => '',
            'host' => '127.0.0.1',
            'driver' => 'pdo_mysql',
        ];

        return EntityManager::create($connection, $config);
    }
}
