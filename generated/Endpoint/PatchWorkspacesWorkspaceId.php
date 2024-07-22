<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\UpdateWorkspace;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Model\Workspace;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchWorkspacesWorkspaceId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Workspace.
     * Any parameters not provided are left unchanged.
     *
     * @param string $workspaceId Workspace Id
     */
    public function __construct(protected string $workspaceId, ?UpdateWorkspace $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{workspaceId}'], [$this->workspaceId], '/workspaces/{workspaceId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateWorkspace) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Workspace|null
     *
     * @throws PatchWorkspacesWorkspaceIdBadRequestException
     * @throws PatchWorkspacesWorkspaceIdUnauthorizedException
     * @throws PatchWorkspacesWorkspaceIdForbiddenException
     * @throws PatchWorkspacesWorkspaceIdNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Workspace::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
