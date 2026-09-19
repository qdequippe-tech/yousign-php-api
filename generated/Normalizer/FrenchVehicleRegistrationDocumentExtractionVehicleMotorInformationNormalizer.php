<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_fiscal_power', $data) && \is_int($data['vehicle_fiscal_power'])) {
            $data['vehicle_fiscal_power'] = (float) $data['vehicle_fiscal_power'];
        }
        if (\array_key_exists('vehicle_max_power', $data) && \is_int($data['vehicle_max_power'])) {
            $data['vehicle_max_power'] = (float) $data['vehicle_max_power'];
        }
        if (\array_key_exists('vehicle_power', $data) && \is_int($data['vehicle_power'])) {
            $data['vehicle_power'] = (float) $data['vehicle_power'];
        }
        if (\array_key_exists('vehicle_fuel_type', $data) && null !== $data['vehicle_fuel_type']) {
            $object->setVehicleFuelType($data['vehicle_fuel_type']);
        } elseif (\array_key_exists('vehicle_fuel_type', $data) && null === $data['vehicle_fuel_type']) {
            $object->setVehicleFuelType(null);
        }
        if (\array_key_exists('vehicle_fiscal_power', $data) && null !== $data['vehicle_fiscal_power']) {
            $object->setVehicleFiscalPower($data['vehicle_fiscal_power']);
        } elseif (\array_key_exists('vehicle_fiscal_power', $data) && null === $data['vehicle_fiscal_power']) {
            $object->setVehicleFiscalPower(null);
        }
        if (\array_key_exists('vehicle_max_power', $data) && null !== $data['vehicle_max_power']) {
            $object->setVehicleMaxPower($data['vehicle_max_power']);
        } elseif (\array_key_exists('vehicle_max_power', $data) && null === $data['vehicle_max_power']) {
            $object->setVehicleMaxPower(null);
        }
        if (\array_key_exists('vehicle_power', $data) && null !== $data['vehicle_power']) {
            $object->setVehiclePower($data['vehicle_power']);
        } elseif (\array_key_exists('vehicle_power', $data) && null === $data['vehicle_power']) {
            $object->setVehiclePower(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['vehicle_fuel_type' => $data->getVehicleFuelType(), 'vehicle_fiscal_power' => $data->getVehicleFiscalPower(), 'vehicle_max_power' => $data->getVehicleMaxPower(), 'vehicle_power' => $data->getVehiclePower()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation::class => false];
    }
}
