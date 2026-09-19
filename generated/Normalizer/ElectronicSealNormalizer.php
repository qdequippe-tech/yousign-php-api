<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ElectronicSeal;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ElectronicSealNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ElectronicSeal::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ElectronicSeal::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ElectronicSeal();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('timestamp', $data) && \is_int($data['timestamp'])) {
            $data['timestamp'] = (bool) $data['timestamp'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
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
        if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
            $object->setDocumentId($data['document_id']);
            unset($data['document_id']);
        } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
            $object->setDocumentId(null);
            unset($data['document_id']);
        }
        if (\array_key_exists('timestamp', $data) && null !== $data['timestamp']) {
            $object->setTimestamp($data['timestamp']);
            unset($data['timestamp']);
        } elseif (\array_key_exists('timestamp', $data) && null === $data['timestamp']) {
            $object->setTimestamp(null);
            unset($data['timestamp']);
        }
        if (\array_key_exists('image_id', $data) && null !== $data['image_id']) {
            $object->setImageId($data['image_id']);
            unset($data['image_id']);
        } elseif (\array_key_exists('image_id', $data) && null === $data['image_id']) {
            $object->setImageId(null);
            unset($data['image_id']);
        }
        if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
            $object->setExternalId($data['external_id']);
            unset($data['external_id']);
        } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
            $object->setExternalId(null);
            unset($data['external_id']);
        }
        if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
            $object->setSignatureLevel($data['signature_level']);
            unset($data['signature_level']);
        } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
            $object->setSignatureLevel(null);
            unset($data['signature_level']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['document_id'] = $data->getDocumentId();
        $dataArray['timestamp'] = $data->getTimestamp();
        $dataArray['image_id'] = $data->getImageId();
        $dataArray['external_id'] = $data->getExternalId();
        $dataArray['signature_level'] = $data->getSignatureLevel();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ElectronicSeal::class => false];
    }
}
