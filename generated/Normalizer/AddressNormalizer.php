<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Address;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AddressNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Address::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Address::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Address();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('line1', $data) && null !== $data['line1']) {
            $object->setLine1($data['line1']);
        } elseif (\array_key_exists('line1', $data) && null === $data['line1']) {
            $object->setLine1(null);
        }
        if (\array_key_exists('line2', $data) && null !== $data['line2']) {
            $object->setLine2($data['line2']);
        } elseif (\array_key_exists('line2', $data) && null === $data['line2']) {
            $object->setLine2(null);
        }
        if (\array_key_exists('postal_code', $data) && null !== $data['postal_code']) {
            $object->setPostalCode($data['postal_code']);
        } elseif (\array_key_exists('postal_code', $data) && null === $data['postal_code']) {
            $object->setPostalCode(null);
        }
        if (\array_key_exists('city', $data) && null !== $data['city']) {
            $object->setCity($data['city']);
        } elseif (\array_key_exists('city', $data) && null === $data['city']) {
            $object->setCity(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['line1'] = $data->getLine1();
        if ($data->isInitialized('line2') && null !== $data->getLine2()) {
            $dataArray['line2'] = $data->getLine2();
        }
        $dataArray['postal_code'] = $data->getPostalCode();
        $dataArray['city'] = $data->getCity();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [Address::class => false];
    }
}
