<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeExtraction2dDoc;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchTaxNoticeExtraction2dDocNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchTaxNoticeExtraction2dDoc::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchTaxNoticeExtraction2dDoc::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchTaxNoticeExtraction2dDoc();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('full_name_1', $data) && null !== $data['full_name_1']) {
            $object->setFullName1($data['full_name_1']);
        } elseif (\array_key_exists('full_name_1', $data) && null === $data['full_name_1']) {
            $object->setFullName1(null);
        }
        if (\array_key_exists('fiscal_number_1', $data) && null !== $data['fiscal_number_1']) {
            $object->setFiscalNumber1($data['fiscal_number_1']);
        } elseif (\array_key_exists('fiscal_number_1', $data) && null === $data['fiscal_number_1']) {
            $object->setFiscalNumber1(null);
        }
        if (\array_key_exists('full_name_2', $data) && null !== $data['full_name_2']) {
            $object->setFullName2($data['full_name_2']);
        } elseif (\array_key_exists('full_name_2', $data) && null === $data['full_name_2']) {
            $object->setFullName2(null);
        }
        if (\array_key_exists('fiscal_number_2', $data) && null !== $data['fiscal_number_2']) {
            $object->setFiscalNumber2($data['fiscal_number_2']);
        } elseif (\array_key_exists('fiscal_number_2', $data) && null === $data['fiscal_number_2']) {
            $object->setFiscalNumber2(null);
        }
        if (\array_key_exists('tax_notice_reference', $data) && null !== $data['tax_notice_reference']) {
            $object->setTaxNoticeReference($data['tax_notice_reference']);
        } elseif (\array_key_exists('tax_notice_reference', $data) && null === $data['tax_notice_reference']) {
            $object->setTaxNoticeReference(null);
        }
        if (\array_key_exists('income_year', $data) && null !== $data['income_year']) {
            $object->setIncomeYear($data['income_year']);
        } elseif (\array_key_exists('income_year', $data) && null === $data['income_year']) {
            $object->setIncomeYear(null);
        }
        if (\array_key_exists('reference_income', $data) && null !== $data['reference_income']) {
            $object->setReferenceIncome($data['reference_income']);
        } elseif (\array_key_exists('reference_income', $data) && null === $data['reference_income']) {
            $object->setReferenceIncome(null);
        }
        if (\array_key_exists('parts_count', $data) && null !== $data['parts_count']) {
            $object->setPartsCount($data['parts_count']);
        } elseif (\array_key_exists('parts_count', $data) && null === $data['parts_count']) {
            $object->setPartsCount(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['full_name_1' => $data->getFullName1(), 'fiscal_number_1' => $data->getFiscalNumber1(), 'full_name_2' => $data->getFullName2(), 'fiscal_number_2' => $data->getFiscalNumber2(), 'tax_notice_reference' => $data->getTaxNoticeReference(), 'income_year' => $data->getIncomeYear(), 'reference_income' => $data->getReferenceIncome(), 'parts_count' => $data->getPartsCount()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchTaxNoticeExtraction2dDoc::class => false];
    }
}
