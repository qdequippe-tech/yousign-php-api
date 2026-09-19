<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\WorkflowSession;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetWorkflowSessionsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves a given Workflow Session.
     *
     * @param string $workflowSessionId Workflow Session Id
     */
    public function __construct(protected string $workflowSessionId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{workflowSessionId}'], [rawurlencode($this->workflowSessionId)], '/workflow_sessions/{workflowSessionId}');
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
     * @return WorkflowSession|null
     *
     * @throws GetWorkflowSessionsIdBadRequestException
     * @throws GetWorkflowSessionsIdUnauthorizedException
     * @throws GetWorkflowSessionsIdForbiddenException
     * @throws GetWorkflowSessionsIdNotFoundException
     * @throws GetWorkflowSessionsIdMethodNotAllowedException
     * @throws GetWorkflowSessionsIdTooManyRequestsException
     * @throws GetWorkflowSessionsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, WorkflowSession::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
