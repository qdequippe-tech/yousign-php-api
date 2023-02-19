<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class GetSignatureUiById extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
{
    use \Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * @param array $queryParameters {
     *
     *     @var string $id id of a signature ui
     * }
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     */
    public function __construct(string $id, array $queryParameters = [], array $headerParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/signature_uis/{id}');
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
        $optionsResolver->setDefined(['id']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('id', ['string']);

        return $optionsResolver;
    }

    protected function getHeadersOptionsResolver(): \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getHeadersOptionsResolver();
        $optionsResolver->setDefined(['Authorization', 'Content-Type']);
        $optionsResolver->setRequired(['Authorization', 'Content-Type']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->setAllowedTypes('Authorization', ['string']);
        $optionsResolver->setAllowedTypes('Content-Type', ['string']);

        return $optionsResolver;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Qdequippe\Yousign\Api\Model\SignatureUiOutput|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiOutput', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
