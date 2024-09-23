<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetArchivesArchivedFileIdDownloadBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetArchivesArchivedFileIdDownloadForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetArchivesArchivedFileIdDownloadNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetArchivesArchivedFileIdDownloadUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetArchivesArchivedFileIdDownload extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Download the archived file using the ArchivedFileId.
     *
     * @param string $archivedFileId ArchivedFileId
     * @param array  $accept         Accept content header application/octet-stream|application/json
     */
    public function __construct(protected string $archivedFileId, protected array $accept = [])
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{archivedFileId}'], [$this->archivedFileId], '/archives/{archivedFileId}/download');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        if (empty($this->accept)) {
            return ['Accept' => ['application/octet-stream', 'application/json']];
        }

        return $this->accept;
    }

    /**
     * @throws GetArchivesArchivedFileIdDownloadBadRequestException
     * @throws GetArchivesArchivedFileIdDownloadUnauthorizedException
     * @throws GetArchivesArchivedFileIdDownloadForbiddenException
     * @throws GetArchivesArchivedFileIdDownloadNotFoundException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetArchivesArchivedFileIdDownloadBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetArchivesArchivedFileIdDownloadUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetArchivesArchivedFileIdDownloadForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetArchivesArchivedFileIdDownloadNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
