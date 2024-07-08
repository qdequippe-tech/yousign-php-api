<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\FontVariants;
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
    class CreateFieldFontNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return CreateFieldFont::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateFieldFont::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateFieldFont();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('family', $data) && null !== $data['family']) {
                $object->setFamily($data['family']);
                unset($data['family']);
            } elseif (\array_key_exists('family', $data) && null === $data['family']) {
                $object->setFamily(null);
            }
            if (\array_key_exists('color', $data) && null !== $data['color']) {
                $object->setColor($data['color']);
                unset($data['color']);
            } elseif (\array_key_exists('color', $data) && null === $data['color']) {
                $object->setColor(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('variants', $data) && null !== $data['variants']) {
                $object->setVariants($this->denormalizer->denormalize($data['variants'], FontVariants::class, 'json', $context));
                unset($data['variants']);
            } elseif (\array_key_exists('variants', $data) && null === $data['variants']) {
                $object->setVariants(null);
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
            $data['family'] = $object->getFamily();
            $data['color'] = $object->getColor();
            $data['size'] = $object->getSize();
            $data['variants'] = $this->normalizer->normalize($object->getVariants(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateFieldFont::class => false];
        }
    }
} else {
    class CreateFieldFontNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return CreateFieldFont::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateFieldFont::class === $data::class;
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
            $object = new CreateFieldFont();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('family', $data) && null !== $data['family']) {
                $object->setFamily($data['family']);
                unset($data['family']);
            } elseif (\array_key_exists('family', $data) && null === $data['family']) {
                $object->setFamily(null);
            }
            if (\array_key_exists('color', $data) && null !== $data['color']) {
                $object->setColor($data['color']);
                unset($data['color']);
            } elseif (\array_key_exists('color', $data) && null === $data['color']) {
                $object->setColor(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('variants', $data) && null !== $data['variants']) {
                $object->setVariants($this->denormalizer->denormalize($data['variants'], FontVariants::class, 'json', $context));
                unset($data['variants']);
            } elseif (\array_key_exists('variants', $data) && null === $data['variants']) {
                $object->setVariants(null);
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
            $data['family'] = $object->getFamily();
            $data['color'] = $object->getColor();
            $data['size'] = $object->getSize();
            $data['variants'] = $this->normalizer->normalize($object->getVariants(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateFieldFont::class => false];
        }
    }
}
