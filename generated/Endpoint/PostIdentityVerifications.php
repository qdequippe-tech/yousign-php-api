<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostIdentityVerificationsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostIdentityVerificationsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostIdentityVerificationsNotFoundException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CreateVideoIdentityVerification;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationCreated;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostIdentityVerifications extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Creates a new Identity Verification resource.
     */
    public function __construct(?CreateVideoIdentityVerification $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/video_identity_verifications';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateVideoIdentityVerification) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return VideoIdentityVerificationCreated|null
     *
     * @throws PostIdentityVerificationsBadRequestException
     * @throws PostIdentityVerificationsForbiddenException
     * @throws PostIdentityVerificationsNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, VideoIdentityVerificationCreated::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostIdentityVerificationsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostIdentityVerificationsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostIdentityVerificationsNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
