<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsSignatureRequestIdDocuments extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns a list of Documents for a given Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array{
     *    "nature"?: array, //Filter by `nature`. Allowed operators: `eq`.
     * Example: `nature[eq]=attachment` or `nature[eq]=signable_document`.
     * } $queryParameters
     */
    public function __construct(protected string $signatureRequestId, array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [rawurlencode($this->signatureRequestId)], '/signature_requests/{signatureRequestId}/documents');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['nature']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('nature', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['nature' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return Document[]|null
     *
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsMethodNotAllowedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, 'Qdequippe\Yousign\Api\Model\Document[]', 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
