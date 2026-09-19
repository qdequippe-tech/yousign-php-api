<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UpdateApproverInfo;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateApproverInfoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateApproverInfo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateApproverInfo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateApproverInfo();
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
            unset($data['first_name']);
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
            unset($data['first_name']);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
            unset($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
            unset($data['last_name']);
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($data['email']);
            unset($data['email']);
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
            unset($data['email']);
        }
        if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
            $object->setPhoneNumber($data['phone_number']);
            unset($data['phone_number']);
        } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
            $object->setPhoneNumber(null);
            unset($data['phone_number']);
        }
        if (\array_key_exists('locale', $data) && null !== $data['locale']) {
            $object->setLocale($data['locale']);
            unset($data['locale']);
        } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
            $object->setLocale(null);
            unset($data['locale']);
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
        if ($data->isInitialized('firstName') && null !== $data->getFirstName()) {
            $dataArray['first_name'] = $data->getFirstName();
        }
        if ($data->isInitialized('lastName') && null !== $data->getLastName()) {
            $dataArray['last_name'] = $data->getLastName();
        }
        if ($data->isInitialized('email') && null !== $data->getEmail()) {
            $dataArray['email'] = $data->getEmail();
        }
        if ($data->isInitialized('phoneNumber') && null !== $data->getPhoneNumber()) {
            $dataArray['phone_number'] = $data->getPhoneNumber();
        }
        if ($data->isInitialized('locale') && null !== $data->getLocale()) {
            $dataArray['locale'] = $data->getLocale();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateApproverInfo::class => false];
    }
}
