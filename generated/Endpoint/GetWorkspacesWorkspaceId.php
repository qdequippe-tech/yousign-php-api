<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetWorkspacesWorkspaceIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\Workspace;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetWorkspacesWorkspaceId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     */
    public function __construct(protected string $workspaceId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{workspaceId}'], [rawurlencode($this->workspaceId)], '/workspaces/{workspaceId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Workspace|null
     *
     * @throws GetWorkspacesWorkspaceIdBadRequestException
     * @throws GetWorkspacesWorkspaceIdUnauthorizedException
     * @throws GetWorkspacesWorkspaceIdForbiddenException
     * @throws GetWorkspacesWorkspaceIdNotFoundException
     * @throws GetWorkspacesWorkspaceIdMethodNotAllowedException
     * @throws GetWorkspacesWorkspaceIdTooManyRequestsException
     * @throws GetWorkspacesWorkspaceIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, Workspace::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkspacesWorkspaceIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
