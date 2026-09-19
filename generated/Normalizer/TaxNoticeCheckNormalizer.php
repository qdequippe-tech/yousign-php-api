<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\DocumentAnalysisCheck;
use Qdequippe\Yousign\Api\Model\TaxNoticeCheck;
use Qdequippe\Yousign\Api\Model\TaxNoticeCheckIncomeYear;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TaxNoticeCheckNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return TaxNoticeCheck::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && TaxNoticeCheck::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new TaxNoticeCheck();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('full_name', $data) && null !== $data['full_name']) {
            $object->setFullName($this->denormalizer->denormalize($data['full_name'], DocumentAnalysisCheck::class, 'json', $context));
        } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
            $object->setFullName(null);
        }
        if (\array_key_exists('income_year', $data) && null !== $data['income_year']) {
            $object->setIncomeYear($this->denormalizer->denormalize($data['income_year'], TaxNoticeCheckIncomeYear::class, 'json', $context));
        } elseif (\array_key_exists('income_year', $data) && null === $data['income_year']) {
            $object->setIncomeYear(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('fullName') && null !== $data->getFullName()) {
            $dataArray['full_name'] = null === $data->getFullName() ? null : new JsonObject($this->normalizer->normalize($data->getFullName(), 'json', $context));
        }
        if ($data->isInitialized('incomeYear') && null !== $data->getIncomeYear()) {
            $dataArray['income_year'] = null === $data->getIncomeYear() ? null : new JsonObject($this->normalizer->normalize($data->getIncomeYear(), 'json', $context));
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [TaxNoticeCheck::class => false];
    }
}
