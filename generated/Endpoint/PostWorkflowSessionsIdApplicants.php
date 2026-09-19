<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostWorkflowSessionsIdApplicantsUnauthorizedException;
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

class PostWorkflowSessionsIdApplicants extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Creates a new Applicant for a given Workflow Session.
     *
     * @param string     $workflowSessionId Workflow Session Id
     * @param mixed|null $requestBody
     */
    public function __construct(protected string $workflowSessionId, $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{workflowSessionId}'], [rawurlencode($this->workflowSessionId)], '/workflow_sessions/{workflowSessionId}/applicants');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if (null !== $this->body) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws PostWorkflowSessionsIdApplicantsBadRequestException
     * @throws PostWorkflowSessionsIdApplicantsUnauthorizedException
     * @throws PostWorkflowSessionsIdApplicantsForbiddenException
     * @throws PostWorkflowSessionsIdApplicantsNotFoundException
     * @throws PostWorkflowSessionsIdApplicantsMethodNotAllowedException
     * @throws PostWorkflowSessionsIdApplicantsTooManyRequestsException
     * @throws PostWorkflowSessionsIdApplicantsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostWorkflowSessionsIdApplicantsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
