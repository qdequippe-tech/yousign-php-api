<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInputCustomText;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignatureRequestPlaceholderSignerSubstituteFromInfoInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureRequestPlaceholderSignerSubstituteFromInfoInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('label', $data) && null !== $data['label']) {
            $object->setLabel($data['label']);
        } elseif (\array_key_exists('label', $data) && null === $data['label']) {
            $object->setLabel(null);
        }
        if (\array_key_exists('info', $data) && null !== $data['info']) {
            $object->setInfo($this->denormalizer->denormalize($data['info'], SignatureRequestPlaceholderSignerSubstituteFromInfoInputInfo::class, 'json', $context));
        } elseif (\array_key_exists('info', $data) && null === $data['info']) {
            $object->setInfo(null);
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
            $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls::class, 'json', $context));
        } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
            $object->setRedirectUrls(null);
        }
        if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
            $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], SignatureRequestSignerFromInfoInputCustomText::class, 'json', $context));
        } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
            $object->setCustomText(null);
        }
        if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
            $object->setDeliveryMode($data['delivery_mode']);
        } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
            $object->setDeliveryMode(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['label'] = $data->getLabel();
        $dataArray['info'] = null === $data->getInfo() ? null : new JsonObject($this->normalizer->normalize($data->getInfo(), 'json', $context));
        if ($data->isInitialized('signatureLevel') && null !== $data->getSignatureLevel()) {
            $dataArray['signature_level'] = $data->getSignatureLevel();
        }
        if ($data->isInitialized('signatureAuthenticationMode') && null !== $data->getSignatureAuthenticationMode()) {
            $dataArray['signature_authentication_mode'] = $data->getSignatureAuthenticationMode();
        }
        if ($data->isInitialized('redirectUrls') && null !== $data->getRedirectUrls()) {
            $dataArray['redirect_urls'] = null === $data->getRedirectUrls() ? null : new JsonObject($this->normalizer->normalize($data->getRedirectUrls(), 'json', $context));
        }
        if ($data->isInitialized('customText') && null !== $data->getCustomText()) {
            $dataArray['custom_text'] = null === $data->getCustomText() ? null : new JsonObject($this->normalizer->normalize($data->getCustomText(), 'json', $context));
        }
        if ($data->isInitialized('deliveryMode') && null !== $data->getDeliveryMode()) {
            $dataArray['delivery_mode'] = $data->getDeliveryMode();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class => false];
    }
}
