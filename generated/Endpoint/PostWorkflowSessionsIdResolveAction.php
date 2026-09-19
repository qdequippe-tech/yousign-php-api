<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdResolveActionUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\ResolveWorkflowSessionAction;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostWorkflowSessionsIdResolveAction extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Resolve an Action in a Workflow Session. Once resolved, the Action is treated as having a `verified` status within the Action Group.
     * This is only allowed if the related resource is in a `pending`, `failed`, or `inconclusive` status.
     *
     * @param string $workflowSessionId Workflow Session Id
     */
    public function __construct(protected string $workflowSessionId, ?ResolveWorkflowSessionAction $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{workflowSessionId}'], [rawurlencode($this->workflowSessionId)], '/workflow_sessions/{workflowSessionId}/resolve_action');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof ResolveWorkflowSessionAction) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws PostWorkflowSessionsIdResolveActionBadRequestException
     * @throws PostWorkflowSessionsIdResolveActionUnauthorizedException
     * @throws PostWorkflowSessionsIdResolveActionForbiddenException
     * @throws PostWorkflowSessionsIdResolveActionNotFoundException
     * @throws PostWorkflowSessionsIdResolveActionMethodNotAllowedException
     * @throws PostWorkflowSessionsIdResolveActionTooManyRequestsException
     * @throws PostWorkflowSessionsIdResolveActionInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdResolveActionInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
