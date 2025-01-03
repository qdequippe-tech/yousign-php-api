<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchSignatureRequestsSignatureRequestIdApproversApproverId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Approver. Any parameters not provided are left unchanged.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     */
    public function __construct(protected string $signatureRequestId, protected string $approverId, ?PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{approverId}'], [$this->signatureRequestId, $this->approverId], '/signature_requests/{signatureRequestId}/approvers/{approverId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof PatchSignatureRequestsSignatureRequestIdApproversApproverIdRequest) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Approver|null
     *
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Approver::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (429 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (500 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
