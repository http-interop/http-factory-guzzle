<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Utils;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;

use function function_exists;
use function GuzzleHttp\Psr7\stream_for;
use function GuzzleHttp\Psr7\try_fopen;

class StreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        if (function_exists('GuzzleHttp\Psr7\stream_for')) {
            // fallback for guzzlehttp/psr7<1.7.0
            return stream_for($content);
        }

        return Utils::streamFor($content);
    }

    public function createStreamFromFile(string $file, string $mode = 'r'): StreamInterface
    {
        if (function_exists('GuzzleHttp\Psr7\try_fopen')) {
            // fallback for guzzlehttp/psr7<1.7.0
            $resource = try_fopen($file, $mode);
        } else {
            $resource = Utils::tryFopen($file, $mode);
        }


        return $this->createStreamFromResource($resource);
    }

    public function createStreamFromResource($resource): StreamInterface
    {
        return new Stream($resource);
    }
}
