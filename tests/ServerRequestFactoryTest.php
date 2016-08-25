<?php

namespace Http\Factory\Guzzle;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Http\Message\ServerRequestInterface;

class ServerRequestFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new ServerRequestFactory();
    }

    private function assertServerRequest($request, $method, $uri)
    {
        $this->assertInstanceOf(ServerRequestInterface::class, $request);
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
    public function testCreateServerRequest($method)
    {
        $uri = 'http://example.com/';

        $request = $this->factory->createServerRequest($method, $uri);

        $this->assertServerRequest($request, $method, $uri);
    }

    public function testCreateServerRequestWithUri()
    {
        $uriFactory = new UriFactory();

        $method = 'GET';
        $uri = 'http://example.com/';

        $request = $this->factory->createServerRequest($method, $uriFactory->createUri($uri));

        $this->assertServerRequest($request, $method, $uri);
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testCreateServerRequestFromGlobals()
    {
        $_SERVER['REQUEST_METHOD'] = $method = 'GET';
        $_SERVER['QUERY_STRING'] = $qs = 'foo=1&bar=true';
        $_SERVER['HTTP_HOST'] = $host = 'example.org';

        $uri = "http://{$host}/?$qs";

        $request = $this->factory->createServerRequestFromGlobals();

        $this->assertServerRequest($request, $method, $uri);
    }
}
