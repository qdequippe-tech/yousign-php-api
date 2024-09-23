<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;

class PostSignatureRequestsSignatureRequestIdSignersBadRequestException extends BadRequestException
{
    public function __construct(private readonly BadRequestResponse $badRequestResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('Bad request');
    }

    public function getBadRequestResponse(): BadRequestResponse
    {
        return $this->badRequestResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
