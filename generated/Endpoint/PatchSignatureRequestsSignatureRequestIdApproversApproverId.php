<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Model\UpdateApprover;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
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
    public function __construct(protected string $signatureRequestId, protected string $approverId, ?UpdateApprover $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{approverId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->approverId)], '/signature_requests/{signatureRequestId}/approvers/{approverId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateApprover) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
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
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdMethodNotAllowedException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException
     * @throws PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, Approver::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PatchSignatureRequestsSignatureRequestIdApproversApproverIdInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
