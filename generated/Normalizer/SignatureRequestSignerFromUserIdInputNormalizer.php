<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputCustomText;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignatureRequestSignerFromUserIdInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureRequestSignerFromUserIdInput::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureRequestSignerFromUserIdInput::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureRequestSignerFromUserIdInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('pre_identity_verification_required', $data) && \is_int($data['pre_identity_verification_required'])) {
            $data['pre_identity_verification_required'] = (bool) $data['pre_identity_verification_required'];
        }
        if (\array_key_exists('user_id', $data) && null !== $data['user_id']) {
            $object->setUserId($data['user_id']);
        } elseif (\array_key_exists('user_id', $data) && null === $data['user_id']) {
            $object->setUserId(null);
        }
        if (\array_key_exists('fields', $data) && null !== $data['fields']) {
            $values = [];
            foreach ($data['fields'] as $value) {
                $values_1 = new JsonObject();
                foreach ($value as $key => $value_1) {
                    $values_1[$key] = $value_1;
                }
                $values[] = $values_1;
            }
            $object->setFields($values);
        } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
            $object->setFields(null);
        }
        if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
            $object->setSignatureLevel($data['signature_level']);
        } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
            $object->setSignatureLevel(null);
        }
        if (\array_key_exists('signature_authentication_mode', $data) && null !== $data['signature_authentication_mode']) {
            $object->setSignatureAuthenticationMode($data['signature_authentication_mode']);
        } elseif (\array_key_exists('signature_authentication_mode', $data) && null === $data['signature_authentication_mode']) {
            $object->setSignatureAuthenticationMode(null);
        }
        if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
            $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], SignatureRequestSignerFromInfoInputRedirectUrls::class, 'json', $context));
        } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
            $object->setRedirectUrls(null);
        }
        if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
            $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], SignatureRequestSignerFromInfoInputCustomText::class, 'json', $context));
        } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
            $object->setCustomText(null);
        }
        if (\array_key_exists('pre_identity_verification_required', $data) && null !== $data['pre_identity_verification_required']) {
            $object->setPreIdentityVerificationRequired($data['pre_identity_verification_required']);
        } elseif (\array_key_exists('pre_identity_verification_required', $data) && null === $data['pre_identity_verification_required']) {
            $object->setPreIdentityVerificationRequired(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['user_id'] = $data->getUserId();
        if ($data->isInitialized('fields') && null !== $data->getFields()) {
            $values = [];
            foreach ($data->getFields() as $value) {
                $values_1 = new JsonObject();
                foreach ($value as $key => $value_1) {
                    $values_1[$key] = $value_1;
                }
                $values[] = $values_1;
            }
            $dataArray['fields'] = $values;
        }
        $dataArray['signature_level'] = $data->getSignatureLevel();
        if ($data->isInitialized('signatureAuthenticationMode') && null !== $data->getSignatureAuthenticationMode()) {
            $dataArray['signature_authentication_mode'] = $data->getSignatureAuthenticationMode();
        }
        if ($data->isInitialized('redirectUrls') && null !== $data->getRedirectUrls()) {
            $dataArray['redirect_urls'] = null === $data->getRedirectUrls() ? null : new JsonObject($this->normalizer->normalize($data->getRedirectUrls(), 'json', $context));
        }
        if ($data->isInitialized('customText') && null !== $data->getCustomText()) {
            $dataArray['custom_text'] = null === $data->getCustomText() ? null : new JsonObject($this->normalizer->normalize($data->getCustomText(), 'json', $context));
        }
        if ($data->isInitialized('preIdentityVerificationRequired') && null !== $data->getPreIdentityVerificationRequired()) {
            $dataArray['pre_identity_verification_required'] = $data->getPreIdentityVerificationRequired();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignatureRequestSignerFromUserIdInput::class => false];
    }
}
