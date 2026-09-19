<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdLinksUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\WorkflowSessionLinks;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetWorkflowSessionsIdLinks extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Generates portal links for all Applicants in a given Workflow Session. A root's link also covers its child Applicants, so child Applicants are not returned as separate entries.
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
        return str_replace(['{workflowSessionId}'], [rawurlencode($this->workflowSessionId)], '/workflow_sessions/{workflowSessionId}/links');
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
     * @return WorkflowSessionLinks|null
     *
     * @throws GetWorkflowSessionsIdLinksBadRequestException
     * @throws GetWorkflowSessionsIdLinksUnauthorizedException
     * @throws GetWorkflowSessionsIdLinksForbiddenException
     * @throws GetWorkflowSessionsIdLinksNotFoundException
     * @throws GetWorkflowSessionsIdLinksMethodNotAllowedException
     * @throws GetWorkflowSessionsIdLinksTooManyRequestsException
     * @throws GetWorkflowSessionsIdLinksInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, WorkflowSessionLinks::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdLinksInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
