<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountLookupsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccountLookupFull;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostVerificationsBankAccountLookups extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Initiate a new Bank Account Lookup Verification to check if a bank account exists and belongs to the specified person or company.
     *
     * Related guide: [Bank Account Verification](https://developers.youtrust.com/docs/bank-account-lookup-verification)
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📝 `application/json` — provide the natural or legal person's bank account details directly, or reference an existing Workflow Session Applicant by ID.
     * - 📁 `multipart/form-data` — upload a binary file containing the natural or legal person's bank account details.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Verify - Bank account verification`
     *
     * @param mixed|null $requestBody
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
        return '/verifications/bank_account_lookups';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if (null !== $this->body) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if (null !== $this->body) {
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
     * @return BankAccountLookupFull|null
     *
     * @throws PostVerificationsBankAccountLookupsBadRequestException
     * @throws PostVerificationsBankAccountLookupsUnauthorizedException
     * @throws PostVerificationsBankAccountLookupsForbiddenException
     * @throws PostVerificationsBankAccountLookupsMethodNotAllowedException
     * @throws PostVerificationsBankAccountLookupsUnsupportedMediaTypeException
     * @throws PostVerificationsBankAccountLookupsTooManyRequestsException
     * @throws PostVerificationsBankAccountLookupsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, BankAccountLookupFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountLookupsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
