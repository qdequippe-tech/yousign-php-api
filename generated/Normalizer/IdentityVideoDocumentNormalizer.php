<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdentityVideoDocument;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdentityVideoDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdentityVideoDocument::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdentityVideoDocument::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdentityVideoDocument();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('full_name', $data) && null !== $data['full_name']) {
            $object->setFullName($data['full_name']);
        } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
            $object->setFullName(null);
        }
        if (\array_key_exists('born_on', $data) && null !== $data['born_on']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['born_on']);
            if (false === $date) {
                throw new InvalidDateException($data['born_on'], 'Y-m-d');
            }
            $object->setBornOn($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('born_on', $data) && null === $data['born_on']) {
            $object->setBornOn(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('issuing_country_code', $data) && null !== $data['issuing_country_code']) {
            $object->setIssuingCountryCode($data['issuing_country_code']);
        } elseif (\array_key_exists('issuing_country_code', $data) && null === $data['issuing_country_code']) {
            $object->setIssuingCountryCode(null);
        }
        if (\array_key_exists('national_identification_number', $data) && null !== $data['national_identification_number']) {
            $object->setNationalIdentificationNumber($data['national_identification_number']);
        } elseif (\array_key_exists('national_identification_number', $data) && null === $data['national_identification_number']) {
            $object->setNationalIdentificationNumber(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['full_name' => $data->getFullName(), 'born_on' => $data->getBornOn()?->format('Y-m-d'), 'type' => $data->getType(), 'issuing_country_code' => $data->getIssuingCountryCode(), 'national_identification_number' => $data->getNationalIdentificationNumber()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdentityVideoDocument::class => false];
    }
}
