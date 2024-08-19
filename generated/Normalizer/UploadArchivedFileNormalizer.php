<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
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
    class UploadArchivedFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return UploadArchivedFile::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UploadArchivedFile::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UploadArchivedFile();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('file', $data) && null !== $data['file']) {
                $object->setFile($data['file']);
                unset($data['file']);
            } elseif (\array_key_exists('file', $data) && null === $data['file']) {
                $object->setFile(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('archive_y', $data) && null !== $data['archive_y']) {
                $object->setArchiveY($data['archive_y']);
                unset($data['archive_y']);
            } elseif (\array_key_exists('archive_y', $data) && null === $data['archive_y']) {
                $object->setArchiveY(null);
            }
            if (\array_key_exists('tags', $data) && null !== $data['tags']) {
                $values = [];
                foreach ($data['tags'] as $value) {
                    $values[] = $value;
                }
                $object->setTags($values);
                unset($data['tags']);
            } elseif (\array_key_exists('tags', $data) && null === $data['tags']) {
                $object->setTags(null);
            }
            if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
                $object->setExpiredAt($data['expired_at']);
                unset($data['expired_at']);
            } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
                $object->setExpiredAt(null);
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
            $data['file'] = $object->getFile();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('archiveY') && null !== $object->getArchiveY()) {
                $data['archive_y'] = $object->getArchiveY();
            }
            if ($object->isInitialized('tags') && null !== $object->getTags()) {
                $values = [];
                foreach ($object->getTags() as $value) {
                    $values[] = $value;
                }
                $data['tags'] = $values;
            }
            if ($object->isInitialized('expiredAt') && null !== $object->getExpiredAt()) {
                $data['expired_at'] = $object->getExpiredAt();
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UploadArchivedFile::class => false];
        }
    }
} else {
    class UploadArchivedFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UploadArchivedFile::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UploadArchivedFile::class === $data::class;
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
            $object = new UploadArchivedFile();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('file', $data) && null !== $data['file']) {
                $object->setFile($data['file']);
                unset($data['file']);
            } elseif (\array_key_exists('file', $data) && null === $data['file']) {
                $object->setFile(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('archive_y', $data) && null !== $data['archive_y']) {
                $object->setArchiveY($data['archive_y']);
                unset($data['archive_y']);
            } elseif (\array_key_exists('archive_y', $data) && null === $data['archive_y']) {
                $object->setArchiveY(null);
            }
            if (\array_key_exists('tags', $data) && null !== $data['tags']) {
                $values = [];
                foreach ($data['tags'] as $value) {
                    $values[] = $value;
                }
                $object->setTags($values);
                unset($data['tags']);
            } elseif (\array_key_exists('tags', $data) && null === $data['tags']) {
                $object->setTags(null);
            }
            if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
                $object->setExpiredAt($data['expired_at']);
                unset($data['expired_at']);
            } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
                $object->setExpiredAt(null);
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
            $data['file'] = $object->getFile();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('archiveY') && null !== $object->getArchiveY()) {
                $data['archive_y'] = $object->getArchiveY();
            }
            if ($object->isInitialized('tags') && null !== $object->getTags()) {
                $values = [];
                foreach ($object->getTags() as $value) {
                    $values[] = $value;
                }
                $data['tags'] = $values;
            }
            if ($object->isInitialized('expiredAt') && null !== $object->getExpiredAt()) {
                $data['expired_at'] = $object->getExpiredAt();
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UploadArchivedFile::class => false];
        }
    }
}
