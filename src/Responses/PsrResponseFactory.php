<?php

namespace MakeItCreative\Responses;

use MakeItCreative\Exception\ResponseException;
use Cake\Http\Response;
use League\Flysystem\FilesystemInterface;
use League\Glide\Filesystem\FilesystemException;
use League\Glide\Responses\ResponseFactoryInterface;
use Zend\Diactoros\Stream;

class PsrResponseFactory implements ResponseFactoryInterface
{
    /**
     * Create response.
     *
     * @param \League\Flysystem\FilesystemInterface $cache Cache file system.
     * @param string $path Cached file path.
     *
     * @return \Psr\Http\Message\ResponseInterface Response object.
     */
    public function create(FilesystemInterface $cache, $path)
    {
        $resource = $cache->readStream($path);
        if ($resource === false) {
            throw new ResponseException();
        }
        $stream = new Stream($resource);

        $contentType = $cache->getMimetype($path);
        $contentLength = $cache->getSize($path);

        if ($contentType === false) {
            throw new FilesystemException('Unable to determine the image content type.');
        }

        if ($contentLength === false) {
            throw new FilesystemException('Unable to determine the image content length.');
        }

        return (new Response())->withBody($stream)
            ->withHeader('Content-Type', $contentType)
            ->withHeader('Content-Length', (string)$contentLength);
    }
}
