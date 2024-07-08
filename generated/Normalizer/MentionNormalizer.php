<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\Mention;
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
    class MentionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Mention::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\Mention::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Mention();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
                $object->setSignerId($data['signer_id']);
                unset($data['signer_id']);
            } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
                $object->setSignerId(null);
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
            if (\array_key_exists('mention', $data) && null !== $data['mention']) {
                $object->setMention($data['mention']);
                unset($data['mention']);
            } elseif (\array_key_exists('mention', $data) && null === $data['mention']) {
                $object->setMention(null);
            }
            if (\array_key_exists('font', $data) && null !== $data['font']) {
                $object->setFont($this->denormalizer->denormalize($data['font'], CreateFieldFont::class, 'json', $context));
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
            $data['signer_id'] = $object->getSignerId();
            $data['type'] = $object->getType();
            $data['page'] = $object->getPage();
            $data['x'] = $object->getX();
            $data['y'] = $object->getY();
            if ($object->isInitialized('width') && null !== $object->getWidth()) {
                $data['width'] = $object->getWidth();
            }
            if ($object->isInitialized('height') && null !== $object->getHeight()) {
                $data['height'] = $object->getHeight();
            }
            $data['mention'] = $object->getMention();
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
            return [Mention::class => false];
        }
    }
} else {
    class MentionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Mention::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\Mention::class === $data::class;
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
            $object = new Mention();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
                $object->setSignerId($data['signer_id']);
                unset($data['signer_id']);
            } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
                $object->setSignerId(null);
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
            if (\array_key_exists('mention', $data) && null !== $data['mention']) {
                $object->setMention($data['mention']);
                unset($data['mention']);
            } elseif (\array_key_exists('mention', $data) && null === $data['mention']) {
                $object->setMention(null);
            }
            if (\array_key_exists('font', $data) && null !== $data['font']) {
                $object->setFont($this->denormalizer->denormalize($data['font'], CreateFieldFont::class, 'json', $context));
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
            $data['signer_id'] = $object->getSignerId();
            $data['type'] = $object->getType();
            $data['page'] = $object->getPage();
            $data['x'] = $object->getX();
            $data['y'] = $object->getY();
            if ($object->isInitialized('width') && null !== $object->getWidth()) {
                $data['width'] = $object->getWidth();
            }
            if ($object->isInitialized('height') && null !== $object->getHeight()) {
                $data['height'] = $object->getHeight();
            }
            $data['mention'] = $object->getMention();
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
            return [Mention::class => false];
        }
    }
}
