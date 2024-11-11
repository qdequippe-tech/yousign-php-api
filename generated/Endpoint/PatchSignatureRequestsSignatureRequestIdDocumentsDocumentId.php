<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchSignatureRequestsSignatureRequestIdDocumentsDocumentId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Document. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, ?UpdateDocument $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}'], [$this->signatureRequestId, $this->documentId], '/signature_requests/{signatureRequestId}/documents/{documentId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateDocument) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
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
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdBadRequestException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnsupportedMediaTypeException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdTooManyRequestsException
     * @throws PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Document::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdDocumentsDocumentIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
