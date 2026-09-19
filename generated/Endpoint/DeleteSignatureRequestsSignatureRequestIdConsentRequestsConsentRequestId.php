<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException;
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

class DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Delete a Signer Consent Request from signature request. This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $consentRequestId   Signer Consent Request Id
     */
    public function __construct(protected string $signatureRequestId, protected string $consentRequestId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{consentRequestId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->consentRequestId)], '/signature_requests/{signatureRequestId}/consent_requests/{consentRequestId}');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
