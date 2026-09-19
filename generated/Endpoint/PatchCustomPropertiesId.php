<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchCustomPropertiesIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CustomProperty;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UpdateCustomProperty;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PatchCustomPropertiesId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given custom property. Any parameters not provided are left unchanged.
     * The property type cannot be changed after creation.
     * For list properties, the options array must be sent in full to replace all options.
     *
     * @param string $customPropertyId Custom Property Id
     */
    public function __construct(protected string $customPropertyId, ?UpdateCustomProperty $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{customPropertyId}'], [rawurlencode($this->customPropertyId)], '/custom_properties/{customPropertyId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateCustomProperty) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return CustomProperty|null
     *
     * @throws PatchCustomPropertiesIdBadRequestException
     * @throws PatchCustomPropertiesIdUnauthorizedException
     * @throws PatchCustomPropertiesIdForbiddenException
     * @throws PatchCustomPropertiesIdNotFoundException
     * @throws PatchCustomPropertiesIdMethodNotAllowedException
     * @throws PatchCustomPropertiesIdTooManyRequestsException
     * @throws PatchCustomPropertiesIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CustomProperty::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchCustomPropertiesIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
