<?php

namespace App\HTTP_API\REST_API\Decorators;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class LogDecorator extends AbstractDecorator
{
    /**
     * @throws GuzzleException
     */
    public function makeRequest($method, $uri, $options): ResponseInterface
    {
        $response = $this->client->request($method, $uri, $options);

        $requestJson = json_encode([
            'method' => $method,
            'uri' => $uri,
            'options' => $options,
        ]);

        $this->createLog($requestJson);

        $responseJson = json_encode([
            'headers' => $response->getHeaders(),
            'statusCode' => $response->getStatusCode(),
            'content' => $response->getBody()->getContents(),
        ]);

        $this->createLog($responseJson, false);

        return $response;
    }

    private function createLog($data, $isRequest = true)
    {
        $file = __DIR__.'/../logs.txt';

        $name = $isRequest ? 'Request' : 'Response';

        $log = sprintf('%s %s: %s', date('Y-m-d H:i:s'), $name, $data).PHP_EOL;

        file_put_contents($file, $log, FILE_APPEND | LOCK_EX);
    }
}
