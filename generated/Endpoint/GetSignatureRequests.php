<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequests extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Signatures Requests in your organization. You can limit the number of items returned by using filters and pagination. Consult our guide for more details and examples.
     *
     * @param array{
     *    "after"?: string, //Cursor for pagination; pass the `meta.next_cursor` value from the previous response to fetch the next page.
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "status"?: array, //Filter by `status`. Allowed operators: `eq`, `in`.
     * Example: `status[in]=draft,done`
     *    "created_at"?: array, //Filter by `created_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `created_at[between]=2025-03-02,2025-03-04`
     *    "activated_at"?: array, //Filter by `activated_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `activated_at[after]=2025-03-01`
     *    "completed_at"?: array, //Filter by `completed_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `completed_at[between]=2025-03-01,2025-03-31`
     *    "approved_at"?: array, //Filter by `approved_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `approved_at[after]=2025-03-01`
     *    "rejected_at"?: array, //Filter by `rejected_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `rejected_at[before]=2025-04-01`
     *    "declined_at"?: array, //Filter by `declined_at`. Allowed operators: `eq`, `between`, `before`, `after`.
     * Format: the date format required is `yyyy-mm-dd`
     * Example: `declined_at[after]=2025-01-01`
     *    "workspace_id"?: array, //Filter by `workspace_id`. Allowed operators: `eq`.
     * Example: `workspace_id[eq]=9b6ed2f3-244f-487a-baa1-bbe4f51c8748`
     *    "external_id"?: array, //Filter by `external_id`. Allowed operators: `eq`.
     * Example: `external_id[eq]=an-external-id`
     *    "source"?: array, //Filter by `source`. Allowed operators: `eq`, `in`.
     * Default value: `source[eq]=public_api`. If not specified, only Signature Requests created via the Public API are returned.
     * Example: `source[in]=public_api,app`
     *    "q"?: string, //Free-text search on the Signature Request name.
     *    "label.name"?: array, //Case-sensitive filter by Label name. Allowed operators: `eq`, `in`.
     * Example: `label.name[in]=To Sign,Miscellaneous`
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
        return '/signature_requests';
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
        $optionsResolver->setDefined(['after', 'limit', 'status', 'created_at', 'activated_at', 'completed_at', 'approved_at', 'rejected_at', 'declined_at', 'workspace_id', 'external_id', 'source', 'q', 'label.name']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('status', ['array']);
        $optionsResolver->addAllowedTypes('created_at', ['array']);
        $optionsResolver->addAllowedTypes('activated_at', ['array']);
        $optionsResolver->addAllowedTypes('completed_at', ['array']);
        $optionsResolver->addAllowedTypes('approved_at', ['array']);
        $optionsResolver->addAllowedTypes('rejected_at', ['array']);
        $optionsResolver->addAllowedTypes('declined_at', ['array']);
        $optionsResolver->addAllowedTypes('workspace_id', ['array']);
        $optionsResolver->addAllowedTypes('external_id', ['array']);
        $optionsResolver->addAllowedTypes('source', ['array']);
        $optionsResolver->addAllowedTypes('q', ['string']);
        $optionsResolver->addAllowedTypes('label.name', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['status' => ['style' => 'deepObject', 'explode' => true], 'created_at' => ['style' => 'deepObject', 'explode' => true], 'activated_at' => ['style' => 'deepObject', 'explode' => true], 'completed_at' => ['style' => 'deepObject', 'explode' => true], 'approved_at' => ['style' => 'deepObject', 'explode' => true], 'rejected_at' => ['style' => 'deepObject', 'explode' => true], 'declined_at' => ['style' => 'deepObject', 'explode' => true], 'workspace_id' => ['style' => 'deepObject', 'explode' => true], 'external_id' => ['style' => 'deepObject', 'explode' => true], 'source' => ['style' => 'deepObject', 'explode' => true], 'label.name' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return GetSignatureRequests200Response|null
     *
     * @throws GetSignatureRequestsBadRequestException
     * @throws GetSignatureRequestsUnauthorizedException
     * @throws GetSignatureRequestsForbiddenException
     * @throws GetSignatureRequestsMethodNotAllowedException
     * @throws GetSignatureRequestsTooManyRequestsException
     * @throws GetSignatureRequestsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetSignatureRequests200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
