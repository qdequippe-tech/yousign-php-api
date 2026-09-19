<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadUnauthorizedException;
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

class GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownload extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Download the Verified Identity Proof (PDF) attached to a given Signer for a Qualified e-Signature. Only possible when Signer identification status is accepted. The identification must be recent and a Video Identity Verification.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param array  $accept             Accept content header application/pdf|application/json
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/verified_identity_proof/download');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/pdf', 'application/json']];
        }

        return $this->accept;
    }

    /**
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadBadRequestException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadUnauthorizedException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadForbiddenException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadNotFoundException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadMethodNotAllowedException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadTooManyRequestsException
     * @throws GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdSignersIdVerifiedIdentityProofDownloadInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
