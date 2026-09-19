<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdUnauthorizedException;
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

class DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Delete a Signer Document Request from signature request. This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentRequestId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentRequestId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentRequestId)], '/signature_requests/{signatureRequestId}/document_requests/{documentRequestId}');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdMethodNotAllowedException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
