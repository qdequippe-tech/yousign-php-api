<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PatchSignatureRequestsSignatureRequestIdSignersSignerId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Signer.
     * Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId, ?UpdateSigner $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateSigner) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Signer|null
     *
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdBadRequestException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdForbiddenException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdNotFoundException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdMethodNotAllowedException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnsupportedMediaTypeException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdTooManyRequestsException
     * @throws PatchSignatureRequestsSignatureRequestIdSignersSignerIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, Signer::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdSignersSignerIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
