<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteCustomExperienceLogoUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteCustomExperienceLogo extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
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
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteCustomExperienceLogoNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
