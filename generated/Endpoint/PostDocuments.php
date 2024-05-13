<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostDocumentsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostDocumentsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostDocumentsUnauthorizedException;
use Qdequippe\Yousign\Api\Model\CreateDocument;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\GetSignatureRequests401Response;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostDocuments extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    public function __construct(?CreateDocument $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/documents';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof CreateDocument) {
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
     * @return Document|null
     *
     * @throws PostDocumentsBadRequestException
     * @throws PostDocumentsUnauthorizedException
     * @throws PostDocumentsForbiddenException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (201 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Document::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostDocumentsBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostDocumentsUnauthorizedException($serializer->deserialize($body, GetSignatureRequests401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostDocumentsForbiddenException($response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
