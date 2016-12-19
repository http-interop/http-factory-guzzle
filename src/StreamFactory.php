<?php

namespace Http\Factory\Guzzle;

use Interop\Http\Factory\StreamFactoryInterface;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream($content = '')
    {
        return \GuzzleHttp\Psr7\stream_for($content);
    }

    public function createStreamFromFile($file, $mode = 'r')
    {
        $resource = \GuzzleHttp\Psr7\try_fopen($file, $mode);

        return \GuzzleHttp\Psr7\stream_for($resource);
    }

    public function createStreamFromResource($resource)
    {
        return \GuzzleHttp\Psr7\stream_for($resource);
    }
}
