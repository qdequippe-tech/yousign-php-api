<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\SignatureRequest;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequests extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Creates a new Signature Request resource.
     */
    public function __construct(?CreateSignatureRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/signature_requests';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateSignatureRequest) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return SignatureRequest|null
     *
     * @throws PostSignatureRequestsBadRequestException
     * @throws PostSignatureRequestsUnauthorizedException
     * @throws PostSignatureRequestsForbiddenException
     * @throws PostSignatureRequestsNotFoundException
     * @throws PostSignatureRequestsUnsupportedMediaTypeException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, SignatureRequest::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsNotFoundException($response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsUnsupportedMediaTypeException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
