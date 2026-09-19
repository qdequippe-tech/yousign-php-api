<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignersSignerIdAuditTrailsDownloadUnauthorizedException;
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

class GetSignersSignerIdAuditTrailsDownload extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Download the PDF version of the Audit Trail attached to a given Signer. Only possible when Signer status is `signed`.
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
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/audit_trails/download');
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
     * @throws GetSignersSignerIdAuditTrailsDownloadBadRequestException
     * @throws GetSignersSignerIdAuditTrailsDownloadUnauthorizedException
     * @throws GetSignersSignerIdAuditTrailsDownloadForbiddenException
     * @throws GetSignersSignerIdAuditTrailsDownloadNotFoundException
     * @throws GetSignersSignerIdAuditTrailsDownloadMethodNotAllowedException
     * @throws GetSignersSignerIdAuditTrailsDownloadTooManyRequestsException
     * @throws GetSignersSignerIdAuditTrailsDownloadInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignersSignerIdAuditTrailsDownloadInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
