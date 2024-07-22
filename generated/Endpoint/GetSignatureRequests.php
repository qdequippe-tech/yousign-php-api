<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetSignatureRequestsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests200Response;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetSignatureRequests extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Returns the list of all Signatures Requests in your organization. You can limit the number of items returned by using filters and pagination.
     *
     * @param array $queryParameters {
     *
     * @var string $status Filter by status
     * @var string $after After cursor (pagination)
     * @var int    $limit the limit of items count to retrieve
     * @var string $external_id Filter by external_id
     * @var array  $source[] Filter by source
     * @var string $q Search on name
     *             }
     */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/signature_requests';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['status', 'after', 'limit', 'external_id', 'source', 'q']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['limit' => 100]);
        $optionsResolver->addAllowedTypes('status', ['string']);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('external_id', ['string']);
        $optionsResolver->addAllowedTypes('source', ['array']);
        $optionsResolver->addAllowedTypes('q', ['string']);

        return $optionsResolver;
    }

    /**
     * @return GetSignatureRequests200Response|null
     *
     * @throws GetSignatureRequestsBadRequestException
     * @throws GetSignatureRequestsUnauthorizedException
     * @throws GetSignatureRequestsForbiddenException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, GetSignatureRequests200Response::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetSignatureRequestsForbiddenException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
