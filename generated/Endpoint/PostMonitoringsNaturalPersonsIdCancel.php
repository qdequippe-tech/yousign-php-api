<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsIdCancelUnauthorizedException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NaturalPersonMonitoringFull;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostMonitoringsNaturalPersonsIdCancel extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Stop watching a natural person. Only an `active` Ongoing Monitoring can be canceled.
     * A canceled Ongoing Monitoring emits no further event and cannot be resumed:
     * to watch that person again, initiate a new Ongoing Monitoring.
     *
     * @param string $naturalPersonMonitoringId Natural Person Ongoing Monitoring Id
     */
    public function __construct(protected string $naturalPersonMonitoringId)
    {
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{naturalPersonMonitoringId}'], [rawurlencode($this->naturalPersonMonitoringId)], '/monitorings/natural_persons/{naturalPersonMonitoringId}/cancel');
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
     * @return NaturalPersonMonitoringFull|null
     *
     * @throws PostMonitoringsNaturalPersonsIdCancelBadRequestException
     * @throws PostMonitoringsNaturalPersonsIdCancelUnauthorizedException
     * @throws PostMonitoringsNaturalPersonsIdCancelForbiddenException
     * @throws PostMonitoringsNaturalPersonsIdCancelNotFoundException
     * @throws PostMonitoringsNaturalPersonsIdCancelMethodNotAllowedException
     * @throws PostMonitoringsNaturalPersonsIdCancelTooManyRequestsException
     * @throws PostMonitoringsNaturalPersonsIdCancelInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (200 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, NaturalPersonMonitoringFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsIdCancelInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
