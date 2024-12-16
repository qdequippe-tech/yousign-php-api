<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetIdDocumentVerificationUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\IdDocumentVerification;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetIdDocumentVerification extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of an ID document verification, including the status of the verification, the reasons in case of rejection and the data extracted from the ID document.
     *
     * @param string $idDocumentVerificationId The ID document verification ID
     */
    public function __construct(protected string $idDocumentVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{idDocumentVerificationId}'], [$this->idDocumentVerificationId], '/id_document_verifications/{idDocumentVerificationId}');
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
     * @return IdDocumentVerification|null
     *
     * @throws GetIdDocumentVerificationBadRequestException
     * @throws GetIdDocumentVerificationUnauthorizedException
     * @throws GetIdDocumentVerificationForbiddenException
     * @throws GetIdDocumentVerificationNotFoundException
     * @throws GetIdDocumentVerificationTooManyRequestsException
     * @throws GetIdDocumentVerificationInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, IdDocumentVerification::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetIdDocumentVerificationInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
