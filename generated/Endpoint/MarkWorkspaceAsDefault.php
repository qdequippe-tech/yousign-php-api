<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultBadRequestException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultForbiddenException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\MarkWorkspaceAsDefaultUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
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
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
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
     * @throws MarkWorkspaceAsDefaultMethodNotAllowedException
     * @throws MarkWorkspaceAsDefaultUnsupportedMediaTypeException
     * @throws MarkWorkspaceAsDefaultTooManyRequestsException
     * @throws MarkWorkspaceAsDefaultInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new MarkWorkspaceAsDefaultInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
