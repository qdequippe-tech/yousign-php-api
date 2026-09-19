<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsIdentityDocumentsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFull;
use Qdequippe\Yousign\Api\Model\InitiateIdentityDocumentFromApplicant;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostVerificationsIdentityDocuments extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Verify a person's Identity Document by sending the file containing their Identity Document (identity card, passport, residence permit or driving license).
     *
     * An Image Identity Verification can be requested as follows:
     * - **Verification with names**: This option checks both the validity of the ID document and the coherence between the names provided and those on the document.
     * - **Verification without names**: This option only checks the validity of the ID document.
     *
     * Related guide: [Image Identity Verification](https://developers.youtrust.com/docs/identity-document-verification)
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📁 `multipart/form-data` — upload a binary file containing the Identity Document.
     * - 📝 `application/json` — reference an existing Workflow Session Applicant by ID.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Verify - Image identity verification`
     *
     * @param InitiateIdentityDocumentFromApplicant|\stdClass|null $requestBody
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
        return '/verifications/identity_documents';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof InitiateIdentityDocumentFromApplicant) {
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
     * @return IdentityDocumentFull|null
     *
     * @throws PostVerificationsIdentityDocumentsBadRequestException
     * @throws PostVerificationsIdentityDocumentsUnauthorizedException
     * @throws PostVerificationsIdentityDocumentsForbiddenException
     * @throws PostVerificationsIdentityDocumentsMethodNotAllowedException
     * @throws PostVerificationsIdentityDocumentsUnsupportedMediaTypeException
     * @throws PostVerificationsIdentityDocumentsTooManyRequestsException
     * @throws PostVerificationsIdentityDocumentsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, IdentityDocumentFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsIdentityDocumentsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
