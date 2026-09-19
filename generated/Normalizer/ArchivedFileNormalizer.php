<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ArchivedFile;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

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
        $object = new ArchivedFile();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
            $object->setSha256($data['sha256']);
            unset($data['sha256']);
        } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
            $object->setSha256(null);
            unset($data['sha256']);
        }
        if (\array_key_exists('filename', $data) && null !== $data['filename']) {
            $object->setFilename($data['filename']);
            unset($data['filename']);
        } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
            $object->setFilename(null);
            unset($data['filename']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expired_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['expired_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setExpiredAt($date_1);
            unset($data['expired_at']);
        } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
            $object->setExpiredAt(null);
            unset($data['expired_at']);
        }
        if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
            $object->setContentType($data['content_type']);
            unset($data['content_type']);
        } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
            $object->setContentType(null);
            unset($data['content_type']);
        }
        if (\array_key_exists('size', $data) && null !== $data['size']) {
            $object->setSize($data['size']);
            unset($data['size']);
        } elseif (\array_key_exists('size', $data) && null === $data['size']) {
            $object->setSize(null);
            unset($data['size']);
        }
        if (\array_key_exists('archive_y_identifier', $data) && null !== $data['archive_y_identifier']) {
            $object->setArchiveYIdentifier($data['archive_y_identifier']);
            unset($data['archive_y_identifier']);
        } elseif (\array_key_exists('archive_y_identifier', $data) && null === $data['archive_y_identifier']) {
            $object->setArchiveYIdentifier(null);
            unset($data['archive_y_identifier']);
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
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
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
        $dataArray['id'] = $data->getId();
        $dataArray['sha256'] = $data->getSha256();
        $dataArray['filename'] = $data->getFilename();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['expired_at'] = $data->getExpiredAt()?->format('Y-m-d\TH:i:sP');
        $dataArray['content_type'] = $data->getContentType();
        $dataArray['size'] = $data->getSize();
        $dataArray['archive_y_identifier'] = $data->getArchiveYIdentifier();
        $values = [];
        foreach ($data->getTags() as $value) {
            $values[] = $value;
        }
        $dataArray['tags'] = $values;
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ArchivedFile::class => false];
    }
}
