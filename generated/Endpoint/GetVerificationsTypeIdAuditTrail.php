<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsTypeIdAuditTrailUnauthorizedException;
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

class GetVerificationsTypeIdAuditTrail extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Downloads the Audit Trail of a given Verification. Only possible when the Verification status is `verified` or `failed`.
     *
     * @param string $verificationType type of the Verification for which to download the audit trail
     * @param string $verificationId   unique identifier of the Verification
     * @param array  $accept           Accept content header application/pdf|application/json
     */
    public function __construct(protected string $verificationType, protected string $verificationId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{verificationType}', '{verificationId}'], [rawurlencode($this->verificationType), rawurlencode($this->verificationId)], '/verifications/{verificationType}/{verificationId}/audit_trail');
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
     * @throws GetVerificationsTypeIdAuditTrailBadRequestException
     * @throws GetVerificationsTypeIdAuditTrailUnauthorizedException
     * @throws GetVerificationsTypeIdAuditTrailForbiddenException
     * @throws GetVerificationsTypeIdAuditTrailNotFoundException
     * @throws GetVerificationsTypeIdAuditTrailMethodNotAllowedException
     * @throws GetVerificationsTypeIdAuditTrailTooManyRequestsException
     * @throws GetVerificationsTypeIdAuditTrailInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsTypeIdAuditTrailInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
