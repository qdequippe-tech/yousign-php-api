<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdSignersIdUnblockIdentificationUnauthorizedException;
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

class PostSignatureRequestsIdSignersIdUnblockIdentification extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Unblock a Signer during a Qualified Electronic Signature in cases where a mismatch was previously detected between the sender-provided first and/or last name and the information on the Signer's ID document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/unblock_identification');
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
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationBadRequestException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationUnauthorizedException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationForbiddenException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationNotFoundException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationMethodNotAllowedException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationTooManyRequestsException
     * @throws PostSignatureRequestsIdSignersIdUnblockIdentificationInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdSignersIdUnblockIdentificationInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
