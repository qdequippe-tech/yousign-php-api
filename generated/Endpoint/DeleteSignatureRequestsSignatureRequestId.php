<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteSignatureRequestsSignatureRequestId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes a given Signature Request, not possible if the Signature Request is in `approval` and `ongoing` status.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param array  $queryParameters    {
     *
     * @var bool $permanent_delete If true it will permanently delete the Signature Request. It will no longer be retrievable.
     *           }
     */
    public function __construct(protected string $signatureRequestId, array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}');
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
        $optionsResolver->setDefined(['permanent_delete']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['permanent_delete' => false]);
        $optionsResolver->addAllowedTypes('permanent_delete', ['bool']);

        return $optionsResolver;
    }

    /**
     * @throws DeleteSignatureRequestsSignatureRequestIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
