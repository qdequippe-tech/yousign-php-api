<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtraction;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionDriversInformationInner;
use Qdequippe\Yousign\Api\Model\AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AutoInsuranceClaimsHistoryExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return AutoInsuranceClaimsHistoryExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && AutoInsuranceClaimsHistoryExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new AutoInsuranceClaimsHistoryExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('active_contract', $data) && \is_int($data['active_contract'])) {
            $data['active_contract'] = (bool) $data['active_contract'];
        }
        if (\array_key_exists('policy_holder_full_name', $data) && null !== $data['policy_holder_full_name']) {
            $object->setPolicyHolderFullName($data['policy_holder_full_name']);
        } elseif (\array_key_exists('policy_holder_full_name', $data) && null === $data['policy_holder_full_name']) {
            $object->setPolicyHolderFullName(null);
        }
        if (\array_key_exists('policy_holder_address', $data) && null !== $data['policy_holder_address']) {
            $object->setPolicyHolderAddress($data['policy_holder_address']);
        } elseif (\array_key_exists('policy_holder_address', $data) && null === $data['policy_holder_address']) {
            $object->setPolicyHolderAddress(null);
        }
        if (\array_key_exists('policy_holder_birth_date', $data) && null !== $data['policy_holder_birth_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['policy_holder_birth_date']);
            if (false === $date) {
                throw new InvalidDateException($data['policy_holder_birth_date'], 'Y-m-d');
            }
            $object->setPolicyHolderBirthDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('policy_holder_birth_date', $data) && null === $data['policy_holder_birth_date']) {
            $object->setPolicyHolderBirthDate(null);
        }
        if (\array_key_exists('insurance_score', $data) && null !== $data['insurance_score']) {
            $object->setInsuranceScore($data['insurance_score']);
        } elseif (\array_key_exists('insurance_score', $data) && null === $data['insurance_score']) {
            $object->setInsuranceScore(null);
        }
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['issuance_date']);
            if (false === $date_1) {
                throw new InvalidDateException($data['issuance_date'], 'Y-m-d');
            }
            $object->setIssuanceDate($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
        }
        if (\array_key_exists('effective_start_date', $data) && null !== $data['effective_start_date']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d', $data['effective_start_date']);
            if (false === $date_2) {
                throw new InvalidDateException($data['effective_start_date'], 'Y-m-d');
            }
            $object->setEffectiveStartDate($date_2->setTime(0, 0, 0));
        } elseif (\array_key_exists('effective_start_date', $data) && null === $data['effective_start_date']) {
            $object->setEffectiveStartDate(null);
        }
        if (\array_key_exists('active_contract', $data) && null !== $data['active_contract']) {
            $object->setActiveContract($data['active_contract']);
        } elseif (\array_key_exists('active_contract', $data) && null === $data['active_contract']) {
            $object->setActiveContract(null);
        }
        if (\array_key_exists('contract_cancellation_date', $data) && null !== $data['contract_cancellation_date']) {
            $date_3 = \DateTime::createFromFormat('Y-m-d', $data['contract_cancellation_date']);
            if (false === $date_3) {
                throw new InvalidDateException($data['contract_cancellation_date'], 'Y-m-d');
            }
            $object->setContractCancellationDate($date_3->setTime(0, 0, 0));
        } elseif (\array_key_exists('contract_cancellation_date', $data) && null === $data['contract_cancellation_date']) {
            $object->setContractCancellationDate(null);
        }
        if (\array_key_exists('vehicle_model', $data) && null !== $data['vehicle_model']) {
            $object->setVehicleModel($data['vehicle_model']);
        } elseif (\array_key_exists('vehicle_model', $data) && null === $data['vehicle_model']) {
            $object->setVehicleModel(null);
        }
        if (\array_key_exists('vehicle_license_plate', $data) && null !== $data['vehicle_license_plate']) {
            $object->setVehicleLicensePlate($data['vehicle_license_plate']);
        } elseif (\array_key_exists('vehicle_license_plate', $data) && null === $data['vehicle_license_plate']) {
            $object->setVehicleLicensePlate(null);
        }
        if (\array_key_exists('drivers_information', $data) && null !== $data['drivers_information']) {
            $values = [];
            foreach ($data['drivers_information'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, AutoInsuranceClaimsHistoryExtractionDriversInformationInner::class, 'json', $context);
            }
            $object->setDriversInformation($values);
        } elseif (\array_key_exists('drivers_information', $data) && null === $data['drivers_information']) {
            $object->setDriversInformation(null);
        }
        if (\array_key_exists('incidents_information', $data) && null !== $data['incidents_information']) {
            $values_1 = [];
            foreach ($data['incidents_information'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, AutoInsuranceClaimsHistoryExtractionIncidentsInformationInner::class, 'json', $context);
            }
            $object->setIncidentsInformation($values_1);
        } elseif (\array_key_exists('incidents_information', $data) && null === $data['incidents_information']) {
            $object->setIncidentsInformation(null);
        }
        if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
            $object->setDocumentType($data['document_type']);
        } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
            $object->setDocumentType(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['policy_holder_full_name'] = $data->getPolicyHolderFullName();
        $dataArray['policy_holder_address'] = $data->getPolicyHolderAddress();
        $dataArray['policy_holder_birth_date'] = $data->getPolicyHolderBirthDate()?->format('Y-m-d');
        $dataArray['insurance_score'] = $data->getInsuranceScore();
        $dataArray['issuance_date'] = $data->getIssuanceDate()?->format('Y-m-d');
        $dataArray['effective_start_date'] = $data->getEffectiveStartDate()?->format('Y-m-d');
        $dataArray['active_contract'] = $data->getActiveContract();
        $dataArray['contract_cancellation_date'] = $data->getContractCancellationDate()?->format('Y-m-d');
        $dataArray['vehicle_model'] = $data->getVehicleModel();
        $dataArray['vehicle_license_plate'] = $data->getVehicleLicensePlate();
        $values = [];
        foreach ($data->getDriversInformation() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['drivers_information'] = $values;
        $values_1 = [];
        foreach ($data->getIncidentsInformation() as $value_1) {
            $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
        }
        $dataArray['incidents_information'] = $values_1;
        $dataArray['document_type'] = $data->getDocumentType();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [AutoInsuranceClaimsHistoryExtraction::class => false];
    }
}
