<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PatchContactsContactIdBadRequestException;
use Qdequippe\Yousign\Api\Exception\PatchContactsContactIdForbiddenException;
use Qdequippe\Yousign\Api\Exception\PatchContactsContactIdNotFoundException;
use Qdequippe\Yousign\Api\Exception\PatchContactsContactIdUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PatchContactsContactIdUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\Contact;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\UpdateContact;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PatchContactsContactId extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Updates a given Contact.
     * Any parameters not provided are left unchanged.
     *
     * @param string $contactId Contact Id
     */
    public function __construct(protected string $contactId, ?UpdateContact $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'PATCH';
    }

    public function getUri(): string
    {
        return str_replace(['{contactId}'], [$this->contactId], '/contacts/{contactId}');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof UpdateContact) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @return Contact|null
     *
     * @throws PatchContactsContactIdBadRequestException
     * @throws PatchContactsContactIdUnauthorizedException
     * @throws PatchContactsContactIdForbiddenException
     * @throws PatchContactsContactIdNotFoundException
     * @throws PatchContactsContactIdUnsupportedMediaTypeException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (null !== $contentType && (200 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            return $serializer->deserialize($body, Contact::class, 'json');
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchContactsContactIdBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchContactsContactIdUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchContactsContactIdForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchContactsContactIdNotFoundException($response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PatchContactsContactIdUnsupportedMediaTypeException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
