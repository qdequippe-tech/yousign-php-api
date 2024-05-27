<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerCustomText;
use Qdequippe\Yousign\Api\Model\SignerInfo;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
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
    class SignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Signer::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Signer::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Signer();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], SignerInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values[] = $value;
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
            if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
                $object->setSignatureLink($data['signature_link']);
                unset($data['signature_link']);
            } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
                $object->setSignatureLink(null);
            }
            if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['signature_link_expiration_date']));
                unset($data['signature_link_expiration_date']);
            } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(null);
            }
            if (\array_key_exists('signature_image_preview', $data) && null !== $data['signature_image_preview']) {
                $object->setSignatureImagePreview($data['signature_image_preview']);
                unset($data['signature_image_preview']);
            } elseif (\array_key_exists('signature_image_preview', $data) && null === $data['signature_image_preview']) {
                $object->setSignatureImagePreview(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], SignerRedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
                $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], SignerCustomText::class, 'json', $context));
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
            if (\array_key_exists('identification_attestation_id', $data) && null !== $data['identification_attestation_id']) {
                $object->setIdentificationAttestationId($data['identification_attestation_id']);
                unset($data['identification_attestation_id']);
            } elseif (\array_key_exists('identification_attestation_id', $data) && null === $data['identification_attestation_id']) {
                $object->setIdentificationAttestationId(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            $data['status'] = $object->getStatus();
            $values = [];
            foreach ($object->getFields() as $value) {
                $values[] = $value;
            }
            $data['fields'] = $values;
            $data['signature_level'] = $object->getSignatureLevel();
            $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            $data['signature_link'] = $object->getSignatureLink();
            $data['signature_link_expiration_date'] = $object->getSignatureLinkExpirationDate()->format('Y-m-d\\TH:i:sP');
            $data['signature_image_preview'] = $object->getSignatureImagePreview();
            $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            $data['delivery_mode'] = $object->getDeliveryMode();
            $data['identification_attestation_id'] = $object->getIdentificationAttestationId();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Signer::class => false];
        }
    }
} else {
    class SignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Signer::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Signer::class === $data::class;
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
            $object = new Signer();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], SignerInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values[] = $value;
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
            if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
                $object->setSignatureLink($data['signature_link']);
                unset($data['signature_link']);
            } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
                $object->setSignatureLink(null);
            }
            if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['signature_link_expiration_date']));
                unset($data['signature_link_expiration_date']);
            } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(null);
            }
            if (\array_key_exists('signature_image_preview', $data) && null !== $data['signature_image_preview']) {
                $object->setSignatureImagePreview($data['signature_image_preview']);
                unset($data['signature_image_preview']);
            } elseif (\array_key_exists('signature_image_preview', $data) && null === $data['signature_image_preview']) {
                $object->setSignatureImagePreview(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], SignerRedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
                $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], SignerCustomText::class, 'json', $context));
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
            if (\array_key_exists('identification_attestation_id', $data) && null !== $data['identification_attestation_id']) {
                $object->setIdentificationAttestationId($data['identification_attestation_id']);
                unset($data['identification_attestation_id']);
            } elseif (\array_key_exists('identification_attestation_id', $data) && null === $data['identification_attestation_id']) {
                $object->setIdentificationAttestationId(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            $data['id'] = $object->getId();
            $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            $data['status'] = $object->getStatus();
            $values = [];
            foreach ($object->getFields() as $value) {
                $values[] = $value;
            }
            $data['fields'] = $values;
            $data['signature_level'] = $object->getSignatureLevel();
            $data['signature_authentication_mode'] = $object->getSignatureAuthenticationMode();
            $data['signature_link'] = $object->getSignatureLink();
            $data['signature_link_expiration_date'] = $object->getSignatureLinkExpirationDate()->format('Y-m-d\\TH:i:sP');
            $data['signature_image_preview'] = $object->getSignatureImagePreview();
            $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            $data['custom_text'] = $this->normalizer->normalize($object->getCustomText(), 'json', $context);
            $data['delivery_mode'] = $object->getDeliveryMode();
            $data['identification_attestation_id'] = $object->getIdentificationAttestationId();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Signer::class => false];
        }
    }
}
