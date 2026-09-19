<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetVerificationsBankAccountLookups200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetVerificationsBankAccountLookups extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Bank Account Lookup Verifications within your organization.
     * You can limit the number of items returned by using filters and pagination.
     * Consult our [guide](https://developers.youtrust.com/docs/bank-account-lookup-verification) for more details and examples.
     *
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "status"?: array, //Filter by `status`. Allowed operators: `eq`.
     * Example: `status[eq]=verified`
     *    "workspace_id"?: array, //Filter by `workspace_id`. Allowed operators: `eq`.
     * Example: `workspace_id[eq]=9b6ed2f3-244f-487a-baa1-bbe4f51c8748`
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
        return '/verifications/bank_account_lookups';
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
        $optionsResolver->setDefined(['after', 'limit', 'status', 'workspace_id']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('status', ['array']);
        $optionsResolver->addAllowedTypes('workspace_id', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['status' => ['style' => 'deepObject', 'explode' => true], 'workspace_id' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return GetVerificationsBankAccountLookups200Response|null
     *
     * @throws GetVerificationsBankAccountLookupsBadRequestException
     * @throws GetVerificationsBankAccountLookupsUnauthorizedException
     * @throws GetVerificationsBankAccountLookupsForbiddenException
     * @throws GetVerificationsBankAccountLookupsMethodNotAllowedException
     * @throws GetVerificationsBankAccountLookupsTooManyRequestsException
     * @throws GetVerificationsBankAccountLookupsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetVerificationsBankAccountLookups200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
