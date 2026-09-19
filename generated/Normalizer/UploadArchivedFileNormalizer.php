<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UploadArchivedFile;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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
        $object = new UploadArchivedFile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
            unset($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
            unset($data['file']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('archive_y', $data) && null !== $data['archive_y']) {
            $object->setArchiveY($data['archive_y']);
            unset($data['archive_y']);
        } elseif (\array_key_exists('archive_y', $data) && null === $data['archive_y']) {
            $object->setArchiveY(null);
            unset($data['archive_y']);
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
            unset($data['tags']);
        }
        if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
            $object->setExpiredAt($data['expired_at']);
            unset($data['expired_at']);
        } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
            $object->setExpiredAt(null);
            unset($data['expired_at']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['file'] = $data->getFile();
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        if ($data->isInitialized('archiveY') && null !== $data->getArchiveY()) {
            $dataArray['archive_y'] = $data->getArchiveY();
        }
        if ($data->isInitialized('tags') && null !== $data->getTags()) {
            $values = [];
            foreach ($data->getTags() as $value) {
                $values[] = $value;
            }
            $dataArray['tags'] = $values;
        }
        if ($data->isInitialized('expiredAt') && null !== $data->getExpiredAt()) {
            $dataArray['expired_at'] = $data->getExpiredAt();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UploadArchivedFile::class => false];
    }
}
