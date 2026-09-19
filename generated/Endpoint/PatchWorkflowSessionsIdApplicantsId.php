<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchWorkflowSessionsIdApplicantsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UpdateWorkflowSessionApplicant;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PatchWorkflowSessionsIdApplicantsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Applicant for a Workflow Session.
     *
     * @param string $workflowSessionId Workflow Session Id
     * @param string $applicantId       Applicant Id
     */
    public function __construct(protected string $workflowSessionId, protected string $applicantId, ?UpdateWorkflowSessionApplicant $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{workflowSessionId}', '{applicantId}'], [rawurlencode($this->workflowSessionId), rawurlencode($this->applicantId)], '/workflow_sessions/{workflowSessionId}/applicants/{applicantId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateWorkflowSessionApplicant) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws PatchWorkflowSessionsIdApplicantsIdBadRequestException
     * @throws PatchWorkflowSessionsIdApplicantsIdUnauthorizedException
     * @throws PatchWorkflowSessionsIdApplicantsIdForbiddenException
     * @throws PatchWorkflowSessionsIdApplicantsIdNotFoundException
     * @throws PatchWorkflowSessionsIdApplicantsIdMethodNotAllowedException
     * @throws PatchWorkflowSessionsIdApplicantsIdTooManyRequestsException
     * @throws PatchWorkflowSessionsIdApplicantsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchWorkflowSessionsIdApplicantsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
