<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class PutMemberById extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
{
    use \Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * Edit a member.
     *
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     */
    public function __construct(string $id, \Qdequippe\Yousign\Api\Model\MemberInput $body, array $headerParameters = [])
    {
        $this->id = $id;
        $this->body = $body;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'PUT';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/members/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return $this->getSerializedBody($serializer);
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
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
     * @return \Qdequippe\Yousign\Api\Model\MemberOutput|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\MemberOutput', 'json');
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
