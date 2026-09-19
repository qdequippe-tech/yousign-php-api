<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsRecordsIdentificationsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetConsumptionsRecordsIdentifications200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetConsumptionsRecordsIdentifications extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of Identifications consumption records.
     *
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "created_at"?: array, //Filter by `created_at`. Allowed operators: `between`, `before`, `after`.
     * Format: `yyyy-mm-dd`
     * Examples:
     * - `created_at[between]=2025-03-02,2025-03-04`
     * - `created_at[after]=2025-03-02`
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
        return '/consumptions/records/identifications';
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
        $optionsResolver->setDefined(['after', 'limit', 'created_at']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('created_at', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['created_at' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return GetConsumptionsRecordsIdentifications200Response|null
     *
     * @throws GetConsumptionsRecordsIdentificationsBadRequestException
     * @throws GetConsumptionsRecordsIdentificationsUnauthorizedException
     * @throws GetConsumptionsRecordsIdentificationsForbiddenException
     * @throws GetConsumptionsRecordsIdentificationsNotFoundException
     * @throws GetConsumptionsRecordsIdentificationsMethodNotAllowedException
     * @throws GetConsumptionsRecordsIdentificationsTooManyRequestsException
     * @throws GetConsumptionsRecordsIdentificationsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetConsumptionsRecordsIdentifications200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsRecordsIdentificationsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
