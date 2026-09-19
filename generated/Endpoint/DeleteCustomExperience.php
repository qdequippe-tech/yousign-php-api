<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceUnauthorizedException;
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

class DeleteCustomExperience extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes a given Custom Experience.
     *
     * @param string $customExperienceId Custom Experience Id
     */
    public function __construct(protected string $customExperienceId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
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
     * @throws DeleteCustomExperienceBadRequestException
     * @throws DeleteCustomExperienceUnauthorizedException
     * @throws DeleteCustomExperienceForbiddenException
     * @throws DeleteCustomExperienceNotFoundException
     * @throws DeleteCustomExperienceMethodNotAllowedException
     * @throws DeleteCustomExperienceTooManyRequestsException
     * @throws DeleteCustomExperienceInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new DeleteCustomExperienceInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
