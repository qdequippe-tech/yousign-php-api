<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultBadRequestException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultForbiddenException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetConsumptions401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class MarkWorkspaceAsDefault extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Marks the given Workspace as default.
     */
    public function __construct(?\Qdequippe\Yousign\Api\Model\MarkWorkspaceAsDefault $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/workspaces/default';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Qdequippe\Yousign\Api\Model\MarkWorkspaceAsDefault) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws MarkWorkspaceAsDefaultBadRequestException
     * @throws MarkWorkspaceAsDefaultUnauthorizedException
     * @throws MarkWorkspaceAsDefaultForbiddenException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new MarkWorkspaceAsDefaultBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new MarkWorkspaceAsDefaultUnauthorizedException($serializer->deserialize($body, GetConsumptions401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new MarkWorkspaceAsDefaultForbiddenException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
