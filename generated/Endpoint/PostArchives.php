<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostArchivesBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostArchivesForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostArchivesNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostArchivesUnauthorizedException;
use Qdequippe\Yousign\Api\Model\ArchivedFile;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostArchives extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Archive a file in a secure digital safe for 10 years.
     */
    public function __construct(?UploadArchivedFile $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/archives';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UploadArchivedFile) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $bodyBuilder->addResource($key, $value);
            }

            return [['Content-Type' => ['multipart/form-data; boundary="'.($bodyBuilder->getBoundary().'"')]], $bodyBuilder->build()];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return ArchivedFile|null
     *
     * @throws PostArchivesBadRequestException
     * @throws PostArchivesUnauthorizedException
     * @throws PostArchivesForbiddenException
     * @throws PostArchivesNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, ArchivedFile::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostArchivesBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostArchivesUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostArchivesForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostArchivesNotFoundException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}