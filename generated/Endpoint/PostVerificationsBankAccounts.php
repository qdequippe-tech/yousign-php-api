<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostVerificationsBankAccountsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccountFull;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InitiateBankAccountFromApplicant;
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

class PostVerificationsBankAccounts extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Ask for a Bank Account Verification by sending the file containing the bank account details, such as IBAN and BIC.
     *
     * A Bank Account Verification can be requested as follows:
     * - **Bank Account verification**: This option only checks the validity of the Bank Account document.
     * - **Bank Account verification with legal person**: This option checks both:
     *   - the validity of the Bank Account document
     *   - the coherence between the provided **legal person** names and those on the document.
     * - **Bank Account verification with natural person**: This option checks both:
     *   - the validity of the Bank Account document
     *   - the coherence between the provided **natural person** names and those on the document.
     *
     * Related guide: [Bank Account Document Verification](https://developers.youtrust.com/docs/bank-account-details-verification)
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📁 `multipart/form-data` — upload a binary file containing the bank account details (IBAN/BIC).
     * - 📝 `application/json` — reference an existing Workflow Session Applicant by ID.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `pro`, `scale`
     * - Add-ons (for production access): `Verify - Bank account document check`
     *
     * @param InitiateBankAccountFromApplicant|\stdClass|null $requestBody
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
        return '/verifications/bank_accounts';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof InitiateBankAccountFromApplicant) {
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
     * @return BankAccountFull|null
     *
     * @throws PostVerificationsBankAccountsBadRequestException
     * @throws PostVerificationsBankAccountsUnauthorizedException
     * @throws PostVerificationsBankAccountsForbiddenException
     * @throws PostVerificationsBankAccountsMethodNotAllowedException
     * @throws PostVerificationsBankAccountsUnsupportedMediaTypeException
     * @throws PostVerificationsBankAccountsTooManyRequestsException
     * @throws PostVerificationsBankAccountsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, BankAccountFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostVerificationsBankAccountsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
