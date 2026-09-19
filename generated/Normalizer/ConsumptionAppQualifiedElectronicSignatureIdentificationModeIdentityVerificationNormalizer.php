<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('succeeded', $data) && null !== $data['succeeded']) {
            $object->setSucceeded($data['succeeded']);
            unset($data['succeeded']);
        } elseif (\array_key_exists('succeeded', $data) && null === $data['succeeded']) {
            $object->setSucceeded(null);
            unset($data['succeeded']);
        }
        if (\array_key_exists('rejected', $data) && null !== $data['rejected']) {
            $object->setRejected($data['rejected']);
            unset($data['rejected']);
        } elseif (\array_key_exists('rejected', $data) && null === $data['rejected']) {
            $object->setRejected(null);
            unset($data['rejected']);
        }
        if (\array_key_exists('expired_after_succeeded', $data) && null !== $data['expired_after_succeeded']) {
            $object->setExpiredAfterSucceeded($data['expired_after_succeeded']);
            unset($data['expired_after_succeeded']);
        } elseif (\array_key_exists('expired_after_succeeded', $data) && null === $data['expired_after_succeeded']) {
            $object->setExpiredAfterSucceeded(null);
            unset($data['expired_after_succeeded']);
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
        $dataArray['succeeded'] = $data->getSucceeded();
        $dataArray['rejected'] = $data->getRejected();
        $dataArray['expired_after_succeeded'] = $data->getExpiredAfterSucceeded();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class => false];
    }
}
