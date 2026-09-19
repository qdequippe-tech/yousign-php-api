<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsIdEmbeddedPreparationLinkUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\EmbeddedPreparationLink;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequestsIdEmbeddedPreparationLink extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns a short-lived link opening the Signature Request Embedded Preparation. The Signature Request must be in `draft` status, have at least one Signer and one Signable Document, and must not have Document visibility restrictions.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array{
     *    "locale"?: string, //Language of the Signature Request Embedded Preparation UI. Defaults to the organization's language.
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
        return str_replace(['{signatureRequestId}'], [rawurlencode($this->signatureRequestId)], '/signature_requests/{signatureRequestId}/embedded_preparation_link');
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
        $optionsResolver->setDefined(['locale']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('locale', ['string']);

        return $optionsResolver;
    }

    /**
     * @return EmbeddedPreparationLink|null
     *
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkBadRequestException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkUnauthorizedException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkForbiddenException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkNotFoundException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkMethodNotAllowedException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkUnsupportedMediaTypeException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkTooManyRequestsException
     * @throws GetSignatureRequestsIdEmbeddedPreparationLinkInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, EmbeddedPreparationLink::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsIdEmbeddedPreparationLinkInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
