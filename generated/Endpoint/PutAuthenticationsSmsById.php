<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class PutAuthenticationsSmsById extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
{
    use \Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
    protected $id;

    /**
     * @param array $headerParameters {
     *
     *     @var string $Authorization Authentication credentials for HTTP authentication
     *     @var string $Content-Type The MIME type of the body of the request
     * }
     */
    public function __construct(string $id, \stdClass $body, array $headerParameters = [])
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
        return str_replace(['{id}'], [$this->id], '/authentications/sms/{id}');
    }

    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], $this->body];
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
     * @throws \Qdequippe\Yousign\Api\Exception\PutAuthenticationsSmsByIdBadRequestException
     *
     * @return \Qdequippe\Yousign\Api\Model\AuthenticationSmsOutput|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\AuthenticationSmsOutput', 'json');
        }
        if (400 === $status) {
            throw new \Qdequippe\Yousign\Api\Exception\PutAuthenticationsSmsByIdBadRequestException($serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\AuthenticationsSmsIdPutResponse400', 'json'));
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
