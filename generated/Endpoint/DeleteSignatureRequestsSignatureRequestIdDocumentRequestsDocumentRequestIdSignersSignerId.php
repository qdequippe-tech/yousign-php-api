<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Remove a Signer to a given Signer Document Request. This action is only permitted when the Signature Request is a draft.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentRequestId  Signer Document Request Id
     * @param string $signerId           Signer Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentRequestId, protected string $signerId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentRequestId}', '{signerId}'], [$this->signatureRequestId, $this->documentRequestId, $this->signerId], '/signature_requests/{signatureRequestId}/document_requests/{documentRequestId}/signers/{signerId}');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdDocumentRequestsDocumentRequestIdSignersSignerIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
