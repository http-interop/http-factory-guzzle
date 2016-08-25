<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\ServerRequest;
use Interop\Http\Factory\ServerRequestFactoryInterface;
use Interop\Http\Factory\ServerRequestFromGlobalsFactoryInterface;

class ServerRequestFactory implements ServerRequestFactoryInterface, ServerRequestFromGlobalsFactoryInterface
{
    public function createServerRequest($method, $uri)
    {
        return new ServerRequest($method, $uri);
    }

    public function createServerRequestFromGlobals()
    {
        return ServerRequest::fromGlobals();
    }
}
