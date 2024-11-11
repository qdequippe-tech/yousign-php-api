<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadUnauthorizedException;
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

class GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownload extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Downloads the PDF version of a given Document.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param array  $accept             Accept content header application/pdf|application/json
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}'], [$this->signatureRequestId, $this->documentId], '/signature_requests/{signatureRequestId}/documents/{documentId}/download');
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
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentsIdDownloadInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
