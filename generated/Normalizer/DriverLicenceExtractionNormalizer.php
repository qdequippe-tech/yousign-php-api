<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\DriverLicenceExtraction;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DriverLicenceExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return DriverLicenceExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && DriverLicenceExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new DriverLicenceExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
            $object->setFirstName($data['first_name']);
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
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
        if (\array_key_exists('expired_on', $data) && null !== $data['expired_on']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['expired_on']);
            if (false === $date_1) {
                throw new InvalidDateException($data['expired_on'], 'Y-m-d');
            }
            $object->setExpiredOn($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('expired_on', $data) && null === $data['expired_on']) {
            $object->setExpiredOn(null);
        }
        if (\array_key_exists('license_type', $data) && null !== $data['license_type']) {
            $values = [];
            foreach ($data['license_type'] as $value) {
                $values[] = $value;
            }
            $object->setLicenseType($values);
        } elseif (\array_key_exists('license_type', $data) && null === $data['license_type']) {
            $object->setLicenseType(null);
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
        $dataArray['first_name'] = $data->getFirstName();
        $dataArray['last_name'] = $data->getLastName();
        $dataArray['full_name'] = $data->getFullName();
        $dataArray['born_on'] = $data->getBornOn()?->format('Y-m-d');
        $dataArray['expired_on'] = $data->getExpiredOn()?->format('Y-m-d');
        $values = [];
        foreach ($data->getLicenseType() as $value) {
            $values[] = $value;
        }
        $dataArray['license_type'] = $values;
        $dataArray['document_type'] = $data->getDocumentType();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [DriverLicenceExtraction::class => false];
    }
}
