<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Runtime\Client;

use Jane\OpenApiRuntime\Client\Exception\InvalidFetchModeException;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\SerializerInterface;

trait EndpointTrait
{
    abstract protected function transformResponseBody(string $body, int $status, SerializerInterface $serializer, ?string $contentType = null);

    public function parseResponse(ResponseInterface $response, SerializerInterface $serializer, string $fetchMode = Client::FETCH_OBJECT)
    {
        if (Client::FETCH_OBJECT === $fetchMode) {
            $contentType = $response->hasHeader('Content-Type') ? current($response->getHeader('Content-Type')) : null;

            return $this->transformResponseBody((string) $response->getBody(), $response->getStatusCode(), $serializer, $contentType);
        }
        if (Client::FETCH_RESPONSE === $fetchMode) {
            return $response;
        }
        throw new InvalidFetchModeException(sprintf('Fetch mode %s is not supported', $fetchMode));
    }
}
