<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteWorkspaceUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteWorkspace extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Delete a Workspace and migrate resources to a specified workspace. The deleted workspace should not have been migrated and should not be the default one.
     * Migrated resources are:
     * - BulkSendBatches
     * - Contacts
     * - SignatureRequests
     * - Templates
     * - Users (not already present in target workspace)
     * - WorkflowExecutions
     * - WorkflowFormQuestion
     * - WorkflowsWorkspace
     * - WorkspaceInvitations.
     *
     * @param string $workspaceId Workspace Id
     */
    public function __construct(protected string $workspaceId, ?\Qdequippe\Yousign\Api\Model\DeleteWorkspace $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{workspaceId}'], [$this->workspaceId], '/workspaces/{workspaceId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \Qdequippe\Yousign\Api\Model\DeleteWorkspace) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws DeleteWorkspaceBadRequestException
     * @throws DeleteWorkspaceUnauthorizedException
     * @throws DeleteWorkspaceForbiddenException
     * @throws DeleteWorkspaceNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteWorkspaceNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
