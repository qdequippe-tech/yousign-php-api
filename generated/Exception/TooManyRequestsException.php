<?php

namespace Qdequippe\Yousign\Api\Exception;

class TooManyRequestsException extends \RuntimeException implements ClientException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 429);
    }
}
