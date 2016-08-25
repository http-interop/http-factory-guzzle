<?php

namespace Http\Factory\Guzzle;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Http\Message\RequestInterface;

class RequestFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new RequestFactory();
    }

    private function assertRequest($request, $method, $uri)
    {
        $this->assertInstanceOf(RequestInterface::class, $request);
        $this->assertSame($method, $request->getMethod());
        $this->assertSame($uri, (string) $request->getUri());
    }

    public function dataMethods()
    {
        return [
            ['GET'],
            ['POST'],
            ['PUT'],
            ['DELETE'],
            ['OPTIONS'],
            ['HEAD'],
        ];
    }

    /**
     * @dataProvider dataMethods
     */
    public function testCreateRequest($method)
    {
        $uri = 'http://example.com/';

        $request = $this->factory->createRequest($method, $uri);

        $this->assertRequest($request, $method, $uri);
    }

    public function testCreateRequestWithUri()
    {
        $uriFactory = new UriFactory();

        $method = 'GET';
        $uri = 'http://example.com/';

        $request = $this->factory->createRequest($method, $uriFactory->createUri($uri));

        $this->assertRequest($request, $method, $uri);
    }
}
