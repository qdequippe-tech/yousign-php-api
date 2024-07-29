<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailBadRequestException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailForbiddenException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailNotFoundException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealAuditTrailUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetConsumptions401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
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
     * @param array $accept Accept content header application/pdf|application/json
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
        return str_replace(['{electronicSealId}'], [$this->electronicSealId], '/electronic_seals/{electronicSealId}/audit_trails/download');
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
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailUnauthorizedException($serializer->deserialize($body, GetConsumptions401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealAuditTrailNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
