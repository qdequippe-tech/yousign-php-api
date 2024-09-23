<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;

class DeleteElectronicSealImageNotFoundException extends NotFoundException
{
    public function __construct(private readonly NotFoundResponse $notFoundResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('Resource not found');
    }

    public function getNotFoundResponse(): NotFoundResponse
    {
        return $this->notFoundResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
