<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchWebhooksWebhookIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchWebhooksWebhookIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchWebhooksWebhookIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchWebhooksWebhookIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\UpdateWebhookSubscription;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Model\WebhookSubscription;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchWebhooksWebhookId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Webhook subscription.
     * Any parameters not provided are left unchanged.
     *
     * @param string $webhookId Webhook Id
     */
    public function __construct(protected string $webhookId, ?UpdateWebhookSubscription $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{webhookId}'], [$this->webhookId], '/webhooks/{webhookId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateWebhookSubscription) {
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
     * @throws PatchWebhooksWebhookIdBadRequestException
     * @throws PatchWebhooksWebhookIdUnauthorizedException
     * @throws PatchWebhooksWebhookIdForbiddenException
     * @throws PatchWebhooksWebhookIdNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, WebhookSubscription::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWebhooksWebhookIdBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWebhooksWebhookIdUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWebhooksWebhookIdForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchWebhooksWebhookIdNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
