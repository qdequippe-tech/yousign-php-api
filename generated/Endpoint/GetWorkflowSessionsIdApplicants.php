<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetWorkflowSessionsIdApplicantsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetWorkflowSessionsIdApplicants200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetWorkflowSessionsIdApplicants extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Applicants for a given Workflow Session.
     *
     * @param string $workflowSessionId Workflow Session Id
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "status"?: string, //Filter Applicants by status.
     *    "parent_applicant_id"?: string, //Filter Applicants by parent Applicant.
     * } $queryParameters
     */
    public function __construct(protected string $workflowSessionId, array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{workflowSessionId}'], [rawurlencode($this->workflowSessionId)], '/workflow_sessions/{workflowSessionId}/applicants');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['after', 'limit', 'status', 'parent_applicant_id']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('status', ['string']);
        $optionsResolver->addAllowedTypes('parent_applicant_id', ['string']);

        return $optionsResolver;
    }

    /**
     * @return GetWorkflowSessionsIdApplicants200Response|null
     *
     * @throws GetWorkflowSessionsIdApplicantsBadRequestException
     * @throws GetWorkflowSessionsIdApplicantsUnauthorizedException
     * @throws GetWorkflowSessionsIdApplicantsForbiddenException
     * @throws GetWorkflowSessionsIdApplicantsMethodNotAllowedException
     * @throws GetWorkflowSessionsIdApplicantsTooManyRequestsException
     * @throws GetWorkflowSessionsIdApplicantsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetWorkflowSessionsIdApplicants200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetWorkflowSessionsIdApplicantsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
