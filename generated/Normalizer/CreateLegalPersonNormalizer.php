<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\BankAccount;
use Qdequippe\Yousign\Api\Model\CreateLegalPerson;
use Qdequippe\Yousign\Api\Model\Identity;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateLegalPersonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateLegalPerson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateLegalPerson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateLegalPerson();
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
            $object->setBankAccount($this->denormalizer->denormalize($data['bank_account'], BankAccount::class, 'json', $context));
        } elseif (\array_key_exists('bank_account', $data) && null === $data['bank_account']) {
            $object->setBankAccount(null);
        }
        if (\array_key_exists('legal_representatives', $data) && null !== $data['legal_representatives']) {
            $values = [];
            foreach ($data['legal_representatives'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, Identity::class, 'json', $context);
            }
            $object->setLegalRepresentatives($values);
        } elseif (\array_key_exists('legal_representatives', $data) && null === $data['legal_representatives']) {
            $object->setLegalRepresentatives(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('companyName') && null !== $data->getCompanyName()) {
            $dataArray['company_name'] = $data->getCompanyName();
        }
        if ($data->isInitialized('countryCode') && null !== $data->getCountryCode()) {
            $dataArray['country_code'] = $data->getCountryCode();
        }
        if ($data->isInitialized('bankAccount') && null !== $data->getBankAccount()) {
            $dataArray['bank_account'] = null === $data->getBankAccount() ? null : new JsonObject($this->normalizer->normalize($data->getBankAccount(), 'json', $context));
        }
        if ($data->isInitialized('legalRepresentatives') && null !== $data->getLegalRepresentatives()) {
            $values = [];
            foreach ($data->getLegalRepresentatives() as $value) {
                $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['legal_representatives'] = $values;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateLegalPerson::class => false];
    }
}
