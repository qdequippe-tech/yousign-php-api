<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class GetProcedures extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
{
    use \Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;

    /**
     * @param array $queryParameters {
     *
     *     @var string $status Return Procedure list based on the status for each Procedure
     *     @var bool $template Used to get Procedure template list
     *     @var array $members Get Procedure list for given members (paraph mode)
     *     @var string $itemsPerPage Number of items per page for the pagination
     *     @var bool $pagination Enable the pagination
     *     @var int $page Page of the pagination
     *     @var string $name Filter by name (contains)
     *     @var string $members.firstname Filter by member firstname (contains)
     *     @var string $members.lastname Filter by member lastname (contains)
     *     @var string $members.phone Filter by member phone (contains)
     *     @var string $members.email Filter by member email (contains)
     *     @var string $files.name Filter by file name (contains)
     *     @var array $createdAt Filter by creation date

     *     @var array $updatedAt Filter by update date

     *     @var array $expiresAt Filter by expire date

     *     @var string $order[createdAt] Order by createdAt

     * }
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
        return '/procedures';
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
        $optionsResolver->setDefined(['status', 'template', 'members', 'itemsPerPage', 'pagination', 'page', 'name', 'members.firstname', 'members.lastname', 'members.phone', 'members.email', 'files.name', 'createdAt', 'updatedAt', 'expiresAt', 'order[createdAt]']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['template' => false]);
        $optionsResolver->setAllowedTypes('status', ['string']);
        $optionsResolver->setAllowedTypes('template', ['bool']);
        $optionsResolver->setAllowedTypes('members', ['array']);
        $optionsResolver->setAllowedTypes('itemsPerPage', ['string']);
        $optionsResolver->setAllowedTypes('pagination', ['bool']);
        $optionsResolver->setAllowedTypes('page', ['int']);
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
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput[]|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\ProcedureOutput[]', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
