<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdCancelUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancel201Response;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsSignatureRequestIdCancelRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdCancel extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Cancels a Signature Request when it is in `approval` or `ongoing` status. A canceled Signature Request cannot be reactivated.
     *
     * @param string $signatureRequestId Signature Request Id
     */
    public function __construct(protected string $signatureRequestId, ?PostSignatureRequestsSignatureRequestIdCancelRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [rawurlencode($this->signatureRequestId)], '/signature_requests/{signatureRequestId}/cancel');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof PostSignatureRequestsSignatureRequestIdCancelRequest) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return PostSignatureRequestsSignatureRequestIdCancel201Response|null
     *
     * @throws PostSignatureRequestsSignatureRequestIdCancelBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdCancelUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdCancelForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdCancelNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdCancelMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdCancelUnsupportedMediaTypeException
     * @throws PostSignatureRequestsSignatureRequestIdCancelTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdCancelInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, PostSignatureRequestsSignatureRequestIdCancel201Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdCancelInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
