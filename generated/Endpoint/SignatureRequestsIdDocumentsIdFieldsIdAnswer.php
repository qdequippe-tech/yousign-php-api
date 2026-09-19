<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerBadRequestException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerForbiddenException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerNotFoundException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\SignatureRequestsIdDocumentsIdFieldsIdAnswerUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\FieldAnswer;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class SignatureRequestsIdDocumentsIdFieldsIdAnswer extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * This endpoint can be used on ongoing Signature Requests only.
     * It aims to fill a Field value with a Signer input collected in your custom signing interface. The Fields compatible are Text Fields, Checkboxes and Radio Groups.
     *
     * @param string $signatureRequestId Signature Request Id
     * @param string $documentId         Document Id
     * @param string $fieldId            Field Id
     */
    public function __construct(protected string $signatureRequestId, protected string $documentId, protected string $fieldId, ?FieldAnswer $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{documentId}', '{fieldId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->documentId), rawurlencode($this->fieldId)], '/signature_requests/{signatureRequestId}/documents/{documentId}/fields/{fieldId}/answer');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof FieldAnswer) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerBadRequestException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerUnauthorizedException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerForbiddenException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerNotFoundException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerMethodNotAllowedException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerTooManyRequestsException
     * @throws SignatureRequestsIdDocumentsIdFieldsIdAnswerInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new SignatureRequestsIdDocumentsIdFieldsIdAnswerInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
