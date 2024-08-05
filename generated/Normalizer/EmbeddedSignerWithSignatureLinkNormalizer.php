<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\EmbeddedSignerWithSignatureLink;
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
    class EmbeddedSignerWithSignatureLinkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return EmbeddedSignerWithSignatureLink::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && EmbeddedSignerWithSignatureLink::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new EmbeddedSignerWithSignatureLink();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
                $object->setSignatureLink($data['signature_link']);
                unset($data['signature_link']);
            } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
                $object->setSignatureLink(null);
            }
            if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['signature_link_expiration_date']));
                unset($data['signature_link_expiration_date']);
            } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['signature_link'] = $object->getSignatureLink();
            $data['signature_link_expiration_date'] = $object->getSignatureLinkExpirationDate()->format('Y-m-d\TH:i:sP');
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [EmbeddedSignerWithSignatureLink::class => false];
        }
    }
} else {
    class EmbeddedSignerWithSignatureLinkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return EmbeddedSignerWithSignatureLink::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && EmbeddedSignerWithSignatureLink::class === $data::class;
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
            $object = new EmbeddedSignerWithSignatureLink();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
                $object->setSignatureLink($data['signature_link']);
                unset($data['signature_link']);
            } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
                $object->setSignatureLink(null);
            }
            if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['signature_link_expiration_date']));
                unset($data['signature_link_expiration_date']);
            } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
                $object->setSignatureLinkExpirationDate(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['signature_link'] = $object->getSignatureLink();
            $data['signature_link_expiration_date'] = $object->getSignatureLinkExpirationDate()->format('Y-m-d\TH:i:sP');
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [EmbeddedSignerWithSignatureLink::class => false];
        }
    }
}
