<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes a given Field from a Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fieldId            Field Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, protected string $fieldId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}', '{fieldId}'], [$this->signatureRequestId, $this->documentId, $this->fieldId], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields/{fieldId}');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
