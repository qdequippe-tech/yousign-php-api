<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;

class PostCustomExperienceUnsupportedMediaTypeException extends UnsupportedMediaTypeException
{
    public function __construct(private readonly UnsupportedMediaTypeResponse $unsupportedMediaTypeResponse, private readonly ResponseInterface $response)
    {
        parent::__construct('UnsupportedMediaType');
    }

    public function getUnsupportedMediaTypeResponse(): UnsupportedMediaTypeResponse
    {
        return $this->unsupportedMediaTypeResponse;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
