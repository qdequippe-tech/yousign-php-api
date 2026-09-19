<?php

namespace Qdequippe\Yousign\Api\Endpoint;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignInternalServerErrorException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignMethodNotAllowedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignTooManyRequestsException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException;
use Qdequippe\Yousign\Api\Exception\PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException;
use Qdequippe\Yousign\Api\Model\BadRequestResponse;
use Qdequippe\Yousign\Api\Model\ForbiddenResponse;
use Qdequippe\Yousign\Api\Model\InternalServerError;
use Qdequippe\Yousign\Api\Model\MethodNotAllowed;
use Qdequippe\Yousign\Api\Model\NotFoundResponse;
use Qdequippe\Yousign\Api\Model\SignerSign;
use Qdequippe\Yousign\Api\Model\SignerSignWithUploadedSignatureImage;
use Qdequippe\Yousign\Api\Model\TooManyRequestsResponse;
use Qdequippe\Yousign\Api\Model\UnauthorizedResponse;
use Qdequippe\Yousign\Api\Model\UnsupportedMediaTypeResponse;
use Qdequippe\Yousign\Api\Runtime\Client\BaseEndpoint;
use Qdequippe\Yousign\Api\Runtime\Client\Endpoint;
use Qdequippe\Yousign\Api\Runtime\Client\EndpointTrait;
use Qdequippe\Yousign\Api\Runtime\Client\JsonPayload;
use Symfony\Component\Serializer\SerializerInterface;

class PostSignatureRequestsSignatureRequestIdSignersSignerIdSign extends BaseEndpoint implements Endpoint
{
    use EndpointTrait;

    /**
     * Sign a Signature Request on behalf of a given Signer.
     *
     * Use this endpoint if you are integrating [your own signing flow](https://developers.youtrust.com/docs/building-your-own-signing-flow) (Signers won't go through Youtrust's pre-made signing flow).
     *
     * To use this endpoint, you must match the following conditions:
     * - The Signature Request `delivery_mode` must be set to `none`.
     * - The Signature Request must not have any Approver, Signer Document Request or Signer Consent Request.
     * - The Signature Request must not have the parameter `signers_allowed_to_decline` set to `true`.
     * - The signature level must be `"Simple eSignature"`.
     *
     * Related guide: [Building your own signing flow](https://developers.youtrust.com/docs/building-your-own-signing-flow#step-3-collect-the-signer-consent-through-your-own-signing-flow)
     *
     * **ℹ️ This endpoint accepts two request body formats — pick the one that matches your use case:**
     * - 📝 `application/json` — sign without uploading a signature image.
     * - 📁 `multipart/form-data` — upload a signature image alongside the consent payload.
     *
     * **🔓 Endpoint access**
     * - Environments: `production`, `sandbox`
     * - API key scopes: `organization`, `workspace`
     * - Plans: `scale`
     * - Add-ons (for production access): _none_
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
        return str_replace(['{signatureRequestId}', '{signerId}'], [rawurlencode($this->signatureRequestId), rawurlencode($this->signerId)], '/signature_requests/{signatureRequestId}/signers/{signerId}/sign');
    }

    public function getBody(SerializerInterface $serializer, $streamFactory = null): array
    {
        if ($this->body instanceof SignerSign) {
            return [['Content-Type' => ['application/json']], JsonPayload::encode($serializer, $this->body)];
        }
        if ($this->body instanceof SignerSignWithUploadedSignatureImage) {
            $bodyBuilder = new MultipartStreamBuilder($streamFactory);
            $formParameters = $serializer->normalize($this->body, 'json');
            $partOptions = ['signature_image' => ['filename' => 'signature_image']];
            foreach ($formParameters as $key => $value) {
                $value = \is_int($value) ? (string) $value : $value;
                $value = \is_bool($value) ? $value ? 'true' : 'false' : $value;
                if (\is_array($value) || $value instanceof \stdClass) {
                    $value = $serializer->serialize((array) $value, 'json');
                }
                $resourceOptions = $partOptions[$key] ?? [];
                if (isset($resourceOptions['filename'])) {
                    $uri = null;
                    if ($value instanceof StreamInterface) {
                        $uri = $value->getMetadata('uri');
                    } elseif (\is_resource($value)) {
                        $uri = stream_get_meta_data($value)['uri'] ?? null;
                    }
                    if (\is_string($uri) && is_file($uri)) {
                        unset($resourceOptions['filename']);
                    }
                }
                $bodyBuilder->addResource($key, $value, $resourceOptions);
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
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignMethodNotAllowedException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignTooManyRequestsException
     * @throws PostSignatureRequestsSignatureRequestIdSignersSignerIdSignInternalServerErrorException
     */
    protected function transformResponseBody(ResponseInterface $response, SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if ((null === $contentType) === false && (400 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignBadRequestException($serializer->deserialize($body, BadRequestResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (401 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnauthorizedException($serializer->deserialize($body, UnauthorizedResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (403 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignForbiddenException($serializer->deserialize($body, ForbiddenResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (404 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignNotFoundException($serializer->deserialize($body, NotFoundResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (405 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignMethodNotAllowedException($serializer->deserialize($body, MethodNotAllowed::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (415 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignUnsupportedMediaTypeException($serializer->deserialize($body, UnsupportedMediaTypeResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (429 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignTooManyRequestsException($serializer->deserialize($body, TooManyRequestsResponse::class, 'json'), $response);
        }
        if ((null === $contentType) === false && (500 === $status && false !== stripos(strtolower($contentType), 'application/json'))) {
            throw new PostSignatureRequestsSignatureRequestIdSignersSignerIdSignInternalServerErrorException($serializer->deserialize($body, InternalServerError::class, 'json'), $response);
        }

        return null;
    }

    public function getAuthenticationScopes(): array
    {
        return ['bearerAuth'];
    }
}
