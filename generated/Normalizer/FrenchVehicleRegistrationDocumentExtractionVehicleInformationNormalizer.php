<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchVehicleRegistrationDocumentExtractionVehicleInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchVehicleRegistrationDocumentExtractionVehicleInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_brand', $data) && null !== $data['vehicle_brand']) {
            $object->setVehicleBrand($data['vehicle_brand']);
        } elseif (\array_key_exists('vehicle_brand', $data) && null === $data['vehicle_brand']) {
            $object->setVehicleBrand(null);
        }
        if (\array_key_exists('vehicle_version', $data) && null !== $data['vehicle_version']) {
            $object->setVehicleVersion($data['vehicle_version']);
        } elseif (\array_key_exists('vehicle_version', $data) && null === $data['vehicle_version']) {
            $object->setVehicleVersion(null);
        }
        if (\array_key_exists('vehicle_model', $data) && null !== $data['vehicle_model']) {
            $object->setVehicleModel($data['vehicle_model']);
        } elseif (\array_key_exists('vehicle_model', $data) && null === $data['vehicle_model']) {
            $object->setVehicleModel(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['vehicle_brand' => $data->getVehicleBrand(), 'vehicle_version' => $data->getVehicleVersion(), 'vehicle_model' => $data->getVehicleModel()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class => false];
    }
}
