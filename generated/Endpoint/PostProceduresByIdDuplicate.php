<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Endpoint;

class PostProceduresByIdDuplicate extends \Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint implements \Qdequippe\Yousign\Api\Runtime\Client\Endpoint
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
    public function __construct(string $id, \Qdequippe\Yousign\Api\Model\ProcedureDuplicateInput $body, array $headerParameters = [])
    {
        $this->id = $id;
        $this->body = $body;
        $this->headerParameters = $headerParameters;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{id}'], [$this->id], '/procedures/{id}/duplicate');
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
     * @throws \Qdequippe\Yousign\Api\Exception\PostProceduresByIdDuplicateNotFoundException
     *
     * @return \Qdequippe\Yousign\Api\Model\ProcedureOutput|null
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (201 === $status) {
            return $serializer->deserialize($body, 'Qdequippe\\Yousign\\Api\\Model\\ProcedureOutput', 'json');
        }
        if (404 === $status) {
            throw new \Qdequippe\Yousign\Api\Exception\PostProceduresByIdDuplicateNotFoundException();
        }
    }

    public function getAuthenticationScopes(): array
    {
        return [];
    }
}
