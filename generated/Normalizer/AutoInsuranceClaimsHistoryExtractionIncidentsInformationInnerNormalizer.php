<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AutoInsuranceClaimsHistoryExtractionIncidentsInformationInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('incident_date', $data) && null !== $data['incident_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['incident_date']);
            if (false === $date) {
                throw new InvalidDateException($data['incident_date'], 'Y-m-d');
            }
            $object->setIncidentDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('incident_date', $data) && null === $data['incident_date']) {
            $object->setIncidentDate(null);
        }
        if (\array_key_exists('incident_description', $data) && null !== $data['incident_description']) {
            $object->setIncidentDescription($data['incident_description']);
        } elseif (\array_key_exists('incident_description', $data) && null === $data['incident_description']) {
            $object->setIncidentDescription(null);
        }
        if (\array_key_exists('incident_type', $data) && null !== $data['incident_type']) {
            $object->setIncidentType($data['incident_type']);
        } elseif (\array_key_exists('incident_type', $data) && null === $data['incident_type']) {
            $object->setIncidentType(null);
        }
        if (\array_key_exists('incident_responsability', $data) && null !== $data['incident_responsability']) {
            $object->setIncidentResponsability($data['incident_responsability']);
        } elseif (\array_key_exists('incident_responsability', $data) && null === $data['incident_responsability']) {
            $object->setIncidentResponsability(null);
        }
        if (\array_key_exists('drivers_full_name', $data) && null !== $data['drivers_full_name']) {
            $object->setDriversFullName($data['drivers_full_name']);
        } elseif (\array_key_exists('drivers_full_name', $data) && null === $data['drivers_full_name']) {
            $object->setDriversFullName(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['incident_date' => $data->getIncidentDate()?->format('Y-m-d'), 'incident_description' => $data->getIncidentDescription(), 'incident_type' => $data->getIncidentType(), 'incident_responsability' => $data->getIncidentResponsability(), 'drivers_full_name' => $data->getDriversFullName()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner::class => false];
    }
}
