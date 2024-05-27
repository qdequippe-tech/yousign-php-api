<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetConsumptionsExportUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Serializer\SerializerInterface;

class GetConsumptionsExport extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get a binary .csv file containing all the Consumption data of the underlying signatures.
     *
     * @param array $queryParameters {
     *
     * @var string $from The "from" date must not be more than 1 year in the past
     * @var string $to The "to" date must be more recent than the "from" date
     * @var string $authentication_key
     *             }
     *
     * @param array $accept Accept content header text/csv|application/json
     */
    public function __construct(array $queryParameters = [], protected array $accept = [])
    {
        $this->queryParameters = $queryParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/consumptions/export';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['text/csv', 'application/json']];
        }

        return $this->accept;
    }

    protected function getQueryOptionsResolver(): OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['from', 'to', 'authentication_key']);
        $optionsResolver->setRequired(['from', 'to']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('from', ['string']);
        $optionsResolver->addAllowedTypes('to', ['string']);
        $optionsResolver->addAllowedTypes('authentication_key', ['string']);

        return $optionsResolver;
    }

    /**
     * @throws GetConsumptionsExportBadRequestException
     * @throws GetConsumptionsExportUnauthorizedException
     * @throws GetConsumptionsExportForbiddenException
     * @throws GetConsumptionsExportNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionsExportBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionsExportUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionsExportForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetConsumptionsExportNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
