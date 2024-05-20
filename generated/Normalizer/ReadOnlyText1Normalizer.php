<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ReadOnlyText1;
use Qdequippe\Yousign\Api\Model\UpdateFieldFont;
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
    class ReadOnlyText1Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return ReadOnlyText1::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ReadOnlyText1::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ReadOnlyText1();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('page', $data) && null !== $data['page']) {
                $object->setPage($data['page']);
                unset($data['page']);
            } elseif (\array_key_exists('page', $data) && null === $data['page']) {
                $object->setPage(null);
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
            if (\array_key_exists('width', $data) && null !== $data['width']) {
                $object->setWidth($data['width']);
                unset($data['width']);
            } elseif (\array_key_exists('width', $data) && null === $data['width']) {
                $object->setWidth(null);
            }
            if (\array_key_exists('height', $data) && null !== $data['height']) {
                $object->setHeight($data['height']);
                unset($data['height']);
            } elseif (\array_key_exists('height', $data) && null === $data['height']) {
                $object->setHeight(null);
            }
            if (\array_key_exists('text', $data) && null !== $data['text']) {
                $object->setText($data['text']);
                unset($data['text']);
            } elseif (\array_key_exists('text', $data) && null === $data['text']) {
                $object->setText(null);
            }
            if (\array_key_exists('font', $data) && null !== $data['font']) {
                $object->setFont($this->denormalizer->denormalize($data['font'], UpdateFieldFont::class, 'json', $context));
                unset($data['font']);
            } elseif (\array_key_exists('font', $data) && null === $data['font']) {
                $object->setFont(null);
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
            if ($object->isInitialized('page') && null !== $object->getPage()) {
                $data['page'] = $object->getPage();
            }
            if ($object->isInitialized('x') && null !== $object->getX()) {
                $data['x'] = $object->getX();
            }
            if ($object->isInitialized('y') && null !== $object->getY()) {
                $data['y'] = $object->getY();
            }
            if ($object->isInitialized('width') && null !== $object->getWidth()) {
                $data['width'] = $object->getWidth();
            }
            if ($object->isInitialized('height') && null !== $object->getHeight()) {
                $data['height'] = $object->getHeight();
            }
            if ($object->isInitialized('text') && null !== $object->getText()) {
                $data['text'] = $object->getText();
            }
            if ($object->isInitialized('font') && null !== $object->getFont()) {
                $data['font'] = $this->normalizer->normalize($object->getFont(), 'json', $context);
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
            return [ReadOnlyText1::class => false];
        }
    }
} else {
    class ReadOnlyText1Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return ReadOnlyText1::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ReadOnlyText1::class === $data::class;
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
            $object = new ReadOnlyText1();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('page', $data) && null !== $data['page']) {
                $object->setPage($data['page']);
                unset($data['page']);
            } elseif (\array_key_exists('page', $data) && null === $data['page']) {
                $object->setPage(null);
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
            if (\array_key_exists('width', $data) && null !== $data['width']) {
                $object->setWidth($data['width']);
                unset($data['width']);
            } elseif (\array_key_exists('width', $data) && null === $data['width']) {
                $object->setWidth(null);
            }
            if (\array_key_exists('height', $data) && null !== $data['height']) {
                $object->setHeight($data['height']);
                unset($data['height']);
            } elseif (\array_key_exists('height', $data) && null === $data['height']) {
                $object->setHeight(null);
            }
            if (\array_key_exists('text', $data) && null !== $data['text']) {
                $object->setText($data['text']);
                unset($data['text']);
            } elseif (\array_key_exists('text', $data) && null === $data['text']) {
                $object->setText(null);
            }
            if (\array_key_exists('font', $data) && null !== $data['font']) {
                $object->setFont($this->denormalizer->denormalize($data['font'], UpdateFieldFont::class, 'json', $context));
                unset($data['font']);
            } elseif (\array_key_exists('font', $data) && null === $data['font']) {
                $object->setFont(null);
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
            if ($object->isInitialized('page') && null !== $object->getPage()) {
                $data['page'] = $object->getPage();
            }
            if ($object->isInitialized('x') && null !== $object->getX()) {
                $data['x'] = $object->getX();
            }
            if ($object->isInitialized('y') && null !== $object->getY()) {
                $data['y'] = $object->getY();
            }
            if ($object->isInitialized('width') && null !== $object->getWidth()) {
                $data['width'] = $object->getWidth();
            }
            if ($object->isInitialized('height') && null !== $object->getHeight()) {
                $data['height'] = $object->getHeight();
            }
            if ($object->isInitialized('text') && null !== $object->getText()) {
                $data['text'] = $object->getText();
            }
            if ($object->isInitialized('font') && null !== $object->getFont()) {
                $data['font'] = $this->normalizer->normalize($object->getFont(), 'json', $context);
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
            return [ReadOnlyText1::class => false];
        }
    }
}
