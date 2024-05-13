<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FromScratch1CustomText;
use Qdequippe\Yousign\Api\Model\FromScratch1RedirectUrls;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateSignerInfo;
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
    class UpdateSignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return UpdateSigner::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateSigner::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateSigner();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], UpdateSignerInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
                $object->setInsertAfterId($data['insert_after_id']);
                unset($data['insert_after_id']);
            } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
                $object->setInsertAfterId(null);
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
            if ($object->isInitialized('info') && null !== $object->getInfo()) {
                $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            }
            if ($object->isInitialized('insertAfterId') && null !== $object->getInsertAfterId()) {
                $data['insert_after_id'] = $object->getInsertAfterId();
            }
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
            return [UpdateSigner::class => false];
        }
    }
} else {
    class UpdateSignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UpdateSigner::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateSigner::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateSigner();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], UpdateSignerInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
                $object->setInsertAfterId($data['insert_after_id']);
                unset($data['insert_after_id']);
            } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
                $object->setInsertAfterId(null);
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
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            if ($object->isInitialized('info') && null !== $object->getInfo()) {
                $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            }
            if ($object->isInitialized('insertAfterId') && null !== $object->getInsertAfterId()) {
                $data['insert_after_id'] = $object->getInsertAfterId();
            }
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
            return [UpdateSigner::class => false];
        }
    }
}
