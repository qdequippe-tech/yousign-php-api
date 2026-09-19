<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetDocumentAnalyses200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetDocumentAnalyses extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Document Trust Analyses within your organization.
     * You can limit the number of items returned by using filters and pagination.
     * Consult our [guide](https://developers.youtrust.com/docs/document-analysis) for more details and examples.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Document Analysis or Document Trust Advanced`
     *
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "status"?: array, //Filter by `status`. Allowed operators: `eq`.
     * Example: `status[eq]=done`
     *    "type"?: array, //Filter by `type`. Allowed operators: `eq`.
     * Example: `type[eq]=social_security`
     *    "workspace_id"?: array, //Filter by `workspace_id`. Allowed operators: `eq`.
     * Example: `workspace_id[eq]=9b6ed2f3-244f-487a-baa1-bbe4f51c8748`
     *    "workflow_session_id"?: array, //Filter by `workflow_session_id`. Allowed operators: `eq`.
     * Example: `workflow_session_id[eq]=18a5e211-ff33-48e2-810c-a0397b558611`
     * } $queryParameters
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/document_analyses';
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
        $optionsResolver->setDefined(['after', 'limit', 'status', 'type', 'workspace_id', 'workflow_session_id']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('status', ['array']);
        $optionsResolver->addAllowedTypes('type', ['array']);
        $optionsResolver->addAllowedTypes('workspace_id', ['array']);
        $optionsResolver->addAllowedTypes('workflow_session_id', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['status' => ['style' => 'deepObject', 'explode' => true], 'type' => ['style' => 'deepObject', 'explode' => true], 'workspace_id' => ['style' => 'deepObject', 'explode' => true], 'workflow_session_id' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return GetDocumentAnalyses200Response|null
     *
     * @throws GetDocumentAnalysesBadRequestException
     * @throws GetDocumentAnalysesUnauthorizedException
     * @throws GetDocumentAnalysesForbiddenException
     * @throws GetDocumentAnalysesMethodNotAllowedException
     * @throws GetDocumentAnalysesTooManyRequestsException
     * @throws GetDocumentAnalysesInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetDocumentAnalyses200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
