<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsIdPauseUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\PostSignatureRequestsIdPause201Response;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsIdPause extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Pauses a Signature Request when it is in `approval` or `ongoing` status. All signers and approvers must be in `initiated` or `notified` status, and no AES or QES signer may have started their identification process. Recipients may have previously opened their signing link. A paused Signature Request can be edited and then resumed.
     *
     * @param string $signatureRequestId Signature Request Id
     */
    public function __construct(protected string $signatureRequestId)
    {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [rawurlencode($this->signatureRequestId)], '/signature_requests/{signatureRequestId}/pause');
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
     * @return PostSignatureRequestsIdPause201Response|null
     *
     * @throws PostSignatureRequestsIdPauseBadRequestException
     * @throws PostSignatureRequestsIdPauseUnauthorizedException
     * @throws PostSignatureRequestsIdPauseForbiddenException
     * @throws PostSignatureRequestsIdPauseNotFoundException
     * @throws PostSignatureRequestsIdPauseMethodNotAllowedException
     * @throws PostSignatureRequestsIdPauseTooManyRequestsException
     * @throws PostSignatureRequestsIdPauseInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, PostSignatureRequestsIdPause201Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsIdPauseInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
