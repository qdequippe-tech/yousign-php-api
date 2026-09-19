<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ConsumptionAppQualifiedElectronicSignatureIdentificationMode();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('identity_verification', $data) && null !== $data['identity_verification']) {
            $object->setIdentityVerification($this->denormalizer->denormalize($data['identity_verification'], ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class, 'json', $context));
            unset($data['identity_verification']);
        } elseif (\array_key_exists('identity_verification', $data) && null === $data['identity_verification']) {
            $object->setIdentityVerification(null);
            unset($data['identity_verification']);
        }
        if (\array_key_exists('saved_identity', $data) && null !== $data['saved_identity']) {
            $object->setSavedIdentity($data['saved_identity']);
            unset($data['saved_identity']);
        } elseif (\array_key_exists('saved_identity', $data) && null === $data['saved_identity']) {
            $object->setSavedIdentity(null);
            unset($data['saved_identity']);
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
        $dataArray['identity_verification'] = null === $data->getIdentityVerification() ? null : new JsonObject($this->normalizer->normalize($data->getIdentityVerification(), 'json', $context));
        $dataArray['saved_identity'] = $data->getSavedIdentity();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false];
    }
}
