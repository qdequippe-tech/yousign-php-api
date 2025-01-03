<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Field. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fieldId            Field Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, protected string $fieldId, ?\stdClass $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}', '{fieldId}'], [$this->signatureRequestId, $this->documentId, $this->fieldId], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields/{fieldId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof \stdClass) {
            return [['Content-Type' => ['application/json']], json_encode($this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return json_decode($body);
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
