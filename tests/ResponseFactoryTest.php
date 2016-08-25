<?php

namespace Http\Factory\Guzzle;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Http\Message\ResponseInterface;

class ResponseFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new ResponseFactory();
    }

    private function assertResponse($response, $code)
    {
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame($code, $response->getStatusCode());
    }

    public function dataCodes()
    {
        return [
            [200],
            [301],
            [404],
            [500],
        ];
    }

    /**
     * @dataProvider dataCodes
     */
    public function testCreateResponse($code)
    {
        $response = $this->factory->createResponse($code);

        $this->assertResponse($response, $code);
    }
}
