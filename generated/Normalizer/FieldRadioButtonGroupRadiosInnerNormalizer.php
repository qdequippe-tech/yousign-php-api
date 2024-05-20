<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroupRadiosInner;
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
    class FieldRadioButtonGroupRadiosInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return FieldRadioButtonGroupRadiosInner::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && FieldRadioButtonGroupRadiosInner::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new FieldRadioButtonGroupRadiosInner();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('x', $data) && null !== $data['x']) {
                $object->setX($data['x']);
                unset($data['x']);
            } elseif (\array_key_exists('x', $data) && null === $data['x']) {
                $object->setX(null);
            }
            if (\array_key_exists('y', $data) && null !== $data['y']) {
                $object->setY($data['y']);
                unset($data['y']);
            } elseif (\array_key_exists('y', $data) && null === $data['y']) {
                $object->setY(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('checked', $data) && null !== $data['checked']) {
                $object->setChecked($data['checked']);
                unset($data['checked']);
            } elseif (\array_key_exists('checked', $data) && null === $data['checked']) {
                $object->setChecked(null);
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
            $data['name'] = $object->getName();
            $data['x'] = $object->getX();
            $data['y'] = $object->getY();
            $data['size'] = $object->getSize();
            $data['checked'] = $object->getChecked();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [FieldRadioButtonGroupRadiosInner::class => false];
        }
    }
} else {
    class FieldRadioButtonGroupRadiosInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return FieldRadioButtonGroupRadiosInner::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && FieldRadioButtonGroupRadiosInner::class === $data::class;
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
            $object = new FieldRadioButtonGroupRadiosInner();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('x', $data) && null !== $data['x']) {
                $object->setX($data['x']);
                unset($data['x']);
            } elseif (\array_key_exists('x', $data) && null === $data['x']) {
                $object->setX(null);
            }
            if (\array_key_exists('y', $data) && null !== $data['y']) {
                $object->setY($data['y']);
                unset($data['y']);
            } elseif (\array_key_exists('y', $data) && null === $data['y']) {
                $object->setY(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('checked', $data) && null !== $data['checked']) {
                $object->setChecked($data['checked']);
                unset($data['checked']);
            } elseif (\array_key_exists('checked', $data) && null === $data['checked']) {
                $object->setChecked(null);
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
            $data['name'] = $object->getName();
            $data['x'] = $object->getX();
            $data['y'] = $object->getY();
            $data['size'] = $object->getSize();
            $data['checked'] = $object->getChecked();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [FieldRadioButtonGroupRadiosInner::class => false];
        }
    }
}
