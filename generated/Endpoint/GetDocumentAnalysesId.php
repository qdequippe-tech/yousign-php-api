<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetDocumentAnalysesIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetDocumentAnalysesId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of a Document Trust Analysis.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Document Analysis or Document Trust Advanced`
     *
     * @param string $documentAnalysisId Document Trust Analysis Id
     */
    public function __construct(protected string $documentAnalysisId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{documentAnalysisId}'], [rawurlencode($this->documentAnalysisId)], '/document_analyses/{documentAnalysisId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws GetDocumentAnalysesIdBadRequestException
     * @throws GetDocumentAnalysesIdUnauthorizedException
     * @throws GetDocumentAnalysesIdForbiddenException
     * @throws GetDocumentAnalysesIdNotFoundException
     * @throws GetDocumentAnalysesIdMethodNotAllowedException
     * @throws GetDocumentAnalysesIdTooManyRequestsException
     * @throws GetDocumentAnalysesIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetDocumentAnalysesIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
