<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentBadRequestException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentForbiddenException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentNotFoundException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\UploadElectronicSealDocumentUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\ElectronicSealDocument;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class UploadElectronicSealDocument extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Create an Electronic Seal Document.
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📁 `multipart/form-data` — upload a binary file.
     * - 📝 `application/json` — create from a JSON payload referencing a previously sealed source document.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Electronic Seal` or `Advanced Electronic Seal` or `Qualified Electronic Seal`
     *
     * @param CreateElectronicSealDocument|\stdClass|null $requestBody
     */
    public function __construct($requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/electronic_seal_documents';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateElectronicSealDocument) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            $partOptions = ['file' => ['filename' => 'file']];
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $value = \is_bool($value) ? $value ? 'true' : 'false' : $value;
                if (\is_array($value) || $value instanceof \stdClass) {
                    $value = $serializer->serialize((array) $value, 'json');
                }
                $resourceOptions = $partOptions[$key] ?? [];
                if (isset($resourceOptions['filename'])) {
                    $uri = null;
                    if ($value instanceof StreamInterface) {
                        $uri = $value->getMetadata('uri');
                    } elseif (\is_resource($value)) {
                        $uri = stream_get_meta_data($value)['uri'] ?? null;
                    }
                    if (\is_string($uri) && is_file($uri)) {
                        unset($resourceOptions['filename']);
                    }
                }
                $bodyBuilder->addResource($key, $value, $resourceOptions);
            }

            return [['Content-Type' => ['multipart/form-data; boundary="'.($bodyBuilder->getBoundary().'"')]], $bodyBuilder->build()];
        }
        if ($this->body instanceof \stdClass) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return ElectronicSealDocument|null
     *
     * @throws UploadElectronicSealDocumentBadRequestException
     * @throws UploadElectronicSealDocumentUnauthorizedException
     * @throws UploadElectronicSealDocumentForbiddenException
     * @throws UploadElectronicSealDocumentNotFoundException
     * @throws UploadElectronicSealDocumentMethodNotAllowedException
     * @throws UploadElectronicSealDocumentUnsupportedMediaTypeException
     * @throws UploadElectronicSealDocumentTooManyRequestsException
     * @throws UploadElectronicSealDocumentInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, ElectronicSealDocument::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UploadElectronicSealDocumentInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
