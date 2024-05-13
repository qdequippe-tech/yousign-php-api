<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\SignerAuditTrail;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrails extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [$this->signatureRequestId, $this->signerId], '/signature_requests/{signatureRequestId}/signers/{signerId}/audit_trails');
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
     * @return SignerAuditTrail|null
     *
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, SignerAuditTrail::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdAuditTrailsNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
