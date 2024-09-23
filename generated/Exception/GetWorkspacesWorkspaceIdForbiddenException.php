<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;

class GetWorkspacesWorkspaceIdForbiddenException extends ForbiddenException
{
    public function __construct(private readonly ForbiddenResponse $forbiddenResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('Access forbidden');
    }

    public function getForbiddenResponse(): ForbiddenResponse
    {
        return $this->forbiddenResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
