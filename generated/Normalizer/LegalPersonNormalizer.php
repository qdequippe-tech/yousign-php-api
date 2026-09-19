<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Identity;
use Qdequippe\Yousign\Api\Model\LegalPerson;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class LegalPersonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return LegalPerson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && LegalPerson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new LegalPerson();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
            $object->setCompanyName($data['company_name']);
        } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
            $object->setCompanyName(null);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('bank_account', $data) && null !== $data['bank_account']) {
            $values = new JsonObject();
            foreach ($data['bank_account'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setBankAccount($values);
        } elseif (\array_key_exists('bank_account', $data) && null === $data['bank_account']) {
            $object->setBankAccount(null);
        }
        if (\array_key_exists('legal_representatives', $data) && null !== $data['legal_representatives']) {
            $values_1 = [];
            foreach ($data['legal_representatives'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, Identity::class, 'json', $context);
            }
            $object->setLegalRepresentatives($values_1);
        } elseif (\array_key_exists('legal_representatives', $data) && null === $data['legal_representatives']) {
            $object->setLegalRepresentatives(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['company_name'] = $data->getCompanyName();
        $dataArray['country_code'] = $data->getCountryCode();
        $values = new JsonObject();
        foreach ($data->getBankAccount() as $key => $value) {
            $values[$key] = $value;
        }
        $dataArray['bank_account'] = $values;
        $values_1 = [];
        foreach ($data->getLegalRepresentatives() as $value_1) {
            $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
        }
        $dataArray['legal_representatives'] = $values_1;

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [LegalPerson::class => false];
    }
}
