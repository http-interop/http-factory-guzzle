<?php

namespace Http\Factory\Guzzle;

use PHPUnit_Framework_TestCase as TestCase;
use Psr\Http\Message\StreamInterface;

class StreamFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new StreamFactory();
    }

    private function assertStream($stream, $content)
    {
        $this->assertInstanceOf(StreamInterface::class, $stream);
        $this->assertSame($content, (string) $stream);
    }

    public function testCreateStream()
    {
        $resource = tmpfile();

        $stream = $this->factory->createStream($resource);

        $this->assertStream($stream, '');
    }

    public function testCreateStreamWithContent()
    {
        $string = 'would you like some crumpets?';

        $resource = tmpfile();
        fwrite($resource, $string);

        $stream = $this->factory->createStream($resource);

        $this->assertStream($stream, $string);
    }
}
