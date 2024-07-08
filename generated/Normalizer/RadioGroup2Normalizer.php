<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\RadioGroup2;
use Qdequippe\Yousign\Api\Model\RadioGroup2RadiosInner;
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
    class RadioGroup2Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return RadioGroup2::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\RadioGroup2::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new RadioGroup2();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
                $object->setDocumentId($data['document_id']);
                unset($data['document_id']);
            } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
                $object->setDocumentId(null);
            }
            if (\array_key_exists('type', $data) && null !== $data['type']) {
                $object->setType($data['type']);
                unset($data['type']);
            } elseif (\array_key_exists('type', $data) && null === $data['type']) {
                $object->setType(null);
            }
            if (\array_key_exists('page', $data) && null !== $data['page']) {
                $object->setPage($data['page']);
                unset($data['page']);
            } elseif (\array_key_exists('page', $data) && null === $data['page']) {
                $object->setPage(null);
            }
            if (\array_key_exists('optional', $data) && null !== $data['optional']) {
                $object->setOptional($data['optional']);
                unset($data['optional']);
            } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
                $object->setOptional(null);
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('radios', $data) && null !== $data['radios']) {
                $values = [];
                foreach ($data['radios'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, RadioGroup2RadiosInner::class, 'json', $context);
                }
                $object->setRadios($values);
                unset($data['radios']);
            } elseif (\array_key_exists('radios', $data) && null === $data['radios']) {
                $object->setRadios(null);
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
            $data['document_id'] = $object->getDocumentId();
            $data['type'] = $object->getType();
            $data['page'] = $object->getPage();
            $data['optional'] = $object->getOptional();
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            $values = [];
            foreach ($object->getRadios() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['radios'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [RadioGroup2::class => false];
        }
    }
} else {
    class RadioGroup2Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return RadioGroup2::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\RadioGroup2::class === $data::class;
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
            $object = new RadioGroup2();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
                $object->setDocumentId($data['document_id']);
                unset($data['document_id']);
            } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
                $object->setDocumentId(null);
            }
            if (\array_key_exists('type', $data) && null !== $data['type']) {
                $object->setType($data['type']);
                unset($data['type']);
            } elseif (\array_key_exists('type', $data) && null === $data['type']) {
                $object->setType(null);
            }
            if (\array_key_exists('page', $data) && null !== $data['page']) {
                $object->setPage($data['page']);
                unset($data['page']);
            } elseif (\array_key_exists('page', $data) && null === $data['page']) {
                $object->setPage(null);
            }
            if (\array_key_exists('optional', $data) && null !== $data['optional']) {
                $object->setOptional($data['optional']);
                unset($data['optional']);
            } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
                $object->setOptional(null);
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('radios', $data) && null !== $data['radios']) {
                $values = [];
                foreach ($data['radios'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, RadioGroup2RadiosInner::class, 'json', $context);
                }
                $object->setRadios($values);
                unset($data['radios']);
            } elseif (\array_key_exists('radios', $data) && null === $data['radios']) {
                $object->setRadios(null);
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
            $data['document_id'] = $object->getDocumentId();
            $data['type'] = $object->getType();
            $data['page'] = $object->getPage();
            $data['optional'] = $object->getOptional();
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            $values = [];
            foreach ($object->getRadios() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['radios'] = $values;
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [RadioGroup2::class => false];
        }
    }
}
