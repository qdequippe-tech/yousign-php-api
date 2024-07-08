<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitialsArea;
use Qdequippe\Yousign\Api\Model\UpdateDocument;
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
    class UpdateDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return UpdateDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\UpdateDocument::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('nature', $data) && null !== $data['nature']) {
                $object->setNature($data['nature']);
                unset($data['nature']);
            } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
                $object->setNature(null);
            }
            if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
                $object->setInsertAfterId($data['insert_after_id']);
                unset($data['insert_after_id']);
            } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
                $object->setInsertAfterId(null);
            }
            if (\array_key_exists('password', $data) && null !== $data['password']) {
                $object->setPassword($data['password']);
                unset($data['password']);
            } elseif (\array_key_exists('password', $data) && null === $data['password']) {
                $object->setPassword(null);
            }
            if (\array_key_exists('initials', $data) && null !== $data['initials']) {
                $object->setInitials($this->denormalizer->denormalize($data['initials'], InitialsArea::class, 'json', $context));
                unset($data['initials']);
            } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
                $object->setInitials(null);
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
            if ($object->isInitialized('nature') && null !== $object->getNature()) {
                $data['nature'] = $object->getNature();
            }
            if ($object->isInitialized('insertAfterId') && null !== $object->getInsertAfterId()) {
                $data['insert_after_id'] = $object->getInsertAfterId();
            }
            if ($object->isInitialized('password') && null !== $object->getPassword()) {
                $data['password'] = $object->getPassword();
            }
            if ($object->isInitialized('initials') && null !== $object->getInitials()) {
                $data['initials'] = $this->normalizer->normalize($object->getInitials(), 'json', $context);
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
            return [UpdateDocument::class => false];
        }
    }
} else {
    class UpdateDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UpdateDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\UpdateDocument::class === $data::class;
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
            $object = new UpdateDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('nature', $data) && null !== $data['nature']) {
                $object->setNature($data['nature']);
                unset($data['nature']);
            } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
                $object->setNature(null);
            }
            if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
                $object->setInsertAfterId($data['insert_after_id']);
                unset($data['insert_after_id']);
            } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
                $object->setInsertAfterId(null);
            }
            if (\array_key_exists('password', $data) && null !== $data['password']) {
                $object->setPassword($data['password']);
                unset($data['password']);
            } elseif (\array_key_exists('password', $data) && null === $data['password']) {
                $object->setPassword(null);
            }
            if (\array_key_exists('initials', $data) && null !== $data['initials']) {
                $object->setInitials($this->denormalizer->denormalize($data['initials'], InitialsArea::class, 'json', $context));
                unset($data['initials']);
            } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
                $object->setInitials(null);
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
            if ($object->isInitialized('nature') && null !== $object->getNature()) {
                $data['nature'] = $object->getNature();
            }
            if ($object->isInitialized('insertAfterId') && null !== $object->getInsertAfterId()) {
                $data['insert_after_id'] = $object->getInsertAfterId();
            }
            if ($object->isInitialized('password') && null !== $object->getPassword()) {
                $data['password'] = $object->getPassword();
            }
            if ($object->isInitialized('initials') && null !== $object->getInitials()) {
                $data['initials'] = $this->normalizer->normalize($object->getInitials(), 'json', $context);
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
            return [UpdateDocument::class => false];
        }
    }
}
