<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class GetExportProcedure extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
{
    use \Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $status Return Procedure list based on the status for each Procedure
     *     @var string $name Filter by name (contains)
     *     @var string $members.firstname Filter by member firstname (contains)
     *     @var string $members.lastname Filter by member lastname (contains)
     *     @var string $members.phone Filter by member phone (contains)
     *     @var string $members.email Filter by member email (contains)
     *     @var string $files.name Filter by file name (contains)
     *     @var array $createdAt Filter by creation date

     *     @var array $updatedAt Filter by update date

     *     @var array $expiresAt Filter by expire date

     *     @var string $order[createdAt] Order by attribut
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     * }
     */
    public function __construct(array $queryParameters = [], array $headerParameters = [])
    {
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return '/export/procedures';
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    protected function getQueryOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['status', 'name', 'members.firstname', 'members.lastname', 'members.phone', 'members.email', 'files.name', 'createdAt', 'updatedAt', 'expiresAt', 'order[createdAt]']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('status', ['string']);
        $optionsResolver->setAllowedTypes('name', ['string']);
        $optionsResolver->setAllowedTypes('members.firstname', ['string']);
        $optionsResolver->setAllowedTypes('members.lastname', ['string']);
        $optionsResolver->setAllowedTypes('members.phone', ['string']);
        $optionsResolver->setAllowedTypes('members.email', ['string']);
        $optionsResolver->setAllowedTypes('files.name', ['string']);
        $optionsResolver->setAllowedTypes('createdAt', ['array']);
        $optionsResolver->setAllowedTypes('updatedAt', ['array']);
        $optionsResolver->setAllowedTypes('expiresAt', ['array']);
        $optionsResolver->setAllowedTypes('order[createdAt]', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Authorization']);
        $optionsResolver->setRequired(['Authorization']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('Authorization', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return json_decode($body);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
