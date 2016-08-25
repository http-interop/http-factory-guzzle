<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\Response;
use Interop\Http\Factory\ResponseFactoryInterface;

class ResponseFactory implements ResponseFactoryInterface
{
    public function createResponse($code = 200)
    {
        return new Response($code);
    }
}
