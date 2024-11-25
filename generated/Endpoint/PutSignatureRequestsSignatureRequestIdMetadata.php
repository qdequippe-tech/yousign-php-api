<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdMetadataUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\Metadata;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PutSignatureRequestsSignatureRequestIdMetadata extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates the Metadata of a given Signature Request. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     */
    public function __construct(protected string $signatureRequestId, ?Metadata $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}/metadata');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof Metadata) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Metadata|null
     *
     * @throws PutSignatureRequestsSignatureRequestIdMetadataBadRequestException
     * @throws PutSignatureRequestsSignatureRequestIdMetadataUnauthorizedException
     * @throws PutSignatureRequestsSignatureRequestIdMetadataForbiddenException
     * @throws PutSignatureRequestsSignatureRequestIdMetadataNotFoundException
     * @throws PutSignatureRequestsSignatureRequestIdMetadataTooManyRequestsException
     * @throws PutSignatureRequestsSignatureRequestIdMetadataInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Metadata::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdMetadataInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
