<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetVerificationsBankAccounts200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetVerificationsBankAccounts extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Bank Account Verifications within your organization. You can limit the number of items returned by using filters and pagination. Consult our [guide](https://developers.youtrust.com/docs/bank-account-details-verification) for more details and examples.
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
        return '/verifications/bank_accounts';
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
     * @return GetVerificationsBankAccounts200Response|null
     *
     * @throws GetVerificationsBankAccountsBadRequestException
     * @throws GetVerificationsBankAccountsUnauthorizedException
     * @throws GetVerificationsBankAccountsForbiddenException
     * @throws GetVerificationsBankAccountsMethodNotAllowedException
     * @throws GetVerificationsBankAccountsTooManyRequestsException
     * @throws GetVerificationsBankAccountsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetVerificationsBankAccounts200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
