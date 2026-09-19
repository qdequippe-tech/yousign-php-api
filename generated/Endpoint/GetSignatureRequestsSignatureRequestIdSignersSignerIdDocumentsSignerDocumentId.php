<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException;
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

class GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Downloads a Document uploaded by a given Signer.
     * Only possible when Signer status is `signed`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $signerId           Signer Id
     * @param string $signerDocumentId   Signer Document Id
     * @param array  $accept             Accept content header application/pdf|application/json
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId, protected string $signerDocumentId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}', '{signerDocumentId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId), rawurlencode($this->signerDocumentId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/documents/{signerDocumentId}/download');
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
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdMethodNotAllowedException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
