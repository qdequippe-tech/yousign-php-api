<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerDocumentRequest;
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
    class SignerDocumentRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignerDocumentRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerDocumentRequest::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignerDocumentRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('title', $data) && null !== $data['title']) {
                $object->setTitle($data['title']);
                unset($data['title']);
            } elseif (\array_key_exists('title', $data) && null === $data['title']) {
                $object->setTitle(null);
            }
            if (\array_key_exists('optional', $data) && null !== $data['optional']) {
                $object->setOptional($data['optional']);
                unset($data['optional']);
            } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
                $object->setOptional(null);
            }
            if (\array_key_exists('signer_ids', $data) && null !== $data['signer_ids']) {
                $values = [];
                foreach ($data['signer_ids'] as $value) {
                    $values[] = $value;
                }
                $object->setSignerIds($values);
                unset($data['signer_ids']);
            } elseif (\array_key_exists('signer_ids', $data) && null === $data['signer_ids']) {
                $object->setSignerIds(null);
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
            $data['title'] = $object->getTitle();
            $data['optional'] = $object->getOptional();
            $values = [];
            foreach ($object->getSignerIds() as $value) {
                $values[] = $value;
            }
            $data['signer_ids'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerDocumentRequest::class => false];
        }
    }
} else {
    class SignerDocumentRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignerDocumentRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerDocumentRequest::class === $data::class;
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
            $object = new SignerDocumentRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('title', $data) && null !== $data['title']) {
                $object->setTitle($data['title']);
                unset($data['title']);
            } elseif (\array_key_exists('title', $data) && null === $data['title']) {
                $object->setTitle(null);
            }
            if (\array_key_exists('optional', $data) && null !== $data['optional']) {
                $object->setOptional($data['optional']);
                unset($data['optional']);
            } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
                $object->setOptional(null);
            }
            if (\array_key_exists('signer_ids', $data) && null !== $data['signer_ids']) {
                $values = [];
                foreach ($data['signer_ids'] as $value) {
                    $values[] = $value;
                }
                $object->setSignerIds($values);
                unset($data['signer_ids']);
            } elseif (\array_key_exists('signer_ids', $data) && null === $data['signer_ids']) {
                $object->setSignerIds(null);
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
            $data['title'] = $object->getTitle();
            $data['optional'] = $object->getOptional();
            $values = [];
            foreach ($object->getSignerIds() as $value) {
                $values[] = $value;
            }
            $data['signer_ids'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerDocumentRequest::class => false];
        }
    }
}
