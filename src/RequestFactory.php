<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Request;
use Interop\Http\Factory\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

class RequestFactory implements RequestFactoryInterface
{
    public function createRequest(string $method, $uri): RequestInterface
    {
        return new Request($method, $uri);
    }
}
