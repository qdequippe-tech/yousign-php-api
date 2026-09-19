<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsCompaniesUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CompanyFull;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InitiateCompanyFromFile;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostVerificationsCompanies extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Initiate a new Company Verification by providing the company number or by uploading a document containing company information.
     *
     * Related guide: [Company Registry Verification](https://developers.youtrust.com/docs/company-verification).
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📝 `application/json` — provide the company number directly, or reference an existing Workflow Session Applicant by ID.
     * - 📁 `multipart/form-data` — upload a binary file containing the company information.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Verify - Company registry verification`
     *
     * @param mixed|InitiateCompanyFromFile|null $requestBody
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
        return '/verifications/companies';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if (null !== $this->body) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if ($this->body instanceof InitiateCompanyFromFile) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            $partOptions = ['file' => ['filename' => 'file']];
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $value = \is_bool($value) ? $value ? 'true' : 'false' : $value;
                if (\is_array($value) || $value instanceof \stdClass) {
                    $value = $serializer->serialize((array) $value, 'json');
                }
                $resourceOptions = $partOptions[$key] ?? [];
                if (isset($resourceOptions['filename'])) {
                    $uri = null;
                    if ($value instanceof StreamInterface) {
                        $uri = $value->getMetadata('uri');
                    } elseif (\is_resource($value)) {
                        $uri = stream_get_meta_data($value)['uri'] ?? null;
                    }
                    if (\is_string($uri) && is_file($uri)) {
                        unset($resourceOptions['filename']);
                    }
                }
                $bodyBuilder->addResource($key, $value, $resourceOptions);
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
     * @return CompanyFull|null
     *
     * @throws PostVerificationsCompaniesBadRequestException
     * @throws PostVerificationsCompaniesUnauthorizedException
     * @throws PostVerificationsCompaniesForbiddenException
     * @throws PostVerificationsCompaniesNotFoundException
     * @throws PostVerificationsCompaniesMethodNotAllowedException
     * @throws PostVerificationsCompaniesUnsupportedMediaTypeException
     * @throws PostVerificationsCompaniesTooManyRequestsException
     * @throws PostVerificationsCompaniesInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CompanyFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsCompaniesInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
