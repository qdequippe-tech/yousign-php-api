<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\DeleteSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class DeleteSignatureRequestsSignatureRequestIdApproversApproverId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Deletes a given Approver from a Signature Request.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     */
    public function __construct(protected string $signatureRequestId, protected string $approverId)
    {
    }

    public function getMethod(): string
    {
        return 'DELETE';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{approverId}'], [$this->signatureRequestId, $this->approverId], '/signature_requests/{signatureRequestId}/approvers/{approverId}');
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
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException
     * @throws DeleteSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new DeleteSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
