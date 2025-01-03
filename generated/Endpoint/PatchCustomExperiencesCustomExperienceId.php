<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchCustomExperiencesCustomExperienceIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CustomExperience;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchCustomExperiencesCustomExperienceId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Custom Experience.
     * Any parameters not provided are left unchanged.
     *
     * @param string $customExperienceId Custom Experience Id
     */
    public function __construct(protected string $customExperienceId, ?UpdateCustomExperience $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{customExperienceId}'], [$this->customExperienceId], '/custom_experiences/{customExperienceId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateCustomExperience) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return CustomExperience|null
     *
     * @throws PatchCustomExperiencesCustomExperienceIdBadRequestException
     * @throws PatchCustomExperiencesCustomExperienceIdUnauthorizedException
     * @throws PatchCustomExperiencesCustomExperienceIdForbiddenException
     * @throws PatchCustomExperiencesCustomExperienceIdNotFoundException
     * @throws PatchCustomExperiencesCustomExperienceIdUnsupportedMediaTypeException
     * @throws PatchCustomExperiencesCustomExperienceIdTooManyRequestsException
     * @throws PatchCustomExperiencesCustomExperienceIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, CustomExperience::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchCustomExperiencesCustomExperienceIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
