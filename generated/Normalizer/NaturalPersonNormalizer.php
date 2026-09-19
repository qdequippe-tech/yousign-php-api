<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NaturalPerson;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NaturalPersonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NaturalPerson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NaturalPerson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NaturalPerson();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('identity', $data) && null !== $data['identity']) {
            $values = new JsonObject();
            foreach ($data['identity'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setIdentity($values);
        } elseif (\array_key_exists('identity', $data) && null === $data['identity']) {
            $object->setIdentity(null);
        }
        if (\array_key_exists('address', $data) && null !== $data['address']) {
            $values_1 = new JsonObject();
            foreach ($data['address'] as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $object->setAddress($values_1);
        } elseif (\array_key_exists('address', $data) && null === $data['address']) {
            $object->setAddress(null);
        }
        if (\array_key_exists('bank_account', $data) && null !== $data['bank_account']) {
            $values_2 = new JsonObject();
            foreach ($data['bank_account'] as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $object->setBankAccount($values_2);
        } elseif (\array_key_exists('bank_account', $data) && null === $data['bank_account']) {
            $object->setBankAccount(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $values = new JsonObject();
        foreach ($data->getIdentity() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['identity'] = $values;
        $values_1 = new JsonObject();
        foreach ($data->getAddress() as $key_1 => $value_1) {
            $values_1[$key_1] = $value_1;
        }
        $dataArray['address'] = $values_1;
        $values_2 = new JsonObject();
        foreach ($data->getBankAccount() as $key_2 => $value_2) {
            $values_2[$key_2] = $value_2;
        }
        $dataArray['bank_account'] = $values_2;

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [NaturalPerson::class => false];
    }
}
