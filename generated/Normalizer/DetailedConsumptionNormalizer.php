<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\DetailedConsumption;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DetailedConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return DetailedConsumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && DetailedConsumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new DetailedConsumption();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('source', $data) && null !== $data['source']) {
            $object->setSource($data['source']);
            unset($data['source']);
        } elseif (\array_key_exists('source', $data) && null === $data['source']) {
            $object->setSource(null);
            unset($data['source']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('level', $data) && null !== $data['level']) {
            $object->setLevel($data['level']);
            unset($data['level']);
        } elseif (\array_key_exists('level', $data) && null === $data['level']) {
            $object->setLevel(null);
            unset($data['level']);
        }
        if (\array_key_exists('verification_type', $data) && null !== $data['verification_type']) {
            $object->setVerificationType($data['verification_type']);
            unset($data['verification_type']);
        } elseif (\array_key_exists('verification_type', $data) && null === $data['verification_type']) {
            $object->setVerificationType(null);
            unset($data['verification_type']);
        }
        if (\array_key_exists('identification_mode', $data) && null !== $data['identification_mode']) {
            $object->setIdentificationMode($data['identification_mode']);
            unset($data['identification_mode']);
        } elseif (\array_key_exists('identification_mode', $data) && null === $data['identification_mode']) {
            $object->setIdentificationMode(null);
            unset($data['identification_mode']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('value', $data) && null !== $data['value']) {
            $object->setValue($data['value']);
            unset($data['value']);
        } elseif (\array_key_exists('value', $data) && null === $data['value']) {
            $object->setValue(null);
            unset($data['value']);
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
        $dataArray['source'] = $data->getSource();
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('level') && null !== $data->getLevel()) {
            $dataArray['level'] = $data->getLevel();
        }
        if ($data->isInitialized('verificationType') && null !== $data->getVerificationType()) {
            $dataArray['verification_type'] = $data->getVerificationType();
        }
        if ($data->isInitialized('identificationMode') && null !== $data->getIdentificationMode()) {
            $dataArray['identification_mode'] = $data->getIdentificationMode();
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        $dataArray['value'] = $data->getValue();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [DetailedConsumption::class => false];
    }
}
