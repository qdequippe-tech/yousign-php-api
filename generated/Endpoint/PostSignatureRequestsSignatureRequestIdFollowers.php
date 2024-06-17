<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdFollowersBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdFollowersForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdFollowersNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdFollowersUnauthorizedException;
use Qdequippe\Yousign\Api\Model\CreateFollowersInner;
use Qdequippe\Yousign\Api\Model\Follower;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdFollowers extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * @param string                      $signatureRequestId Signature Request Id
     * @param CreateFollowersInner[]|null $requestBody
     */
    public function __construct(protected string $signatureRequestId, ?array $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}'], [$this->signatureRequestId], '/signature_requests/{signatureRequestId}/followers');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if (\is_array($this->body) && isset($this->body[0]) && $this->body[0] instanceof CreateFollowersInner) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Follower[]|null
     *
     * @throws PostSignatureRequestsSignatureRequestIdFollowersBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdFollowersUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdFollowersForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdFollowersNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, 'Qdequippe\Yousign\Api\Model\Follower[]', 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdFollowersBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdFollowersUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdFollowersForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdFollowersNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
