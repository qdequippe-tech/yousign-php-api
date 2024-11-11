<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\InternalServerError;

class GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadInternalServerErrorException extends InternalServerErrorException
{
    public function __construct(private readonly InternalServerError $internalServerError, private readonly ResponseInterface $response)
    {
        parent::__construct('Internal Server Error');
    }

    public function getInternalServerError(): InternalServerError
    {
        return $this->internalServerError;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
