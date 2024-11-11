<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignerConsentRequestsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignerConsentRequestsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignerConsentRequestsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignerConsentRequestsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignerConsentRequestsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsSignatureRequestIdSignerConsentRequests extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns a list of Signer Consent Requests for a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     */
    public function __construct(protected string $signatureRequestId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}/consent_requests');
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
     * @return GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response|null
     *
     * @throws GetSignatureRequestsSignatureRequestIdSignerConsentRequestsUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdSignerConsentRequestsForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdSignerConsentRequestsNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdSignerConsentRequestsTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdSignerConsentRequestsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class, 'json');
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignerConsentRequestsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignerConsentRequestsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignerConsentRequestsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignerConsentRequestsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignerConsentRequestsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
