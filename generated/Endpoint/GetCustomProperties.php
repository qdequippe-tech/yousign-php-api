<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CustomPropertyList;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetCustomProperties extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns all custom properties for the organization.
     * Results are paginated using cursor-based pagination.
     * Supports filtering by workspace and type.
     *
     * @param array{
     *    "workspace_id"?: string, //Filter properties applicable to a specific workspace.
     * Returns org-wide properties plus properties scoped to the specified workspace.
     *    "type"?: string, //Filter by field type.
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "after"?: string, //After cursor (pagination)
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
        return '/custom_properties';
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
        $optionsResolver->setDefined(['workspace_id', 'type', 'limit', 'after']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('workspace_id', ['string']);
        $optionsResolver->addAllowedTypes('type', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('after', ['string']);

        return $optionsResolver;
    }

    /**
     * @return CustomPropertyList|null
     *
     * @throws GetCustomPropertiesBadRequestException
     * @throws GetCustomPropertiesUnauthorizedException
     * @throws GetCustomPropertiesForbiddenException
     * @throws GetCustomPropertiesMethodNotAllowedException
     * @throws GetCustomPropertiesTooManyRequestsException
     * @throws GetCustomPropertiesInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CustomPropertyList::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
