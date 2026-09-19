<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Address;
use Qdequippe\Yousign\Api\Model\BankAccount;
use Qdequippe\Yousign\Api\Model\Identity;
use Qdequippe\Yousign\Api\Model\UpdateNaturalPerson;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateNaturalPersonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateNaturalPerson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateNaturalPerson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateNaturalPerson();
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
            $object->setIdentity($this->denormalizer->denormalize($data['identity'], Identity::class, 'json', $context));
        } elseif (\array_key_exists('identity', $data) && null === $data['identity']) {
            $object->setIdentity(null);
        }
        if (\array_key_exists('address', $data) && null !== $data['address']) {
            $object->setAddress($this->denormalizer->denormalize($data['address'], Address::class, 'json', $context));
        } elseif (\array_key_exists('address', $data) && null === $data['address']) {
            $object->setAddress(null);
        }
        if (\array_key_exists('bank_account', $data) && null !== $data['bank_account']) {
            $object->setBankAccount($this->denormalizer->denormalize($data['bank_account'], BankAccount::class, 'json', $context));
        } elseif (\array_key_exists('bank_account', $data) && null === $data['bank_account']) {
            $object->setBankAccount(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('identity') && null !== $data->getIdentity()) {
            $dataArray['identity'] = null === $data->getIdentity() ? null : new JsonObject($this->normalizer->normalize($data->getIdentity(), 'json', $context));
        }
        if ($data->isInitialized('address') && null !== $data->getAddress()) {
            $dataArray['address'] = null === $data->getAddress() ? null : new JsonObject($this->normalizer->normalize($data->getAddress(), 'json', $context));
        }
        if ($data->isInitialized('bankAccount') && null !== $data->getBankAccount()) {
            $dataArray['bank_account'] = null === $data->getBankAccount() ? null : new JsonObject($this->normalizer->normalize($data->getBankAccount(), 'json', $context));
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateNaturalPerson::class => false];
    }
}
