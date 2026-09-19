<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ItalianVehicleRegistrationDocumentExtractionDeedInformationsInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('deed_date', $data) && null !== $data['deed_date']) {
            $object->setDeedDate($data['deed_date']);
        } elseif (\array_key_exists('deed_date', $data) && null === $data['deed_date']) {
            $object->setDeedDate(null);
        }
        if (\array_key_exists('deed_type', $data) && null !== $data['deed_type']) {
            $object->setDeedType($data['deed_type']);
        } elseif (\array_key_exists('deed_type', $data) && null === $data['deed_type']) {
            $object->setDeedType(null);
        }
        if (\array_key_exists('liens_encumbrances', $data) && null !== $data['liens_encumbrances']) {
            $object->setLiensEncumbrances($data['liens_encumbrances']);
        } elseif (\array_key_exists('liens_encumbrances', $data) && null === $data['liens_encumbrances']) {
            $object->setLiensEncumbrances(null);
        }
        if (\array_key_exists('previous_owner_full_name', $data) && null !== $data['previous_owner_full_name']) {
            $object->setPreviousOwnerFullName($data['previous_owner_full_name']);
        } elseif (\array_key_exists('previous_owner_full_name', $data) && null === $data['previous_owner_full_name']) {
            $object->setPreviousOwnerFullName(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['deed_date' => $data->getDeedDate(), 'deed_type' => $data->getDeedType(), 'liens_encumbrances' => $data->getLiensEncumbrances(), 'previous_owner_full_name' => $data->getPreviousOwnerFullName()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ItalianVehicleRegistrationDocumentExtractionDeedInformationsInner::class => false];
    }
}
