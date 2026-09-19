<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentForbiddenException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentNotFoundException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealDocumentUnauthorizedException;
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

class DownloadElectronicSealDocument extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Download a given Electronic Seal Document.
     *
     * @param string $electronicSealDocumentId Electronic Seal Document Id
     * @param array  $accept                   Accept content header application/pdf|application/json
     */
    public function __construct(protected string $electronicSealDocumentId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealDocumentId}'], [rawurlencode($this->electronicSealDocumentId)], '/electronic_seal_documents/{electronicSealDocumentId}/download');
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
     * @throws DownloadElectronicSealDocumentUnauthorizedException
     * @throws DownloadElectronicSealDocumentForbiddenException
     * @throws DownloadElectronicSealDocumentNotFoundException
     * @throws DownloadElectronicSealDocumentMethodNotAllowedException
     * @throws DownloadElectronicSealDocumentTooManyRequestsException
     * @throws DownloadElectronicSealDocumentInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null): void
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DownloadElectronicSealDocumentInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
