<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation;
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

class TemporaryVehicleRegistrationDocumentExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return TemporaryVehicleRegistrationDocumentExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && TemporaryVehicleRegistrationDocumentExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new TemporaryVehicleRegistrationDocumentExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('vehicle_category', $data) && null !== $data['vehicle_category']) {
            $object->setVehicleCategory($data['vehicle_category']);
        } elseif (\array_key_exists('vehicle_category', $data) && null === $data['vehicle_category']) {
            $object->setVehicleCategory(null);
        }
        if (\array_key_exists('vehicle_license_number', $data) && null !== $data['vehicle_license_number']) {
            $object->setVehicleLicenseNumber($data['vehicle_license_number']);
        } elseif (\array_key_exists('vehicle_license_number', $data) && null === $data['vehicle_license_number']) {
            $object->setVehicleLicenseNumber(null);
        }
        if (\array_key_exists('vehicle_identification_number', $data) && null !== $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber($data['vehicle_identification_number']);
        } elseif (\array_key_exists('vehicle_identification_number', $data) && null === $data['vehicle_identification_number']) {
            $object->setVehicleIdentificationNumber(null);
        }
        if (\array_key_exists('vehicle_purpose', $data) && null !== $data['vehicle_purpose']) {
            $object->setVehiclePurpose($data['vehicle_purpose']);
        } elseif (\array_key_exists('vehicle_purpose', $data) && null === $data['vehicle_purpose']) {
            $object->setVehiclePurpose(null);
        }
        if (\array_key_exists('vehicle_first_registration_year', $data) && null !== $data['vehicle_first_registration_year']) {
            $object->setVehicleFirstRegistrationYear($data['vehicle_first_registration_year']);
        } elseif (\array_key_exists('vehicle_first_registration_year', $data) && null === $data['vehicle_first_registration_year']) {
            $object->setVehicleFirstRegistrationYear(null);
        }
        if (\array_key_exists('vehicle_owner_information', $data) && null !== $data['vehicle_owner_information']) {
            $object->setVehicleOwnerInformation($this->denormalizer->denormalize($data['vehicle_owner_information'], TemporaryVehicleRegistrationDocumentExtractionVehicleOwnerInformation::class, 'json', $context));
        } elseif (\array_key_exists('vehicle_owner_information', $data) && null === $data['vehicle_owner_information']) {
            $object->setVehicleOwnerInformation(null);
        }
        if (\array_key_exists('other_details', $data) && null !== $data['other_details']) {
            $object->setOtherDetails($data['other_details']);
        } elseif (\array_key_exists('other_details', $data) && null === $data['other_details']) {
            $object->setOtherDetails(null);
        }
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['issuance_date']);
            if (false === $date) {
                throw new InvalidDateException($data['issuance_date'], 'Y-m-d');
            }
            $object->setIssuanceDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
        }
        if (\array_key_exists('document_reason', $data) && null !== $data['document_reason']) {
            $object->setDocumentReason($data['document_reason']);
        } elseif (\array_key_exists('document_reason', $data) && null === $data['document_reason']) {
            $object->setDocumentReason(null);
        }
        if (\array_key_exists('document_recipient_information', $data) && null !== $data['document_recipient_information']) {
            $object->setDocumentRecipientInformation($this->denormalizer->denormalize($data['document_recipient_information'], TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation::class, 'json', $context));
        } elseif (\array_key_exists('document_recipient_information', $data) && null === $data['document_recipient_information']) {
            $object->setDocumentRecipientInformation(null);
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
        return ['vehicle_category' => $data->getVehicleCategory(), 'vehicle_license_number' => $data->getVehicleLicenseNumber(), 'vehicle_identification_number' => $data->getVehicleIdentificationNumber(), 'vehicle_purpose' => $data->getVehiclePurpose(), 'vehicle_first_registration_year' => $data->getVehicleFirstRegistrationYear(), 'vehicle_owner_information' => null === $data->getVehicleOwnerInformation() ? null : new JsonObject($this->normalizer->normalize($data->getVehicleOwnerInformation(), 'json', $context)), 'other_details' => $data->getOtherDetails(), 'issuance_date' => $data->getIssuanceDate()?->format('Y-m-d'), 'document_reason' => $data->getDocumentReason(), 'document_recipient_information' => null === $data->getDocumentRecipientInformation() ? null : new JsonObject($this->normalizer->normalize($data->getDocumentRecipientInformation(), 'json', $context)), 'document_type' => $data->getDocumentType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [TemporaryVehicleRegistrationDocumentExtraction::class => false];
    }
}
