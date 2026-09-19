<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
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

class PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminder extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Sends a reminder to a given Approver to review their Signature Request.
     * Only possible when the Signature Request status is `approval` and the Approver status is `notified`.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $approverId         Approver Id
     */
    public function __construct(protected string $signatureRequestId, protected string $approverId)
    {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{approverId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->approverId)], '/signature_requests/{signatureRequestId}/approvers/{approverId}/send_reminder');
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
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (201 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdApproversApproverIdSendReminderInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
