<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetElectronicSealAuditTrailUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetElectronicSealAuditTrail extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Electronic Seal Audit Trail is only available when the Electronic Seal is "done".
     *
     * @param string $electronicSealId Electronic Seal Id
     */
    public function __construct(protected string $electronicSealId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealId}'], [$this->electronicSealId], '/electronic_seals/{electronicSealId}/audit_trails');
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
     * @return ElectronicSealAuditTrail|null
     *
     * @throws GetElectronicSealAuditTrailBadRequestException
     * @throws GetElectronicSealAuditTrailUnauthorizedException
     * @throws GetElectronicSealAuditTrailForbiddenException
     * @throws GetElectronicSealAuditTrailNotFoundException
     * @throws GetElectronicSealAuditTrailTooManyRequestsException
     * @throws GetElectronicSealAuditTrailInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, ElectronicSealAuditTrail::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetElectronicSealAuditTrailInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
