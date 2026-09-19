<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostMonitoringsNaturalPersonsUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InitiateNaturalPersonMonitoring;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NaturalPersonMonitoringFull;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostMonitoringsNaturalPersons extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Subscribe to Ongoing Monitoring for a natural person.
     * Once the Ongoing Monitoring is active, you are notified through webhooks whenever a change is
     * detected on that person, such as a new sanction, a new politically exposed position, or a change
     * in the companies they are involved in.
     *
     * Activation is asynchronous: this endpoint returns an Ongoing Monitoring with the `pending` status,
     * which is not watching the person yet. Do not assume the person is watched before you receive the
     * `monitoring.natural_person.activated` webhook event.
     * If the Ongoing Monitoring could not be started you receive `monitoring.natural_person.inconclusive`
     * instead; that status is final, so initiate a new Ongoing Monitoring to try again.
     */
    public function __construct(?InitiateNaturalPersonMonitoring $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return '/monitorings/natural_persons';
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof InitiateNaturalPersonMonitoring) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return NaturalPersonMonitoringFull|null
     *
     * @throws PostMonitoringsNaturalPersonsBadRequestException
     * @throws PostMonitoringsNaturalPersonsUnauthorizedException
     * @throws PostMonitoringsNaturalPersonsForbiddenException
     * @throws PostMonitoringsNaturalPersonsMethodNotAllowedException
     * @throws PostMonitoringsNaturalPersonsUnsupportedMediaTypeException
     * @throws PostMonitoringsNaturalPersonsTooManyRequestsException
     * @throws PostMonitoringsNaturalPersonsInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if ((null === $contentType) === false && (201 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            return $serializer->deserialize($body, NaturalPersonMonitoringFull::class, 'json');
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostMonitoringsNaturalPersonsInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
