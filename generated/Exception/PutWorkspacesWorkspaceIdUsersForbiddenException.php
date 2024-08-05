<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;

class PutWorkspacesWorkspaceIdUsersForbiddenException extends ForbiddenException
{
    public function __construct(/**
     * @var ResponseInterface
     */
        private readonly ?ResponseInterface $response = null)
    {
        parent::__construct('Access forbidden');
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
