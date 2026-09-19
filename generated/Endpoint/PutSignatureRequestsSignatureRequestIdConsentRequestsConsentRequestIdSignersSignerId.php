<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException;
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

class PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Adds a Signer to a given Signer Consent Request. This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $consentRequestId   Signer Consent Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $consentRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{consentRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->consentRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/consent_requests/{consentRequestId}/signers/{signerId}');
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
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException
     * @throws PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
