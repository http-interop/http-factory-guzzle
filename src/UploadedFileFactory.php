<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\UploadedFile;
use Interop\Http\Factory\UploadedFileFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;

class UploadedFileFactory implements UploadedFileFactoryInterface
{
    public function createUploadedFile(
        StreamInterface $stream,
        int $size = null,
        int $error = \UPLOAD_ERR_OK,
        string $clientFilename = null,
        string $clientMediaType = null
    ): UploadedFileInterface {
        if ($size === null) {
            $stats = fstat($stream);
            $size = $stats['size'];
        }

        return new UploadedFile($stream, $size, $error, $clientFilename, $clientMediaType);
    }
}
