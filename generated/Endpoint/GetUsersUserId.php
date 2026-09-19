<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\User;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetUsersUserId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves a given User within your Organization.
     *
     * @param string $userId User Id
     */
    public function __construct(protected string $userId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{userId}'], [rawurlencode($this->userId)], '/users/{userId}');
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
     * @return User|null
     *
     * @throws GetUsersUserIdBadRequestException
     * @throws GetUsersUserIdUnauthorizedException
     * @throws GetUsersUserIdForbiddenException
     * @throws GetUsersUserIdNotFoundException
     * @throws GetUsersUserIdMethodNotAllowedException
     * @throws GetUsersUserIdTooManyRequestsException
     * @throws GetUsersUserIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, User::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
