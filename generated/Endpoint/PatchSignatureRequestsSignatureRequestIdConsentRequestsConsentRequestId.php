<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\SignerConsentRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UpdateSignerConsentRequest;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Signer Consent Request.
     * Any parameters not provided are left unchanged.
     * This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $consentRequestId   Signer Consent Request Id
     */
    public function __construct(protected string $signatureRequestId, protected string $consentRequestId, ?UpdateSignerConsentRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{consentRequestId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->consentRequestId)], '/signature_requests/{signatureRequestId}/consent_requests/{consentRequestId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateSignerConsentRequest) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return SignerConsentRequest|null
     *
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException
     * @throws PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, SignerConsentRequest::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdConsentRequestsConsentRequestIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
