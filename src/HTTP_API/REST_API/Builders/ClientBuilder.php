<?php

namespace App\HTTP_API\REST_API\Builders;

use App\HTTP_API\REST_API\Config;
use App\HTTP_API\REST_API\Decorators\ClientStubDecorator;
use App\HTTP_API\REST_API\Decorators\LogDecorator;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\FlysystemStorage;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use League\Flysystem\Adapter\Local;

class ClientBuilder
{
    public static function build(): ClientInterface
    {
        $config = Config::$get;

        $stack = HandlerStack::create();

        if ($config['isCachingResponse']) {
            $stack->push(
                new CacheMiddleware(
                    new PrivateCacheStrategy(
                        new FlysystemStorage(
                            new Local(__DIR__.'/../')
                        )
                    )
                ),
                'cache'
            );
        }

        $client = new Client(['base_uri' => $config['baseUri'], 'handler' => $stack]);

        if ($config['isEnabledLogger']) {
            $client = new LogDecorator($client);
        }

        if ($config['isStub']) {
            $client = new ClientStubDecorator($client);
        }

        return $client;
    }
}
