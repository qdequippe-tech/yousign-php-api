<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\GetConsumptions401Response;

class GetCustomExperiencesUnauthorizedException extends UnauthorizedException
{
    public function __construct(private readonly GetConsumptions401Response $getConsumptions401Response, private readonly ResponseInterface $response)
    {
        parent::__construct('Access unauthorized');
    }

    public function getGetConsumptions401Response(): GetConsumptions401Response
    {
        return $this->getConsumptions401Response;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
