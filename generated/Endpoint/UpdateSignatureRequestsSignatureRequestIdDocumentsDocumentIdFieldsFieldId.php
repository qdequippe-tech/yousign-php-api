<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
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
        return str_replace(['{signatureRequestId}', '{documentId}', '{fieldId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentId), rawurlencode($this->fieldId)], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields/{fieldId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
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
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdMethodNotAllowedException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException
     * @throws UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new UpdateSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsFieldIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
