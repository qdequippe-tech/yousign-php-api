<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchWorkspacesWorkspaceIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateWorkspace;
use Qdequippe\Yousign\Api\Model\Workspace;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
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
        return str_replace(['{workspaceId}'], [rawurlencode($this->workspaceId)], '/workspaces/{workspaceId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateWorkspace) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
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
     * @throws PatchWorkspacesWorkspaceIdMethodNotAllowedException
     * @throws PatchWorkspacesWorkspaceIdUnsupportedMediaTypeException
     * @throws PatchWorkspacesWorkspaceIdTooManyRequestsException
     * @throws PatchWorkspacesWorkspaceIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, Workspace::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkspacesWorkspaceIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
