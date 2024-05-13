<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsSignatureRequestIdDocuments extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var string $nature Filter by nature
     *             }
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
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}/documents');
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
        $optionsResolver->addAllowedTypes('nature', ['string']);

        return $optionsResolver;
    }

    /**
     * @return Document[]|null
     *
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\Document[]', 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
