<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('document_recipient_full_name', $data) && null !== $data['document_recipient_full_name']) {
            $object->setDocumentRecipientFullName($data['document_recipient_full_name']);
            unset($data['document_recipient_full_name']);
        } elseif (\array_key_exists('document_recipient_full_name', $data) && null === $data['document_recipient_full_name']) {
            $object->setDocumentRecipientFullName(null);
            unset($data['document_recipient_full_name']);
        }
        if (\array_key_exists('document_recipient_address', $data) && null !== $data['document_recipient_address']) {
            $object->setDocumentRecipientAddress($data['document_recipient_address']);
            unset($data['document_recipient_address']);
        } elseif (\array_key_exists('document_recipient_address', $data) && null === $data['document_recipient_address']) {
            $object->setDocumentRecipientAddress(null);
            unset($data['document_recipient_address']);
        }
        if (\array_key_exists('document_recipient_birth_date', $data) && null !== $data['document_recipient_birth_date']) {
            $object->setDocumentRecipientBirthDate($data['document_recipient_birth_date']);
            unset($data['document_recipient_birth_date']);
        } elseif (\array_key_exists('document_recipient_birth_date', $data) && null === $data['document_recipient_birth_date']) {
            $object->setDocumentRecipientBirthDate(null);
            unset($data['document_recipient_birth_date']);
        }
        if (\array_key_exists('document_recipient_birth_city', $data) && null !== $data['document_recipient_birth_city']) {
            $object->setDocumentRecipientBirthCity($data['document_recipient_birth_city']);
            unset($data['document_recipient_birth_city']);
        } elseif (\array_key_exists('document_recipient_birth_city', $data) && null === $data['document_recipient_birth_city']) {
            $object->setDocumentRecipientBirthCity(null);
            unset($data['document_recipient_birth_city']);
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
        $dataArray['document_recipient_full_name'] = $data->getDocumentRecipientFullName();
        $dataArray['document_recipient_address'] = $data->getDocumentRecipientAddress();
        $dataArray['document_recipient_birth_date'] = $data->getDocumentRecipientBirthDate();
        $dataArray['document_recipient_birth_city'] = $data->getDocumentRecipientBirthCity();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [TemporaryVehicleRegistrationDocumentExtractionDocumentRecipientInformation::class => false];
    }
}
