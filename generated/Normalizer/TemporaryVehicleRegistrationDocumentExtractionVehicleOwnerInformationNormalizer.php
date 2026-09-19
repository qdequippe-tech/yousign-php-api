<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_owner_full_name', $data) && null !== $data['vehicle_owner_full_name']) {
            $object->setVehicleOwnerFullName($data['vehicle_owner_full_name']);
            unset($data['vehicle_owner_full_name']);
        } elseif (\array_key_exists('vehicle_owner_full_name', $data) && null === $data['vehicle_owner_full_name']) {
            $object->setVehicleOwnerFullName(null);
            unset($data['vehicle_owner_full_name']);
        }
        if (\array_key_exists('vehicle_owner_birth_date', $data) && null !== $data['vehicle_owner_birth_date']) {
            $object->setVehicleOwnerBirthDate($data['vehicle_owner_birth_date']);
            unset($data['vehicle_owner_birth_date']);
        } elseif (\array_key_exists('vehicle_owner_birth_date', $data) && null === $data['vehicle_owner_birth_date']) {
            $object->setVehicleOwnerBirthDate(null);
            unset($data['vehicle_owner_birth_date']);
        }
        if (\array_key_exists('vehicle_owner_address', $data) && null !== $data['vehicle_owner_address']) {
            $object->setVehicleOwnerAddress($data['vehicle_owner_address']);
            unset($data['vehicle_owner_address']);
        } elseif (\array_key_exists('vehicle_owner_address', $data) && null === $data['vehicle_owner_address']) {
            $object->setVehicleOwnerAddress(null);
            unset($data['vehicle_owner_address']);
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
        $dataArray['vehicle_owner_full_name'] = $data->getVehicleOwnerFullName();
        $dataArray['vehicle_owner_birth_date'] = $data->getVehicleOwnerBirthDate();
        $dataArray['vehicle_owner_address'] = $data->getVehicleOwnerAddress();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation::class => false];
    }
}
