<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PutSignatureRequestsIdLabelsIdUnauthorizedException;
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

class PutSignatureRequestsIdLabelsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Associates a Label with a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $labelId            Label Id
     */
    public function __construct(protected string $signatureRequestId, protected string $labelId)
    {
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{labelId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->labelId)], '/signature_requests/{signatureRequestId}/labels/{labelId}');
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
     * @throws PutSignatureRequestsIdLabelsIdBadRequestException
     * @throws PutSignatureRequestsIdLabelsIdUnauthorizedException
     * @throws PutSignatureRequestsIdLabelsIdForbiddenException
     * @throws PutSignatureRequestsIdLabelsIdNotFoundException
     * @throws PutSignatureRequestsIdLabelsIdMethodNotAllowedException
     * @throws PutSignatureRequestsIdLabelsIdTooManyRequestsException
     * @throws PutSignatureRequestsIdLabelsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PutSignatureRequestsIdLabelsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
