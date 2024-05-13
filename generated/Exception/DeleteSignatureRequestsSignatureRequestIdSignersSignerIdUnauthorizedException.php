<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;

class DeleteSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException extends UnauthorizedException
{
    public function __construct(private readonly GetSignatureRequests401Response $getSignatureRequests401Response, private readonly ResponseInterface $response)
    {
        parent::__construct('Access unauthorized');
    }

    public function getGetSignatureRequests401Response(): GetSignatureRequests401Response
    {
        return $this->getSignatureRequests401Response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
