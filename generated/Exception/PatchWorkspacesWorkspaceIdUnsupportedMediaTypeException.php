<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\ViolationResponse;

class PatchWorkspacesWorkspaceIdUnsupportedMediaTypeException extends UnsupportedMediaTypeException
{
    public function __construct(private readonly ViolationResponse $violationResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('UnsupportedMediaType');
    }

    public function getViolationResponse(): ViolationResponse
    {
        return $this->violationResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
