<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ArchivedFile;
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
    class ArchivedFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return ArchivedFile::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ArchivedFile::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ArchivedFile();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
                $object->setSha256($data['sha256']);
                unset($data['sha256']);
            } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
                $object->setSha256(null);
            }
            if (\array_key_exists('filename', $data) && null !== $data['filename']) {
                $object->setFilename($data['filename']);
                unset($data['filename']);
            } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
                $object->setFilename(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
                $object->setExpiredAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expired_at']));
                unset($data['expired_at']);
            } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
                $object->setExpiredAt(null);
            }
            if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
                $object->setContentType($data['content_type']);
                unset($data['content_type']);
            } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
                $object->setContentType(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('archive_y_identifier', $data) && null !== $data['archive_y_identifier']) {
                $object->setArchiveYIdentifier($data['archive_y_identifier']);
                unset($data['archive_y_identifier']);
            } elseif (\array_key_exists('archive_y_identifier', $data) && null === $data['archive_y_identifier']) {
                $object->setArchiveYIdentifier(null);
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
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
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
            $data['sha256'] = $object->getSha256();
            $data['filename'] = $object->getFilename();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['expired_at'] = $object->getExpiredAt()->format('Y-m-d\TH:i:sP');
            $data['content_type'] = $object->getContentType();
            $data['size'] = $object->getSize();
            $data['archive_y_identifier'] = $object->getArchiveYIdentifier();
            $values = [];
            foreach ($object->getTags() as $value) {
                $values[] = $value;
            }
            $data['tags'] = $values;
            $data['workspace_id'] = $object->getWorkspaceId();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ArchivedFile::class => false];
        }
    }
} else {
    class ArchivedFileNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return ArchivedFile::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ArchivedFile::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ArchivedFile();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
                $object->setSha256($data['sha256']);
                unset($data['sha256']);
            } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
                $object->setSha256(null);
            }
            if (\array_key_exists('filename', $data) && null !== $data['filename']) {
                $object->setFilename($data['filename']);
                unset($data['filename']);
            } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
                $object->setFilename(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
                $object->setExpiredAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expired_at']));
                unset($data['expired_at']);
            } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
                $object->setExpiredAt(null);
            }
            if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
                $object->setContentType($data['content_type']);
                unset($data['content_type']);
            } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
                $object->setContentType(null);
            }
            if (\array_key_exists('size', $data) && null !== $data['size']) {
                $object->setSize($data['size']);
                unset($data['size']);
            } elseif (\array_key_exists('size', $data) && null === $data['size']) {
                $object->setSize(null);
            }
            if (\array_key_exists('archive_y_identifier', $data) && null !== $data['archive_y_identifier']) {
                $object->setArchiveYIdentifier($data['archive_y_identifier']);
                unset($data['archive_y_identifier']);
            } elseif (\array_key_exists('archive_y_identifier', $data) && null === $data['archive_y_identifier']) {
                $object->setArchiveYIdentifier(null);
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
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
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
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['sha256'] = $object->getSha256();
            $data['filename'] = $object->getFilename();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['expired_at'] = $object->getExpiredAt()->format('Y-m-d\TH:i:sP');
            $data['content_type'] = $object->getContentType();
            $data['size'] = $object->getSize();
            $data['archive_y_identifier'] = $object->getArchiveYIdentifier();
            $values = [];
            foreach ($object->getTags() as $value) {
                $values[] = $value;
            }
            $data['tags'] = $values;
            $data['workspace_id'] = $object->getWorkspaceId();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ArchivedFile::class => false];
        }
    }
}
