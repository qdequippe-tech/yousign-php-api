<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
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

class GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns a list of Fields for a given Document. You can limit the number of items returned by using filters.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document ID
     * @param array{
     *    "after"?: string, //After cursor (pagination)
     *    "limit"?: int, //The limit of items count to retrieve.
     *    "type"?: array, //Filter by `type`. Allowed operators: `eq`, `in`.
     * Example: `type[in]=text,checkbox`
     *    "signer_id"?: array, //Filter by `signer_id`. Allowed operators: `eq`.
     * Example: `signer_id[eq]=500800fc-3f91-4e86-a9c9-866809a1e3c9`
     *    "name"?: array, //Filter by `name`. Allowed operators: `eq`.
     * Example: `name[eq]=text 1`
     * } $queryParameters
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentId)], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields');
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
        $optionsResolver->setDefined(['after', 'limit', 'type', 'signer_id', 'name']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('type', ['array']);
        $optionsResolver->addAllowedTypes('signer_id', ['array']);
        $optionsResolver->addAllowedTypes('name', ['array']);

        return $optionsResolver;
    }

    protected function getQueryStyles(): array
    {
        return ['type' => ['style' => 'deepObject', 'explode' => true], 'signer_id' => ['style' => 'deepObject', 'explode' => true], 'name' => ['style' => 'deepObject', 'explode' => true]];
    }

    /**
     * @return GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response|null
     *
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException
     * @throws GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFieldsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
