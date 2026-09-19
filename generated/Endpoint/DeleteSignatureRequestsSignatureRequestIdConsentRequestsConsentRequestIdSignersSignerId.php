<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException;
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

class DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Remove a Signer from a given Signer Consent Request. This action is only permitted when the Signature Request is a draft or paused.
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
        return 'DELETE';
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
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdSignersSignerIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
