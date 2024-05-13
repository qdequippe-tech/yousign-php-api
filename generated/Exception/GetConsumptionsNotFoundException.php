<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;

class GetConsumptionsNotFoundException extends NotFoundException
{
    public function __construct(/**
     * @var ResponseInterface
     */
        private readonly ?ResponseInterface $response = null)
    {
        parent::__construct('Resource not found');
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }
}
