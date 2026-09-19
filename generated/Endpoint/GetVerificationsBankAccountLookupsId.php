<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsBankAccountLookupsIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\BankAccountLookupFull;
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

class GetVerificationsBankAccountLookupsId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Retrieve a specific Bank Account Lookup Verification by its ID.
     *
     * @param string $bankAccountLookupVerificationId Bank Account Lookup Verification Id
     */
    public function __construct(protected string $bankAccountLookupVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{bankAccountLookupVerificationId}'], [rawurlencode($this->bankAccountLookupVerificationId)], '/verifications/bank_account_lookups/{bankAccountLookupVerificationId}');
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
     * @return BankAccountLookupFull|null
     *
     * @throws GetVerificationsBankAccountLookupsIdBadRequestException
     * @throws GetVerificationsBankAccountLookupsIdUnauthorizedException
     * @throws GetVerificationsBankAccountLookupsIdForbiddenException
     * @throws GetVerificationsBankAccountLookupsIdNotFoundException
     * @throws GetVerificationsBankAccountLookupsIdMethodNotAllowedException
     * @throws GetVerificationsBankAccountLookupsIdTooManyRequestsException
     * @throws GetVerificationsBankAccountLookupsIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, BankAccountLookupFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsBankAccountLookupsIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
