<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Request;
use Interop\Http\Factory\RequestFactoryInterface;

class RequestFactory implements RequestFactoryInterface
{
    public function createRequest($method, $uri)
    {
        return new Request($method, $uri);
    }
}
