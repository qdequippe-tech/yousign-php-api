<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\PostArchives401Response;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\SignerSignWithUploadedSignatureImage;
use Qdequippe\Yousign\Api\Model\ViolationResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdSignersSignerIdSign extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Sign a Signature Request on behalf of a given Signer.
     *
     * @param string                                               $signatureRequestId Signature Request Id
     * @param string                                               $signerId           Signer Id
     * @param SignerSign|SignerSignWithUploadedSignatureImage|null $requestBody
     */
    public function __construct(protected string $signatureRequestId, protected string $signerId, $requestBody = null)
    {
        $this->body = $requestBody;
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return str_replace(['{signatureRequestId}', '{signerId}'], [$this->signatureRequestId, $this->signerId], '/signature_requests/{signatureRequestId}/signers/{signerId}/sign');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof SignerSign) {
            return [['Content-Type' => ['application/json']], $serializer->serialize($this->body, 'json')];
        }
        if ($this->body instanceof SignerSignWithUploadedSignatureImage) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $bodyBuilder->addResource($key, $value);
            }

            return [['Content-Type' => ['multipart/form-data; boundary="'.($bodyBuilder->getBoundary().'"')]], $bodyBuilder->build()];
        }

        return [[], null];
    }

    public function getExtraHeaders(): array
    {
        return ['Accept' => ['application/json']];
    }

    /**
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (null !== $contentType && (400 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }
        if (null !== $contentType && (401 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException($serializer->deserialize($body, PostArchives401Response::class, 'json'), $response);
        }
        if (null !== $contentType && (403 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException($response);
        }
        if (null !== $contentType && (404 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException($response);
        }
        if (null !== $contentType && (415 === $status && false !== mb_strpos($contentType, 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException($serializer->deserialize($body, ViolationResponse::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
