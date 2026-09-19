<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Adds a Signer to a given Signer Document Request. This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/document_requests/{documentRequestId}/signers/{signerId}');
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
     * @return SignerDocumentRequest|null
     *
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdMethodNotAllowedException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException
     * @throws PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, SignerDocumentRequest::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
