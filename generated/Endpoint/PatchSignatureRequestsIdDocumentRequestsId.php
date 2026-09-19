<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsIdDocumentRequestsIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateSignerDocumentRequest;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PatchSignatureRequestsIdDocumentRequestsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Signer Document Request.
     * Any parameters not provided are left unchanged.
     * This action is only permitted when the Signature Request is a draft or paused.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentRequestId, ?UpdateSignerDocumentRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentRequestId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentRequestId)], '/signature_requests/{signatureRequestId}/document_requests/{documentRequestId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateSignerDocumentRequest) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return SignerDocumentRequest|null
     *
     * @throws PatchSignatureRequestsIdDocumentRequestsIdBadRequestException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdUnauthorizedException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdForbiddenException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdNotFoundException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdMethodNotAllowedException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdUnsupportedMediaTypeException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdTooManyRequestsException
     * @throws PatchSignatureRequestsIdDocumentRequestsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, SignerDocumentRequest::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsIdDocumentRequestsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
