<?php

namespace Http\Factory\Guzzle;

use GuzzleHttp\Psr7\UploadedFile;
use Interop\Http\Factory\UploadedFileFactoryInterface;

class UploadedFileFactory implements UploadedFileFactoryInterface
{
    public function createUploadedFile(
        $file,
        $size = null,
        $error = \UPLOAD_ERR_OK,
        $clientFilename = null,
        $clientMediaType = null
    ) {
        if ($size === null) {
            if (is_string($file)) {
                $size = filesize($file);
            } else {
                $stats = fstat($file);
                $size = $stats['size'];
            }
        }

        return new UploadedFile($file, $size, $error, $clientFilename, $clientMediaType);
    }
}
