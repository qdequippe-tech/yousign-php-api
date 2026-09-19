<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetCustomPropertiesIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CustomProperty;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetCustomPropertiesId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves a specific custom property by its ID.
     * Returns the complete property definition including all options for list types.
     *
     * @param string $customPropertyId Custom Property Id
     */
    public function __construct(protected string $customPropertyId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{customPropertyId}'], [rawurlencode($this->customPropertyId)], '/custom_properties/{customPropertyId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return CustomProperty|null
     *
     * @throws GetCustomPropertiesIdBadRequestException
     * @throws GetCustomPropertiesIdUnauthorizedException
     * @throws GetCustomPropertiesIdForbiddenException
     * @throws GetCustomPropertiesIdNotFoundException
     * @throws GetCustomPropertiesIdMethodNotAllowedException
     * @throws GetCustomPropertiesIdTooManyRequestsException
     * @throws GetCustomPropertiesIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CustomProperty::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomPropertiesIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
