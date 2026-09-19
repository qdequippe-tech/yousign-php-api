<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailBadRequestException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailForbiddenException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailNotFoundException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailUnauthorizedException;
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

class DownloadElectronicSealAuditTrail extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Electronic Seal Audit Trail is only available when the Electronic Seal is "done".
     *
     * @param string $electronicSealId Electronic Seal Id
     * @param array  $accept           Accept content header application/pdf|application/json
     */
    public function __construct(protected string $electronicSealId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealId}'], [rawurlencode($this->electronicSealId)], '/electronic_seals/{electronicSealId}/audit_trails/download');
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
     * @throws DownloadElectronicSealAuditTrailBadRequestException
     * @throws DownloadElectronicSealAuditTrailUnauthorizedException
     * @throws DownloadElectronicSealAuditTrailForbiddenException
     * @throws DownloadElectronicSealAuditTrailNotFoundException
     * @throws DownloadElectronicSealAuditTrailMethodNotAllowedException
     * @throws DownloadElectronicSealAuditTrailTooManyRequestsException
     * @throws DownloadElectronicSealAuditTrailInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
