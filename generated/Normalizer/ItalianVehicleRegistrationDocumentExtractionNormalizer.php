<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionCoOwnerInformationInner;
use Qdequippe\Yousign\Api\Model\FrenchVehicleRegistrationDocumentExtractionVehicleInformation;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation;
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

class ItalianVehicleRegistrationDocumentExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItalianVehicleRegistrationDocumentExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ItalianVehicleRegistrationDocumentExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ItalianVehicleRegistrationDocumentExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_total_mass', $data) && \is_int($data['vehicle_total_mass'])) {
            $data['vehicle_total_mass'] = (float) $data['vehicle_total_mass'];
        }
        if (\array_key_exists('mass_of_the_vehicle_in_service', $data) && \is_int($data['mass_of_the_vehicle_in_service'])) {
            $data['mass_of_the_vehicle_in_service'] = (float) $data['mass_of_the_vehicle_in_service'];
        }
        if (\array_key_exists('vehicle_maximum_technical_mass', $data) && \is_int($data['vehicle_maximum_technical_mass'])) {
            $data['vehicle_maximum_technical_mass'] = (float) $data['vehicle_maximum_technical_mass'];
        }
        if (\array_key_exists('vehicle_maximum_permissible_mass', $data) && \is_int($data['vehicle_maximum_permissible_mass'])) {
            $data['vehicle_maximum_permissible_mass'] = (float) $data['vehicle_maximum_permissible_mass'];
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
            $object->setOwnerInformation($this->denormalizer->denormalize($data['owner_information'], ItalianVehicleRegistrationDocumentExtractionOwnerInformation::class, 'json', $context));
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
        if (\array_key_exists('deed_informations', $data) && null !== $data['deed_informations']) {
            $values_1 = [];
            foreach ($data['deed_informations'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner::class, 'json', $context);
            }
            $object->setDeedInformations($values_1);
        } elseif (\array_key_exists('deed_informations', $data) && null === $data['deed_informations']) {
            $object->setDeedInformations(null);
        }
        if (\array_key_exists('vehicle_information', $data) && null !== $data['vehicle_information']) {
            $object->setVehicleInformation($this->denormalizer->denormalize($data['vehicle_information'], FrenchVehicleRegistrationDocumentExtractionVehicleInformation::class, 'json', $context));
        } elseif (\array_key_exists('vehicle_information', $data) && null === $data['vehicle_information']) {
            $object->setVehicleInformation(null);
        }
        if (\array_key_exists('vehicle_body', $data) && null !== $data['vehicle_body']) {
            $object->setVehicleBody($data['vehicle_body']);
        } elseif (\array_key_exists('vehicle_body', $data) && null === $data['vehicle_body']) {
            $object->setVehicleBody(null);
        }
        if (\array_key_exists('vehicle_identification_number', $data) && null !== $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber($data['vehicle_identification_number']);
        } elseif (\array_key_exists('vehicle_identification_number', $data) && null === $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber(null);
        }
        if (\array_key_exists('vehicle_total_mass', $data) && null !== $data['vehicle_total_mass']) {
            $object->setVehicleTotalMass($data['vehicle_total_mass']);
        } elseif (\array_key_exists('vehicle_total_mass', $data) && null === $data['vehicle_total_mass']) {
            $object->setVehicleTotalMass(null);
        }
        if (\array_key_exists('vehicle_motor_information', $data) && null !== $data['vehicle_motor_information']) {
            $object->setVehicleMotorInformation($this->denormalizer->denormalize($data['vehicle_motor_information'], ItalianVehicleRegistrationDocumentExtractionVehicleMotorInformation::class, 'json', $context));
        } elseif (\array_key_exists('vehicle_motor_information', $data) && null === $data['vehicle_motor_information']) {
            $object->setVehicleMotorInformation(null);
        }
        if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
            $object->setDocumentType($data['document_type']);
        } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
            $object->setDocumentType(null);
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
        if (\array_key_exists('vehicle_approval_number', $data) && null !== $data['vehicle_approval_number']) {
            $object->setVehicleApprovalNumber($data['vehicle_approval_number']);
        } elseif (\array_key_exists('vehicle_approval_number', $data) && null === $data['vehicle_approval_number']) {
            $object->setVehicleApprovalNumber(null);
        }
        if (\array_key_exists('vehicle_destination_and_use', $data) && null !== $data['vehicle_destination_and_use']) {
            $object->setVehicleDestinationAndUse($data['vehicle_destination_and_use']);
        } elseif (\array_key_exists('vehicle_destination_and_use', $data) && null === $data['vehicle_destination_and_use']) {
            $object->setVehicleDestinationAndUse(null);
        }
        if (\array_key_exists('international_vehicle_category', $data) && null !== $data['international_vehicle_category']) {
            $object->setInternationalVehicleCategory($data['international_vehicle_category']);
        } elseif (\array_key_exists('international_vehicle_category', $data) && null === $data['international_vehicle_category']) {
            $object->setInternationalVehicleCategory(null);
        }
        if (\array_key_exists('mass_of_the_vehicle_in_service', $data) && null !== $data['mass_of_the_vehicle_in_service']) {
            $object->setMassOfTheVehicleInService($data['mass_of_the_vehicle_in_service']);
        } elseif (\array_key_exists('mass_of_the_vehicle_in_service', $data) && null === $data['mass_of_the_vehicle_in_service']) {
            $object->setMassOfTheVehicleInService(null);
        }
        if (\array_key_exists('vehicle_maximum_technical_mass', $data) && null !== $data['vehicle_maximum_technical_mass']) {
            $object->setVehicleMaximumTechnicalMass($data['vehicle_maximum_technical_mass']);
        } elseif (\array_key_exists('vehicle_maximum_technical_mass', $data) && null === $data['vehicle_maximum_technical_mass']) {
            $object->setVehicleMaximumTechnicalMass(null);
        }
        if (\array_key_exists('vehicle_maximum_permissible_mass', $data) && null !== $data['vehicle_maximum_permissible_mass']) {
            $object->setVehicleMaximumPermissibleMass($data['vehicle_maximum_permissible_mass']);
        } elseif (\array_key_exists('vehicle_maximum_permissible_mass', $data) && null === $data['vehicle_maximum_permissible_mass']) {
            $object->setVehicleMaximumPermissibleMass(null);
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
        $values_1 = [];
        foreach ($data->getDeedInformations() as $value_1) {
            $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
        }
        $dataArray['deed_informations'] = $values_1;
        $dataArray['vehicle_information'] = null === $data->getVehicleInformation() ? null : new JsonObject($this->normalizer->normalize($data->getVehicleInformation(), 'json', $context));
        $dataArray['vehicle_body'] = $data->getVehicleBody();
        $dataArray['vehicle_identification_number'] = $data->getVehicleIdentificationNumber();
        $dataArray['vehicle_total_mass'] = $data->getVehicleTotalMass();
        $dataArray['vehicle_motor_information'] = null === $data->getVehicleMotorInformation() ? null : new JsonObject($this->normalizer->normalize($data->getVehicleMotorInformation(), 'json', $context));
        $dataArray['document_type'] = $data->getDocumentType();
        $dataArray['issuance_date'] = $data->getIssuanceDate()?->format('Y-m-d');
        $dataArray['vehicle_approval_number'] = $data->getVehicleApprovalNumber();
        $dataArray['vehicle_destination_and_use'] = $data->getVehicleDestinationAndUse();
        $dataArray['international_vehicle_category'] = $data->getInternationalVehicleCategory();
        $dataArray['mass_of_the_vehicle_in_service'] = $data->getMassOfTheVehicleInService();
        $dataArray['vehicle_maximum_technical_mass'] = $data->getVehicleMaximumTechnicalMass();
        $dataArray['vehicle_maximum_permissible_mass'] = $data->getVehicleMaximumPermissibleMass();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ItalianVehicleRegistrationDocumentExtraction::class => false];
    }
}
