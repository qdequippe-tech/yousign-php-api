<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealImageUnauthorizedException;
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

class DeleteElectronicSealImage extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes a given Electronic Seal Image.
     *
     * @param string $electronicSealImageId Electronic Seal Image Id
     */
    public function __construct(protected string $electronicSealImageId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealImageId}'], [rawurlencode($this->electronicSealImageId)], '/electronic_seal_images/{electronicSealImageId}');
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
     * @throws DeleteElectronicSealImageUnauthorizedException
     * @throws DeleteElectronicSealImageForbiddenException
     * @throws DeleteElectronicSealImageNotFoundException
     * @throws DeleteElectronicSealImageMethodNotAllowedException
     * @throws DeleteElectronicSealImageTooManyRequestsException
     * @throws DeleteElectronicSealImageInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealImageInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
