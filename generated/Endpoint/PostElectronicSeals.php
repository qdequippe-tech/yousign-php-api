<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostElectronicSealsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
use Qdequippe\Yousign\Api\Model\ElectronicSeal;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostElectronicSeals extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    public function __construct(?CreateElectronicSealPayload $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/electronic_seals';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateElectronicSealPayload) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return ElectronicSeal|null
     *
     * @throws PostElectronicSealsBadRequestException
     * @throws PostElectronicSealsUnauthorizedException
     * @throws PostElectronicSealsForbiddenException
     * @throws PostElectronicSealsUnsupportedMediaTypeException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, ElectronicSeal::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostElectronicSealsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostElectronicSealsUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostElectronicSealsForbiddenException($response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostElectronicSealsUnsupportedMediaTypeException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
