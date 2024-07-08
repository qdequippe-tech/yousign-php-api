<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FromScratch1CustomText;
use Qdequippe\Yousign\Api\Model\FromScratch1RedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignatureRequestPlaceholderSignerSubstituteFromUserIdInput();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('label', $data) && null !== $data['label']) {
                $object->setLabel($data['label']);
                unset($data['label']);
            } elseif (\array_key_exists('label', $data) && null === $data['label']) {
                $object->setLabel(null);
            }
            if (\array_key_exists('user_id', $data) && null !== $data['user_id']) {
                $object->setUserId($data['user_id']);
                unset($data['user_id']);
            } elseif (\array_key_exists('user_id', $data) && null === $data['user_id']) {
                $object->setUserId(null);
            }
            if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
                $object->setSignatureLevel($data['signature_level']);
                unset($data['signature_level']);
            } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
                $object->setSignatureLevel(null);
            }
            if (\array_key_exists('signature_authentication_mode', $data) && null !== $data['signature_authentication_mode']) {
                $object->setSignatureAuthenticationMode($data['signature_authentication_mode']);
                unset($data['signature_authentication_mode']);
            } elseif (\array_key_exists('signature_authentication_mode', $data) && null === $data['signature_authentication_mode']) {
                $object->setSignatureAuthenticationMode(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], FromScratch1RedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
                $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], FromScratch1CustomText::class, 'json', $context));
                unset($data['custom_text']);
            } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
                $object->setCustomText(null);
            }
            if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
                $object->setDeliveryMode($data['delivery_mode']);
                unset($data['delivery_mode']);
            } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
                $object->setDeliveryMode(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['label'] = $object->getLabel();
            $data['user_id'] = $object->getUserId();
            if ($object->isInitialized('signatureLevel') && null !== $object->getSignatureLevel()) {
                $data['signature_level'] = $object->getSignatureLevel();
            }
            if ($object->isInitialized('signatureAuthenticationMode') && null !== $object->getSignatureAuthenticationMode()) {
                $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            if ($object->isInitialized('customText') && null !== $object->getCustomText()) {
                $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            }
            if ($object->isInitialized('deliveryMode') && null !== $object->getDeliveryMode()) {
                $data['delivery_mode'] = $object->getDeliveryMode();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false];
        }
    }
} else {
    class SignatureRequestPlaceholderSignerSubstituteFromUserIdInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignatureRequestPlaceholderSignerSubstituteFromUserIdInput();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('label', $data) && null !== $data['label']) {
                $object->setLabel($data['label']);
                unset($data['label']);
            } elseif (\array_key_exists('label', $data) && null === $data['label']) {
                $object->setLabel(null);
            }
            if (\array_key_exists('user_id', $data) && null !== $data['user_id']) {
                $object->setUserId($data['user_id']);
                unset($data['user_id']);
            } elseif (\array_key_exists('user_id', $data) && null === $data['user_id']) {
                $object->setUserId(null);
            }
            if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
                $object->setSignatureLevel($data['signature_level']);
                unset($data['signature_level']);
            } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
                $object->setSignatureLevel(null);
            }
            if (\array_key_exists('signature_authentication_mode', $data) && null !== $data['signature_authentication_mode']) {
                $object->setSignatureAuthenticationMode($data['signature_authentication_mode']);
                unset($data['signature_authentication_mode']);
            } elseif (\array_key_exists('signature_authentication_mode', $data) && null === $data['signature_authentication_mode']) {
                $object->setSignatureAuthenticationMode(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], FromScratch1RedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
                $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], FromScratch1CustomText::class, 'json', $context));
                unset($data['custom_text']);
            } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
                $object->setCustomText(null);
            }
            if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
                $object->setDeliveryMode($data['delivery_mode']);
                unset($data['delivery_mode']);
            } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
                $object->setDeliveryMode(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['label'] = $object->getLabel();
            $data['user_id'] = $object->getUserId();
            if ($object->isInitialized('signatureLevel') && null !== $object->getSignatureLevel()) {
                $data['signature_level'] = $object->getSignatureLevel();
            }
            if ($object->isInitialized('signatureAuthenticationMode') && null !== $object->getSignatureAuthenticationMode()) {
                $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            if ($object->isInitialized('customText') && null !== $object->getCustomText()) {
                $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            }
            if ($object->isInitialized('deliveryMode') && null !== $object->getDeliveryMode()) {
                $data['delivery_mode'] = $object->getDeliveryMode();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class => false];
        }
    }
}
