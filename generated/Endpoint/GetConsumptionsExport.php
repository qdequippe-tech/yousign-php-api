<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportUnauthorizedException;
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
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetConsumptionsExport extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get a binary .csv file containing all the Consumption data of the underlying signatures.
     *
     * @param array{
     *    "from": string, //The "from" date must not be more than 1 year in the past
     *    "to": string, //The "to" date must be more recent than the "from" date
     *    "authentication_key"?: string, //The API authentication key to use to retrieve the data
     * } $queryParameters
     * @param array $accept Accept content header text/csv|application/json
     */
    public function __construct(array $queryParameters = [], protected array $accept = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/consumptions/export';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['text/csv', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['from', 'to', 'authentication_key']);
        $optionsResolver->setRequired(['from', 'to']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('from', ['string']);
        $optionsResolver->addAllowedTypes('to', ['string']);
        $optionsResolver->addAllowedTypes('authentication_key', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws GetConsumptionsExportBadRequestException
     * @throws GetConsumptionsExportUnauthorizedException
     * @throws GetConsumptionsExportForbiddenException
     * @throws GetConsumptionsExportNotFoundException
     * @throws GetConsumptionsExportMethodNotAllowedException
     * @throws GetConsumptionsExportTooManyRequestsException
     * @throws GetConsumptionsExportInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionsExportInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
