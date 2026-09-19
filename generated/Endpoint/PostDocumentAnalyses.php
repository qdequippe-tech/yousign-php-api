<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Jane\Component\JsonSchemaRuntime\Exception\MalformedJsonException;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostDocumentAnalysesUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicant;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostDocumentAnalyses extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Initiate a new Document Trust Analysis to extract data from a given document type.
     *
     * Related guide: [Document Trust Analysis](https://developers.youtrust.com/docs/document-analysis)
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📁 `multipart/form-data` — upload a binary file containing the document to analyse.
     * - 📝 `application/json` — reference an existing Workflow Session Applicant by ID.
     *
     * **🔎 Analysis type (`analysis_type`)**
     * - `extraction: true` (default): data is extracted from the document. A document `type` is **required**. Optionally set `fraud_level` (`standard` or `advanced`) to also run fraud detection (not supported for `tax_notice`).
     * - `extraction: false` (fraud-only): no data extraction. Only available with `multipart/form-data` (direct file upload): `type` must be omitted and `fraud_level` must be `standard` or `advanced`. Not supported with the `application/json` (Applicant) variant, where a document `type` is always required.
     *
     * On `multipart/form-data`, `analysis_type` is sent as form fields (`analysis_type[extraction]`, `analysis_type[fraud_level]`) and `extraction` is a string (`"true"`/`"false"`).
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access):
     *   - For extraction only `Document Analysis`
     *   - For Fraud Detection with `fraud_level` set to `standard` and Extraction `Document Trust Standard`
     *   - For Fraud Detection with `fraud_level` set to `advanced` and Extraction `Document Trust Advanced`
     *
     * @param InitiateDocumentAnalysisFromApplicant|\stdClass|null $requestBody
     */
    public function __construct($requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/document_analyses';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof InitiateDocumentAnalysisFromApplicant) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }
        if ($this->body instanceof \stdClass) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $value = \is_bool($value) ? $value ? 'true' : 'false' : $value;
                if (\is_array($value) || $value instanceof \stdClass) {
                    $value = $serializer->serialize((array) $value, 'json');
                }
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
     * @throws PostDocumentAnalysesBadRequestException
     * @throws PostDocumentAnalysesUnauthorizedException
     * @throws PostDocumentAnalysesForbiddenException
     * @throws PostDocumentAnalysesNotFoundException
     * @throws PostDocumentAnalysesMethodNotAllowedException
     * @throws PostDocumentAnalysesUnsupportedMediaTypeException
     * @throws PostDocumentAnalysesTooManyRequestsException
     * @throws PostDocumentAnalysesInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            try {
                return json_decode($body, false, 512, \JSON_THROW_ON_ERROR);
            } catch (\JsonException $jsonException) {
                throw new MalformedJsonException('Malformed JSON response body.', 0, $jsonException);
            }
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostDocumentAnalysesInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
