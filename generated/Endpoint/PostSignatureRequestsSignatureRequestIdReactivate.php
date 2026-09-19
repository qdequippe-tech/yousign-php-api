<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdReactivateUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdReactivateRequest;
use Qdequippe\Yousign\Api\Model\SignatureRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdReactivate extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Reactivates a Signature Request when it is in `expired` status.
     *
     * @param string $signatureRequestId Signature Request Id
     */
    public function __construct(protected string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdReactivateRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [rawurlencode($this->signatureRequestId)], '/signature_requests/{signatureRequestId}/reactivate');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof PostSignatureRequestsSignatureRequestIdReactivateRequest) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return SignatureRequest|null
     *
     * @throws PostSignatureRequestsSignatureRequestIdReactivateBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateUnsupportedMediaTypeException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdReactivateInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, SignatureRequest::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdReactivateInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
