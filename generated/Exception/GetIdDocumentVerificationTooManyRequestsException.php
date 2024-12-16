<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;

class GetIdDocumentVerificationTooManyRequestsException extends TooManyRequestsException
{
    public function __construct(private readonly TooManyRequestsResponse $tooManyRequestsResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('Too Many Requests, please try again later.');
    }

    public function getTooManyRequestsResponse(): TooManyRequestsResponse
    {
        return $this->tooManyRequestsResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
