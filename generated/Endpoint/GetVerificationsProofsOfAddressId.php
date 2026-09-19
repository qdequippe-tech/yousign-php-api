<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\GetVerificationsProofsOfAddressIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFull;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class GetVerificationsProofsOfAddressId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Get the detailed results of a Proof of Address Verification.
     *
     * @param string $proofOfAddressVerificationId Proof of Address Verification Id
     */
    public function __construct(protected string $proofOfAddressVerificationId)
    {
    }

    public function getMethod(): string
    {
        return 'GET';
    }

    public function getUri(): string
    {
        return str_replace(['{proofOfAddressVerificationId}'], [rawurlencode($this->proofOfAddressVerificationId)], '/verifications/proofs_of_address/{proofOfAddressVerificationId}');
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
     * @return ProofOfAddressVerificationFull|null
     *
     * @throws GetVerificationsProofsOfAddressIdBadRequestException
     * @throws GetVerificationsProofsOfAddressIdUnauthorizedException
     * @throws GetVerificationsProofsOfAddressIdForbiddenException
     * @throws GetVerificationsProofsOfAddressIdNotFoundException
     * @throws GetVerificationsProofsOfAddressIdMethodNotAllowedException
     * @throws GetVerificationsProofsOfAddressIdTooManyRequestsException
     * @throws GetVerificationsProofsOfAddressIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, ProofOfAddressVerificationFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new GetVerificationsProofsOfAddressIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
