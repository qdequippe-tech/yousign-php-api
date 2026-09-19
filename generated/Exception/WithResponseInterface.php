<?php

namespace Qdequippe\Yousign\Api\Exception;

use Psr\Http\Message\ResponseInterface;

interface WithResponseInterface
{
    public function getResponse(): ?ResponseInterface;
}
