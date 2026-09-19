<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetUsersUserIdInvitationUnauthorizedException;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UserInvitation;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetUsersUserIdInvitation extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves the Invitation of a given User. The Invitation only exists when the User is in `invited` status.
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
        return str_replace(['{userId}'], [rawurlencode($this->userId)], '/users/{userId}/invitation');
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
     * @return UserInvitation|null
     *
     * @throws GetUsersUserIdInvitationUnauthorizedException
     * @throws GetUsersUserIdInvitationForbiddenException
     * @throws GetUsersUserIdInvitationNotFoundException
     * @throws GetUsersUserIdInvitationMethodNotAllowedException
     * @throws GetUsersUserIdInvitationTooManyRequestsException
     * @throws GetUsersUserIdInvitationInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, UserInvitation::class, 'json');
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetUsersUserIdInvitationInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
