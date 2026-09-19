<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsCompaniesIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\CompanyFull;
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

class GetVerificationsCompaniesId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of a Company Verification.
     *
     * @param string $companyVerificationId Company Verification Id
     */
    public function __construct(protected string $companyVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{companyVerificationId}'], [rawurlencode($this->companyVerificationId)], '/verifications/companies/{companyVerificationId}');
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
     * @return CompanyFull|null
     *
     * @throws GetVerificationsCompaniesIdBadRequestException
     * @throws GetVerificationsCompaniesIdUnauthorizedException
     * @throws GetVerificationsCompaniesIdForbiddenException
     * @throws GetVerificationsCompaniesIdNotFoundException
     * @throws GetVerificationsCompaniesIdMethodNotAllowedException
     * @throws GetVerificationsCompaniesIdTooManyRequestsException
     * @throws GetVerificationsCompaniesIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, CompanyFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsCompaniesIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
