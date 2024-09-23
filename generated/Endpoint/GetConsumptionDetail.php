<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionDetailUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\GetConsumptionDetail200Response;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetConsumptionDetail extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get detailed Consumption data aggregated on workspace or organization.
     *
     * @param array $queryParameters {
     *
     * @var string $after After cursor (pagination)
     * @var int    $limit the limit of items count to retrieve
     * @var string $from from when to start data retrieval
     * @var string $to Until when data will be retrieved. The "to" date must be more recent than the "from" date and should not exceed one year after the "from".
     * @var string $breakdown_type either if the breakdown is made at the workspace level or at the organization level
     * @var array  $workspace_ids Workspaces IDs to filter on.
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
        return '/consumptions/detail';
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
        $optionsResolver->setDefined(['after', 'limit', 'from', 'to', 'breakdown_type', 'workspace_ids']);
        $optionsResolver->setRequired(['from', 'to']);
        $optionsResolver->setDefaults(['limit' => 100, 'breakdown_type' => 'organization']);
        $optionsResolver->addAllowedTypes('after', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('from', ['string']);
        $optionsResolver->addAllowedTypes('to', ['string']);
        $optionsResolver->addAllowedTypes('breakdown_type', ['string']);
        $optionsResolver->addAllowedTypes('workspace_ids', ['array']);

        return $optionsResolver;
    }

    /**
     * @return GetConsumptionDetail200Response|null
     *
     * @throws GetConsumptionDetailBadRequestException
     * @throws GetConsumptionDetailUnauthorizedException
     * @throws GetConsumptionDetailForbiddenException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, GetConsumptionDetail200Response::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionDetailBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionDetailUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionDetailForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
