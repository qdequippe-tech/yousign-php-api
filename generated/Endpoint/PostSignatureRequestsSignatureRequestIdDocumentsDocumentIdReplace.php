<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplace extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Replace the file of a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, ?PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentId)], '/signature_requests/{signatureRequestId}/documents/{documentId}/replace');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceRequest) {
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

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Document|null
     *
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnsupportedMediaTypeException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, Document::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdReplaceInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
