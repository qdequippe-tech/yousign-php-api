<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;

class DeleteSignatureRequestsSignatureRequestIdSignersSignerIdMethodNotAllowedException extends MethodNotAllowedException
{
    public function __construct(private readonly MethodNotAllowed $methodNotAllowed, private readonly ResponseInterface $response)
    {
        parent::__construct('This method is not allowed');
    }

    public function getMethodNotAllowed(): MethodNotAllowed
    {
        return $this->methodNotAllowed;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
