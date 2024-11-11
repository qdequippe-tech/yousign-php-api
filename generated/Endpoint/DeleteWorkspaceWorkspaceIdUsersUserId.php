<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceWorkspaceIdUsersUserIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteWorkspaceWorkspaceIdUsersUserId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Removes a User from a given Workspace.
     *
     * @param string $workspaceId Workspace Id
     * @param string $userId      User Id
     */
    public function __construct(protected string $workspaceId, protected string $userId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{workspaceId}', '{userId}'], [$this->workspaceId, $this->userId], '/workspaces/{workspaceId}/users/{userId}');
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
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdBadRequestException
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdUnauthorizedException
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdForbiddenException
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdNotFoundException
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdTooManyRequestsException
     * @throws DeleteWorkspaceWorkspaceIdUsersUserIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceWorkspaceIdUsersUserIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
