<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutWorkspacesWorkspaceIdUsersUnauthorizedException;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PutWorkspacesWorkspaceIdUsers extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
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
     * @throws PutWorkspacesWorkspaceIdUsersBadRequestException
     * @throws PutWorkspacesWorkspaceIdUsersUnauthorizedException
     * @throws PutWorkspacesWorkspaceIdUsersForbiddenException
     * @throws PutWorkspacesWorkspaceIdUsersNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutWorkspacesWorkspaceIdUsersNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
