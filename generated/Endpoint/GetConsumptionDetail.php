<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetConsumptionDetail200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetConsumptionDetail extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the consumption of your organization over a specified period.
     *
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "from": string, //The starting date for data retrieval.
     *    "to": string, //The end date for data retrieval. The `to` date must be later than the `from` date and within one year of the `from` date.
     *    "breakdown_type"?: string, //Specifies how data is grouped. By default, it returns the total consumption for the entire organization. If set to `workspace`, the data will be grouped by Workspace.
     *    "workspace_ids"?: array, //A list of Workspace IDs to filter the results.
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
        return '/consumptions/detail';
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
        $optionsResolver->setDefined(['after', 'limit', 'from', 'to', 'breakdown_type', 'workspace_ids']);
        $optionsResolver->setRequired(['from', 'to']);
        $optionsResolver->setDefaults(['limit' => 100, 'breakdown_type' => 'organization']);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('from', ['string']);
        $optionsResolver->addAllowedTypes('to', ['string']);
        $optionsResolver->addAllowedTypes('breakdown_type', ['string']);
        $optionsResolver->addAllowedTypes('workspace_ids', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['workspace_ids' => ['style' => 'form', 'explode' => true]];
    }

    /**
     * @return GetConsumptionDetail200Response|null
     *
     * @throws GetConsumptionDetailBadRequestException
     * @throws GetConsumptionDetailUnauthorizedException
     * @throws GetConsumptionDetailForbiddenException
     * @throws GetConsumptionDetailMethodNotAllowedException
     * @throws GetConsumptionDetailTooManyRequestsException
     * @throws GetConsumptionDetailInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetConsumptionDetail200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetConsumptionDetailInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
