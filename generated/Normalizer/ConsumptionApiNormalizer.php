<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ConsumptionApiNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ConsumptionApi::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ConsumptionApi::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ConsumptionApi();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('electronic_signature', $data) && null !== $data['electronic_signature']) {
            $object->setElectronicSignature($data['electronic_signature']);
            unset($data['electronic_signature']);
        } elseif (\array_key_exists('electronic_signature', $data) && null === $data['electronic_signature']) {
            $object->setElectronicSignature(null);
            unset($data['electronic_signature']);
        }
        if (\array_key_exists('advanced_electronic_signature', $data) && null !== $data['advanced_electronic_signature']) {
            $object->setAdvancedElectronicSignature($data['advanced_electronic_signature']);
            unset($data['advanced_electronic_signature']);
        } elseif (\array_key_exists('advanced_electronic_signature', $data) && null === $data['advanced_electronic_signature']) {
            $object->setAdvancedElectronicSignature(null);
            unset($data['advanced_electronic_signature']);
        }
        if (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null !== $data['advanced_electronic_signature_with_qualified_certificate']) {
            $object->setAdvancedElectronicSignatureWithQualifiedCertificate($data['advanced_electronic_signature_with_qualified_certificate']);
            unset($data['advanced_electronic_signature_with_qualified_certificate']);
        } elseif (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null === $data['advanced_electronic_signature_with_qualified_certificate']) {
            $object->setAdvancedElectronicSignatureWithQualifiedCertificate(null);
            unset($data['advanced_electronic_signature_with_qualified_certificate']);
        }
        if (\array_key_exists('electronic_seal', $data) && null !== $data['electronic_seal']) {
            $object->setElectronicSeal($data['electronic_seal']);
            unset($data['electronic_seal']);
        } elseif (\array_key_exists('electronic_seal', $data) && null === $data['electronic_seal']) {
            $object->setElectronicSeal(null);
            unset($data['electronic_seal']);
        }
        if (\array_key_exists('advanced_electronic_seal', $data) && null !== $data['advanced_electronic_seal']) {
            $object->setAdvancedElectronicSeal($data['advanced_electronic_seal']);
            unset($data['advanced_electronic_seal']);
        } elseif (\array_key_exists('advanced_electronic_seal', $data) && null === $data['advanced_electronic_seal']) {
            $object->setAdvancedElectronicSeal(null);
            unset($data['advanced_electronic_seal']);
        }
        if (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null !== $data['qualified_electronic_signature_identification_mode']) {
            $object->setQualifiedElectronicSignatureIdentificationMode($this->denormalizer->denormalize($data['qualified_electronic_signature_identification_mode'], ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class, 'json', $context));
            unset($data['qualified_electronic_signature_identification_mode']);
        } elseif (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null === $data['qualified_electronic_signature_identification_mode']) {
            $object->setQualifiedElectronicSignatureIdentificationMode(null);
            unset($data['qualified_electronic_signature_identification_mode']);
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
        $dataArray['electronic_signature'] = $data->getElectronicSignature();
        $dataArray['advanced_electronic_signature'] = $data->getAdvancedElectronicSignature();
        $dataArray['advanced_electronic_signature_with_qualified_certificate'] = $data->getAdvancedElectronicSignatureWithQualifiedCertificate();
        if ($data->isInitialized('electronicSeal') && null !== $data->getElectronicSeal()) {
            $dataArray['electronic_seal'] = $data->getElectronicSeal();
        }
        if ($data->isInitialized('advancedElectronicSeal') && null !== $data->getAdvancedElectronicSeal()) {
            $dataArray['advanced_electronic_seal'] = $data->getAdvancedElectronicSeal();
        }
        $dataArray['qualified_electronic_signature_identification_mode'] = null === $data->getQualifiedElectronicSignatureIdentificationMode() ? null : new JsonObject($this->normalizer->normalize($data->getQualifiedElectronicSignatureIdentificationMode(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ConsumptionApi::class => false];
    }
}
