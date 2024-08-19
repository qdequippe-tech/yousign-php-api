<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;

class DownloadElectronicSealImageUnauthorizedException extends UnauthorizedException
{
    public function __construct(private readonly PostArchives401Response $postArchives401Response, private readonly ResponseInterface $response)
    {
        parent::__construct('Access unauthorized');
    }

    public function getPostArchives401Response(): PostArchives401Response
    {
        return $this->postArchives401Response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
