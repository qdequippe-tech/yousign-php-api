<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsIdentityDocumentsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFull;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetVerificationsIdentityDocumentsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of an Identity Document Verification, including the status of the verification, the reasons in case of rejection and the data extracted from the Identity Document.
     *
     * @param string $identityDocumentVerificationId Identity Document Verification Id
     */
    public function __construct(protected string $identityDocumentVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{identityDocumentVerificationId}'], [rawurlencode($this->identityDocumentVerificationId)], '/verifications/identity_documents/{identityDocumentVerificationId}');
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
     * @return IdentityDocumentFull|null
     *
     * @throws GetVerificationsIdentityDocumentsIdBadRequestException
     * @throws GetVerificationsIdentityDocumentsIdUnauthorizedException
     * @throws GetVerificationsIdentityDocumentsIdForbiddenException
     * @throws GetVerificationsIdentityDocumentsIdNotFoundException
     * @throws GetVerificationsIdentityDocumentsIdMethodNotAllowedException
     * @throws GetVerificationsIdentityDocumentsIdTooManyRequestsException
     * @throws GetVerificationsIdentityDocumentsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, IdentityDocumentFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsIdentityDocumentsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
