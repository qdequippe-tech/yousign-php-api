<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteCustomExperienceLogo extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes the logo of a Custom Experience.
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
        return str_replace(['{customExperienceId}'], [$this->customExperienceId], '/custom_experiences/{customExperienceId}/logo');
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
     * @throws DeleteCustomExperienceLogoBadRequestException
     * @throws DeleteCustomExperienceLogoUnauthorizedException
     * @throws DeleteCustomExperienceLogoForbiddenException
     * @throws DeleteCustomExperienceLogoNotFoundException
     * @throws DeleteCustomExperienceLogoTooManyRequestsException
     * @throws DeleteCustomExperienceLogoInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
