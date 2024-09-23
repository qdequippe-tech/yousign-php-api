<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;

class MarkWorkspaceAsDefaultUnauthorizedException extends UnauthorizedException
{
    public function __construct(private readonly UnauthorizedResponse $unauthorizedResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('Access unauthorized');
    }

    public function getUnauthorizedResponse(): UnauthorizedResponse
    {
        return $this->unauthorizedResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
