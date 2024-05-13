<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FromScratch1CustomText;
use Qdequippe\Yousign\Api\Model\FromScratch1RedirectUrls;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromContactIdInput;
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
    class SignatureRequestSignerFromContactIdInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequestSignerFromContactIdInput::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignatureRequestSignerFromContactIdInput::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignatureRequestSignerFromContactIdInput();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('contact_id', $data) && null !== $data['contact_id']) {
                $object->setContactId($data['contact_id']);
                unset($data['contact_id']);
            } elseif (\array_key_exists('contact_id', $data) && null === $data['contact_id']) {
                $object->setContactId(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setFields($values);
                unset($data['fields']);
            } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
                $object->setFields(null);
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
            foreach ($data as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['contact_id'] = $object->getContactId();
            if ($object->isInitialized('fields') && null !== $object->getFields()) {
                $values = [];
                foreach ($object->getFields() as $value) {
                    $values_1 = [];
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $data['fields'] = $values;
            }
            $data['signature_level'] = $object->getSignatureLevel();
            if ($object->isInitialized('signatureAuthenticationMode') && null !== $object->getSignatureAuthenticationMode()) {
                $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            if ($object->isInitialized('customText') && null !== $object->getCustomText()) {
                $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignatureRequestSignerFromContactIdInput::class => false];
        }
    }
} else {
    class SignatureRequestSignerFromContactIdInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequestSignerFromContactIdInput::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignatureRequestSignerFromContactIdInput::class === $data::class;
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
            $object = new SignatureRequestSignerFromContactIdInput();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('contact_id', $data) && null !== $data['contact_id']) {
                $object->setContactId($data['contact_id']);
                unset($data['contact_id']);
            } elseif (\array_key_exists('contact_id', $data) && null === $data['contact_id']) {
                $object->setContactId(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setFields($values);
                unset($data['fields']);
            } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
                $object->setFields(null);
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
            foreach ($data as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_2;
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
            $data['contact_id'] = $object->getContactId();
            if ($object->isInitialized('fields') && null !== $object->getFields()) {
                $values = [];
                foreach ($object->getFields() as $value) {
                    $values_1 = [];
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $data['fields'] = $values;
            }
            $data['signature_level'] = $object->getSignatureLevel();
            if ($object->isInitialized('signatureAuthenticationMode') && null !== $object->getSignatureAuthenticationMode()) {
                $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            if ($object->isInitialized('customText') && null !== $object->getCustomText()) {
                $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            }
            foreach ($object as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignatureRequestSignerFromContactIdInput::class => false];
        }
    }
}
