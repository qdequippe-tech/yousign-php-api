<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnsupportedMediaTypeException;
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

class PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Adds a Field to a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document ID
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, ?\stdClass $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentId)], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields');
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
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnsupportedMediaTypeException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
