<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Uri;
use Interop\Http\Factory\UriFactoryInterface;

class UriFactory implements UriFactoryInterface
{
    public function createUri($uri = '')
    {
        return new Uri($uri);
    }
}
