<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetBankAccountVerificationsBankAccountVerificationIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccountVerification;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetBankAccountVerificationsBankAccountVerificationId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of a bank account verification.
     *
     * @param string $bankAccountVerificationId The bank account verification ID
     */
    public function __construct(protected string $bankAccountVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{bankAccountVerificationId}'], [$this->bankAccountVerificationId], '/bank_account_verifications/{bankAccountVerificationId}');
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
     * @return BankAccountVerification|null
     *
     * @throws GetBankAccountVerificationsBankAccountVerificationIdBadRequestException
     * @throws GetBankAccountVerificationsBankAccountVerificationIdUnauthorizedException
     * @throws GetBankAccountVerificationsBankAccountVerificationIdForbiddenException
     * @throws GetBankAccountVerificationsBankAccountVerificationIdNotFoundException
     * @throws GetBankAccountVerificationsBankAccountVerificationIdTooManyRequestsException
     * @throws GetBankAccountVerificationsBankAccountVerificationIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, BankAccountVerification::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new GetBankAccountVerificationsBankAccountVerificationIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
