<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchVehicleRegistrationDocumentExtractionOwnerInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchVehicleRegistrationDocumentExtractionOwnerInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchVehicleRegistrationDocumentExtractionOwnerInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchVehicleRegistrationDocumentExtractionOwnerInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('owner_full_name', $data) && null !== $data['owner_full_name']) {
            $object->setOwnerFullName($data['owner_full_name']);
        } elseif (\array_key_exists('owner_full_name', $data) && null === $data['owner_full_name']) {
            $object->setOwnerFullName(null);
        }
        if (\array_key_exists('owner_address', $data) && null !== $data['owner_address']) {
            $object->setOwnerAddress($data['owner_address']);
        } elseif (\array_key_exists('owner_address', $data) && null === $data['owner_address']) {
            $object->setOwnerAddress(null);
        }
        if (\array_key_exists('owner_type', $data) && null !== $data['owner_type']) {
            $object->setOwnerType($data['owner_type']);
        } elseif (\array_key_exists('owner_type', $data) && null === $data['owner_type']) {
            $object->setOwnerType(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['owner_full_name' => $data->getOwnerFullName(), 'owner_address' => $data->getOwnerAddress(), 'owner_type' => $data->getOwnerType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchVehicleRegistrationDocumentExtractionOwnerInformation::class => false];
    }
}
