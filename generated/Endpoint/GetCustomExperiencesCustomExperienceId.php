<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetCustomExperiencesCustomExperienceIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CustomExperience;
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

class GetCustomExperiencesCustomExperienceId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieves a given Custom Experience.
     *
     * @param string $customExperienceId Custom Experience Id
     */
    public function __construct(protected string $customExperienceId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{customExperienceId}'], [rawurlencode($this->customExperienceId)], '/custom_experiences/{customExperienceId}');
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
     * @return CustomExperience|null
     *
     * @throws GetCustomExperiencesCustomExperienceIdBadRequestException
     * @throws GetCustomExperiencesCustomExperienceIdUnauthorizedException
     * @throws GetCustomExperiencesCustomExperienceIdForbiddenException
     * @throws GetCustomExperiencesCustomExperienceIdNotFoundException
     * @throws GetCustomExperiencesCustomExperienceIdMethodNotAllowedException
     * @throws GetCustomExperiencesCustomExperienceIdTooManyRequestsException
     * @throws GetCustomExperiencesCustomExperienceIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CustomExperience::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetCustomExperiencesCustomExperienceIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
