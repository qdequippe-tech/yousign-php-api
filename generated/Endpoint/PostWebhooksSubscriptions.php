<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostWebhooksSubscriptionsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostWebhooksSubscriptionsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostWebhooksSubscriptionsNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostWebhooksSubscriptionsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\CreateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostWebhooksSubscriptions extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Creates a new Webhook subscription in your organization.
     */
    public function __construct(?CreateWebhookSubscription $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/webhooks';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateWebhookSubscription) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return WebhookSubscription|null
     *
     * @throws PostWebhooksSubscriptionsBadRequestException
     * @throws PostWebhooksSubscriptionsUnauthorizedException
     * @throws PostWebhooksSubscriptionsForbiddenException
     * @throws PostWebhooksSubscriptionsNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, WebhookSubscription::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostWebhooksSubscriptionsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostWebhooksSubscriptionsUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostWebhooksSubscriptionsForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostWebhooksSubscriptionsNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
