<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Uri;
use Interop\Http\Factory\UriFactoryInterface;
use Psr\Http\Message\UriInterface;

class UriFactory implements UriFactoryInterface
{
    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}
