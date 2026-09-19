<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionOwnerInformation;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ItalianVehicleRegistrationDocumentExtractionOwnerInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItalianVehicleRegistrationDocumentExtractionOwnerInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ItalianVehicleRegistrationDocumentExtractionOwnerInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ItalianVehicleRegistrationDocumentExtractionOwnerInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('owner_full_name', $data) && null !== $data['owner_full_name']) {
            $object->setOwnerFullName($data['owner_full_name']);
        } elseif (\array_key_exists('owner_full_name', $data) && null === $data['owner_full_name']) {
            $object->setOwnerFullName(null);
        }
        if (\array_key_exists('owner_address', $data) && null !== $data['owner_address']) {
            $object->setOwnerAddress($data['owner_address']);
        } elseif (\array_key_exists('owner_address', $data) && null === $data['owner_address']) {
            $object->setOwnerAddress(null);
        }
        if (\array_key_exists('owner_type', $data) && null !== $data['owner_type']) {
            $object->setOwnerType($data['owner_type']);
        } elseif (\array_key_exists('owner_type', $data) && null === $data['owner_type']) {
            $object->setOwnerType(null);
        }
        if (\array_key_exists('owner_birth_date', $data) && null !== $data['owner_birth_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['owner_birth_date']);
            if (false === $date) {
                throw new InvalidDateException($data['owner_birth_date'], 'Y-m-d');
            }
            $object->setOwnerBirthDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('owner_birth_date', $data) && null === $data['owner_birth_date']) {
            $object->setOwnerBirthDate(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['owner_full_name' => $data->getOwnerFullName(), 'owner_address' => $data->getOwnerAddress(), 'owner_type' => $data->getOwnerType(), 'owner_birth_date' => $data->getOwnerBirthDate()?->format('Y-m-d')];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ItalianVehicleRegistrationDocumentExtractionOwnerInformation::class => false];
    }
}
