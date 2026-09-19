<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealImagesPreviewUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayload;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostElectronicSealImagesPreview extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Generate a PNG preview of an Electronic Seal Image based on the given field dimensions,
     * an optional uploaded image, and an optional caption.
     * This allows integrators to visualize the seal rendering before creating an Electronic Seal.
     *
     * **This endpoint is only available in Sandbox environment.**
     *
     * @param array $accept Accept content header image/png|application/json
     */
    public function __construct(?CreateElectronicSealImagePreviewPayload $requestBody = null, protected array $accept = [])
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/electronic_seal_images/preview';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateElectronicSealImagePreviewPayload) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['image/png', 'application/json']];
        }

        return $this->accept;
    }

    /**
     * @throws PostElectronicSealImagesPreviewBadRequestException
     * @throws PostElectronicSealImagesPreviewUnauthorizedException
     * @throws PostElectronicSealImagesPreviewForbiddenException
     * @throws PostElectronicSealImagesPreviewNotFoundException
     * @throws PostElectronicSealImagesPreviewMethodNotAllowedException
     * @throws PostElectronicSealImagesPreviewTooManyRequestsException
     * @throws PostElectronicSealImagesPreviewInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostElectronicSealImagesPreviewInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
