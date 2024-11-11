<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsSignatureRequestIdAuditTrailsDownload extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Download the PDF version of all the Audit Trails attached to a given Signature Request. Each Audit Trail is bound to a different Signer. Only possible when the Signature Request status is `done`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var bool $merge Download all Audit Trails merged as a single PDF file
     *           }
     *
     * @param array $accept Accept content header application/zip, application/pdf|application/json
     */
    public function __construct(protected string $signatureRequestId, array $queryParameters = [], protected array $accept = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}/audit_trails/download');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/zip, application/pdf', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['merge']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['merge' => false]);
        $optionsResolver->addAllowedTypes('merge', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdAuditTrailsDownloadInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
