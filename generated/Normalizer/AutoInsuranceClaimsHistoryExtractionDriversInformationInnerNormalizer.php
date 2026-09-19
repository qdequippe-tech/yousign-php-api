<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionDriversInformationInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AutoInsuranceClaimsHistoryExtractionDriversInformationInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return AutoInsuranceClaimsHistoryExtractionDriversInformationInner::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && AutoInsuranceClaimsHistoryExtractionDriversInformationInner::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new AutoInsuranceClaimsHistoryExtractionDriversInformationInner();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('driver_full_name', $data) && null !== $data['driver_full_name']) {
            $object->setDriverFullName($data['driver_full_name']);
        } elseif (\array_key_exists('driver_full_name', $data) && null === $data['driver_full_name']) {
            $object->setDriverFullName(null);
        }
        if (\array_key_exists('driver_birth_date', $data) && null !== $data['driver_birth_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['driver_birth_date']);
            if (false === $date) {
                throw new InvalidDateException($data['driver_birth_date'], 'Y-m-d');
            }
            $object->setDriverBirthDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('driver_birth_date', $data) && null === $data['driver_birth_date']) {
            $object->setDriverBirthDate(null);
        }
        if (\array_key_exists('coverage_start_date', $data) && null !== $data['coverage_start_date']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['coverage_start_date']);
            if (false === $date_1) {
                throw new InvalidDateException($data['coverage_start_date'], 'Y-m-d');
            }
            $object->setCoverageStartDate($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('coverage_start_date', $data) && null === $data['coverage_start_date']) {
            $object->setCoverageStartDate(null);
        }
        if (\array_key_exists('coverage_end_date', $data) && null !== $data['coverage_end_date']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d', $data['coverage_end_date']);
            if (false === $date_2) {
                throw new InvalidDateException($data['coverage_end_date'], 'Y-m-d');
            }
            $object->setCoverageEndDate($date_2->setTime(0, 0, 0));
        } elseif (\array_key_exists('coverage_end_date', $data) && null === $data['coverage_end_date']) {
            $object->setCoverageEndDate(null);
        }
        if (\array_key_exists('driver_license_number', $data) && null !== $data['driver_license_number']) {
            $object->setDriverLicenseNumber($data['driver_license_number']);
        } elseif (\array_key_exists('driver_license_number', $data) && null === $data['driver_license_number']) {
            $object->setDriverLicenseNumber(null);
        }
        if (\array_key_exists('driver_license_category', $data) && null !== $data['driver_license_category']) {
            $object->setDriverLicenseCategory($data['driver_license_category']);
        } elseif (\array_key_exists('driver_license_category', $data) && null === $data['driver_license_category']) {
            $object->setDriverLicenseCategory(null);
        }
        if (\array_key_exists('driver_license_issuance_date', $data) && null !== $data['driver_license_issuance_date']) {
            $date_3 = \DateTime::createFromFormat('Y-m-d', $data['driver_license_issuance_date']);
            if (false === $date_3) {
                throw new InvalidDateException($data['driver_license_issuance_date'], 'Y-m-d');
            }
            $object->setDriverLicenseIssuanceDate($date_3->setTime(0, 0, 0));
        } elseif (\array_key_exists('driver_license_issuance_date', $data) && null === $data['driver_license_issuance_date']) {
            $object->setDriverLicenseIssuanceDate(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['driver_full_name' => $data->getDriverFullName(), 'driver_birth_date' => $data->getDriverBirthDate()?->format('Y-m-d'), 'coverage_start_date' => $data->getCoverageStartDate()?->format('Y-m-d'), 'coverage_end_date' => $data->getCoverageEndDate()?->format('Y-m-d'), 'driver_license_number' => $data->getDriverLicenseNumber(), 'driver_license_category' => $data->getDriverLicenseCategory(), 'driver_license_issuance_date' => $data->getDriverLicenseIssuanceDate()?->format('Y-m-d')];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [AutoInsuranceClaimsHistoryExtractionDriversInformationInner::class => false];
    }
}
