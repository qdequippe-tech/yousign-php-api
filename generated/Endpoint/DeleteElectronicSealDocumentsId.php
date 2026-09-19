<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteElectronicSealDocumentsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
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

class DeleteElectronicSealDocumentsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Permanently deletes an Electronic Seal Document attached to an Electronic Seal. This action is only possible when the eSeal is in done or error status. Not applicable to documents sealed with a Qualified eSeal. Warning: this operation is irreversible: once deleted, the document cannot be retrieved. The customer assumes full responsibility for this action.
     *
     * @param string $electronicSealDocumentId Electronic Seal Document Id
     */
    public function __construct(protected string $electronicSealDocumentId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealDocumentId}'], [rawurlencode($this->electronicSealDocumentId)], '/electronic_seal_documents/{electronicSealDocumentId}');
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
     * @throws DeleteElectronicSealDocumentsIdBadRequestException
     * @throws DeleteElectronicSealDocumentsIdUnauthorizedException
     * @throws DeleteElectronicSealDocumentsIdForbiddenException
     * @throws DeleteElectronicSealDocumentsIdNotFoundException
     * @throws DeleteElectronicSealDocumentsIdMethodNotAllowedException
     * @throws DeleteElectronicSealDocumentsIdTooManyRequestsException
     * @throws DeleteElectronicSealDocumentsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteElectronicSealDocumentsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
