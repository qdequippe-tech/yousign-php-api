<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleInformation;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation;
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

class FrenchVehicleRegistrationDocumentExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchVehicleRegistrationDocumentExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchVehicleRegistrationDocumentExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchVehicleRegistrationDocumentExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_max_weight', $data) && \is_int($data['vehicle_max_weight'])) {
            $data['vehicle_max_weight'] = (float) $data['vehicle_max_weight'];
        }
        if (\array_key_exists('licence_plate_number', $data) && null !== $data['licence_plate_number']) {
            $object->setLicencePlateNumber($data['licence_plate_number']);
        } elseif (\array_key_exists('licence_plate_number', $data) && null === $data['licence_plate_number']) {
            $object->setLicencePlateNumber(null);
        }
        if (\array_key_exists('first_registration_date', $data) && null !== $data['first_registration_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['first_registration_date']);
            if (false === $date) {
                throw new InvalidDateException($data['first_registration_date'], 'Y-m-d');
            }
            $object->setFirstRegistrationDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('first_registration_date', $data) && null === $data['first_registration_date']) {
            $object->setFirstRegistrationDate(null);
        }
        if (\array_key_exists('owner_information', $data) && null !== $data['owner_information']) {
            $object->setOwnerInformation($this->denormalizer->denormalize($data['owner_information'], FrenchVehicleRegistrationDocumentExtractionOwnerInformation::class, 'json', $context));
        } elseif (\array_key_exists('owner_information', $data) && null === $data['owner_information']) {
            $object->setOwnerInformation(null);
        }
        if (\array_key_exists('co_owner_information', $data) && null !== $data['co_owner_information']) {
            $values = [];
            foreach ($data['co_owner_information'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner::class, 'json', $context);
            }
            $object->setCoOwnerInformation($values);
        } elseif (\array_key_exists('co_owner_information', $data) && null === $data['co_owner_information']) {
            $object->setCoOwnerInformation(null);
        }
        if (\array_key_exists('vehicle_information', $data) && null !== $data['vehicle_information']) {
            $object->setVehicleInformation($this->denormalizer->denormalize($data['vehicle_information'], FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class, 'json', $context));
        } elseif (\array_key_exists('vehicle_information', $data) && null === $data['vehicle_information']) {
            $object->setVehicleInformation(null);
        }
        if (\array_key_exists('vehicle_identification_number', $data) && null !== $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber($data['vehicle_identification_number']);
        } elseif (\array_key_exists('vehicle_identification_number', $data) && null === $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber(null);
        }
        if (\array_key_exists('vehicle_max_weight', $data) && null !== $data['vehicle_max_weight']) {
            $object->setVehicleMaxWeight($data['vehicle_max_weight']);
        } elseif (\array_key_exists('vehicle_max_weight', $data) && null === $data['vehicle_max_weight']) {
            $object->setVehicleMaxWeight(null);
        }
        if (\array_key_exists('vehicle_motor_information', $data) && null !== $data['vehicle_motor_information']) {
            $object->setVehicleMotorInformation($this->denormalizer->denormalize($data['vehicle_motor_information'], FrenchVehicleRegistrationDocumentExtractionVehicleMotorInformation::class, 'json', $context));
        } elseif (\array_key_exists('vehicle_motor_information', $data) && null === $data['vehicle_motor_information']) {
            $object->setVehicleMotorInformation(null);
        }
        if (\array_key_exists('document_number', $data) && null !== $data['document_number']) {
            $object->setDocumentNumber($data['document_number']);
        } elseif (\array_key_exists('document_number', $data) && null === $data['document_number']) {
            $object->setDocumentNumber(null);
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
        if (\array_key_exists('vehicle_next_inspection_date', $data) && null !== $data['vehicle_next_inspection_date']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d', $data['vehicle_next_inspection_date']);
            if (false === $date_2) {
                throw new InvalidDateException($data['vehicle_next_inspection_date'], 'Y-m-d');
            }
            $object->setVehicleNextInspectionDate($date_2->setTime(0, 0, 0));
        } elseif (\array_key_exists('vehicle_next_inspection_date', $data) && null === $data['vehicle_next_inspection_date']) {
            $object->setVehicleNextInspectionDate(null);
        }
        if (\array_key_exists('mrz_line_1', $data) && null !== $data['mrz_line_1']) {
            $object->setMrzLine1($data['mrz_line_1']);
        } elseif (\array_key_exists('mrz_line_1', $data) && null === $data['mrz_line_1']) {
            $object->setMrzLine1(null);
        }
        if (\array_key_exists('mrz_line_2', $data) && null !== $data['mrz_line_2']) {
            $object->setMrzLine2($data['mrz_line_2']);
        } elseif (\array_key_exists('mrz_line_2', $data) && null === $data['mrz_line_2']) {
            $object->setMrzLine2(null);
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
        $dataArray['licence_plate_number'] = $data->getLicencePlateNumber();
        $dataArray['first_registration_date'] = $data->getFirstRegistrationDate()?->format('Y-m-d');
        $dataArray['owner_information'] = null === $data->getOwnerInformation() ? null : new JsonObject($this->normalizer->normalize($data->getOwnerInformation(), 'json', $context));
        $values = [];
        foreach ($data->getCoOwnerInformation() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['co_owner_information'] = $values;
        $dataArray['vehicle_information'] = null === $data->getVehicleInformation() ? null : new JsonObject($this->normalizer->normalize($data->getVehicleInformation(), 'json', $context));
        $dataArray['vehicle_identification_number'] = $data->getVehicleIdentificationNumber();
        $dataArray['vehicle_max_weight'] = $data->getVehicleMaxWeight();
        $dataArray['vehicle_motor_information'] = null === $data->getVehicleMotorInformation() ? null : new JsonObject($this->normalizer->normalize($data->getVehicleMotorInformation(), 'json', $context));
        $dataArray['document_number'] = $data->getDocumentNumber();
        $dataArray['issuance_date'] = $data->getIssuanceDate()?->format('Y-m-d');
        $dataArray['vehicle_next_inspection_date'] = $data->getVehicleNextInspectionDate()?->format('Y-m-d');
        $dataArray['mrz_line_1'] = $data->getMrzLine1();
        $dataArray['mrz_line_2'] = $data->getMrzLine2();
        $dataArray['document_type'] = $data->getDocumentType();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchVehicleRegistrationDocumentExtraction::class => false];
    }
}
