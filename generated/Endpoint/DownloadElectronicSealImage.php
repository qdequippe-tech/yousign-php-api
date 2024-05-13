<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealImageNotFoundException;
use Qdequippe\Yousign\Api\Exception\DownloadElectronicSealImageUnauthorizedException;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DownloadElectronicSealImage extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * @param array $accept Accept content header image/png|image/jpg|image/gif|application/json
     */
    public function __construct(protected string $electronicSealImageId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{electronicSealImageId}'], [$this->electronicSealImageId], '/electronic_seal_images/{electronicSealImageId}/download');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['image/png', 'image/jpg', 'image/gif', 'application/json']];
        }

        return $this->accept;
    }

    /**
     * @throws DownloadElectronicSealImageUnauthorizedException
     * @throws DownloadElectronicSealImageNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealImageUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DownloadElectronicSealImageNotFoundException($response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
