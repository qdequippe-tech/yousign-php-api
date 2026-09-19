<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AnalysisType;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AnalysisTypeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return AnalysisType::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && AnalysisType::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new AnalysisType();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('extraction', $data) && \is_int($data['extraction'])) {
            $data['extraction'] = (bool) $data['extraction'];
        }
        if (\array_key_exists('extraction', $data) && null !== $data['extraction']) {
            $object->setExtraction($data['extraction']);
        } elseif (\array_key_exists('extraction', $data) && null === $data['extraction']) {
            $object->setExtraction(null);
        }
        if (\array_key_exists('fraud_level', $data) && null !== $data['fraud_level']) {
            $object->setFraudLevel($data['fraud_level']);
        } elseif (\array_key_exists('fraud_level', $data) && null === $data['fraud_level']) {
            $object->setFraudLevel(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('extraction') && null !== $data->getExtraction()) {
            $dataArray['extraction'] = $data->getExtraction();
        }
        if ($data->isInitialized('fraudLevel') && null !== $data->getFraudLevel()) {
            $dataArray['fraud_level'] = $data->getFraudLevel();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [AnalysisType::class => false];
    }
}
