<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PutWorkspacesWorkspaceIdUsers extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Associates a User with a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $userId      User Id
     */
    public function __construct(protected string $workspaceId, protected string $userId)
    {
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{workspaceId}', '{userId}'], [rawurlencode($this->workspaceId), rawurlencode($this->userId)], '/workspaces/{workspaceId}/users/{userId}');
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
     * @throws PutWorkspacesWorkspaceIdUsersBadRequestException
     * @throws PutWorkspacesWorkspaceIdUsersUnauthorizedException
     * @throws PutWorkspacesWorkspaceIdUsersForbiddenException
     * @throws PutWorkspacesWorkspaceIdUsersNotFoundException
     * @throws PutWorkspacesWorkspaceIdUsersMethodNotAllowedException
     * @throws PutWorkspacesWorkspaceIdUsersTooManyRequestsException
     * @throws PutWorkspacesWorkspaceIdUsersInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
