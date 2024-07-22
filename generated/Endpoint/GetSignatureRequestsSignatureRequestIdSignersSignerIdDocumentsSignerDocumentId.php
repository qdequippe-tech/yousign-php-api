<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
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
        return str_replace(['{signatureRequestId}', '{signerId}', '{signerDocumentId}'], [$this->signatureRequestId, $this->signerId, $this->signerDocumentId], '/signature_requests/{signatureRequestId}/signers/{signerId}/documents/{signerDocumentId}/download');
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
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdSignersSignerIdDocumentsSignerDocumentIdNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
