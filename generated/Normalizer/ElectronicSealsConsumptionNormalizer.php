<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ElectronicSealsConsumption;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ElectronicSealsConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ElectronicSealsConsumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ElectronicSealsConsumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ElectronicSealsConsumption();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('seal_id', $data) && null !== $data['seal_id']) {
            $object->setSealId($data['seal_id']);
            unset($data['seal_id']);
        } elseif (\array_key_exists('seal_id', $data) && null === $data['seal_id']) {
            $object->setSealId(null);
            unset($data['seal_id']);
        }
        if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
            $object->setDocumentId($data['document_id']);
            unset($data['document_id']);
        } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
            $object->setDocumentId(null);
            unset($data['document_id']);
        }
        if (\array_key_exists('seal_level', $data) && null !== $data['seal_level']) {
            $object->setSealLevel($data['seal_level']);
            unset($data['seal_level']);
        } elseif (\array_key_exists('seal_level', $data) && null === $data['seal_level']) {
            $object->setSealLevel(null);
            unset($data['seal_level']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $object->setCreatedAt($data['created_at']);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('source', $data) && null !== $data['source']) {
            $object->setSource($data['source']);
            unset($data['source']);
        } elseif (\array_key_exists('source', $data) && null === $data['source']) {
            $object->setSource(null);
            unset($data['source']);
        }
        if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
            $object->setExternalId($data['external_id']);
            unset($data['external_id']);
        } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
            $object->setExternalId(null);
            unset($data['external_id']);
        }
        if (\array_key_exists('certificate_id', $data) && null !== $data['certificate_id']) {
            $object->setCertificateId($data['certificate_id']);
            unset($data['certificate_id']);
        } elseif (\array_key_exists('certificate_id', $data) && null === $data['certificate_id']) {
            $object->setCertificateId(null);
            unset($data['certificate_id']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('authentication_key', $data) && null !== $data['authentication_key']) {
            $object->setAuthenticationKey($data['authentication_key']);
            unset($data['authentication_key']);
        } elseif (\array_key_exists('authentication_key', $data) && null === $data['authentication_key']) {
            $object->setAuthenticationKey(null);
            unset($data['authentication_key']);
        }
        if (\array_key_exists('workspace_name', $data) && null !== $data['workspace_name']) {
            $object->setWorkspaceName($data['workspace_name']);
            unset($data['workspace_name']);
        } elseif (\array_key_exists('workspace_name', $data) && null === $data['workspace_name']) {
            $object->setWorkspaceName(null);
            unset($data['workspace_name']);
        }
        if (\array_key_exists('workspace_external_name', $data) && null !== $data['workspace_external_name']) {
            $object->setWorkspaceExternalName($data['workspace_external_name']);
            unset($data['workspace_external_name']);
        } elseif (\array_key_exists('workspace_external_name', $data) && null === $data['workspace_external_name']) {
            $object->setWorkspaceExternalName(null);
            unset($data['workspace_external_name']);
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
        $dataArray['seal_id'] = $data->getSealId();
        $dataArray['document_id'] = $data->getDocumentId();
        $dataArray['seal_level'] = $data->getSealLevel();
        $dataArray['created_at'] = $data->getCreatedAt();
        $dataArray['source'] = $data->getSource();
        $dataArray['external_id'] = $data->getExternalId();
        $dataArray['certificate_id'] = $data->getCertificateId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['authentication_key'] = $data->getAuthenticationKey();
        $dataArray['workspace_name'] = $data->getWorkspaceName();
        $dataArray['workspace_external_name'] = $data->getWorkspaceExternalName();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ElectronicSealsConsumption::class => false];
    }
}
