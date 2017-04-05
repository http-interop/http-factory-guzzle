<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\ServerRequest;
use Interop\Http\Factory\ServerRequestFactoryInterface;

class ServerRequestFactory implements ServerRequestFactoryInterface
{
    public function createServerRequest($method, $uri)
    {
        return new ServerRequest($method, $uri);
    }

    public function createServerRequestFromArray(array $server)
    {
        if (isset($server['REQUEST_METHOD'])) {
            $method = $server['REQUEST_METHOD'];
        }

        if (null === $method) {
            throw new \InvalidArgumentException('Cannot determine HTTP method');
        }

        // TODO: find a MUCH better way
        $backup = $_SERVER;
        $_SERVER = $server;

        $uri = ServerRequest::getUriFromGlobals();

        $_SERVER = $backup;
        unset($backup);

        return new ServerRequest($method, $uri, [], null, '1.1', $server);
    }
}
