<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
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

class DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocuments extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes all documents uploaded by a given Signer for a specific Signature Request.
     * Deletion is only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/documents');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsMethodNotAllowedException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
