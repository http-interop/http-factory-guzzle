<?php

namespace Http\Factory\Guzzle;

use Interop\Http\Factory\StreamFactoryInterface;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream($resource)
    {
        return \GuzzleHttp\Psr7\stream_for($resource);
    }
}
