<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeExtraction;
use Qdequippe\Yousign\Api\Model\FrenchTaxNoticeExtraction2dDoc;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchTaxNoticeExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchTaxNoticeExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchTaxNoticeExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchTaxNoticeExtraction();
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
            $object->setFullName($data['full_name']);
        } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
            $object->setFullName(null);
        }
        if (\array_key_exists('fiscal_number_1', $data) && null !== $data['fiscal_number_1']) {
            $object->setFiscalNumber1($data['fiscal_number_1']);
        } elseif (\array_key_exists('fiscal_number_1', $data) && null === $data['fiscal_number_1']) {
            $object->setFiscalNumber1(null);
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
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['issuance_date']);
            if (false === $date) {
                throw new InvalidDateException($data['issuance_date'], 'Y-m-d');
            }
            $object->setIssuanceDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
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
        if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
            $object->setDocumentType($data['document_type']);
        } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
            $object->setDocumentType(null);
        }
        if (\array_key_exists('2d_doc', $data) && null !== $data['2d_doc']) {
            $object->set2dDoc($this->denormalizer->denormalize($data['2d_doc'], FrenchTaxNoticeExtraction2dDoc::class, 'json', $context));
        } elseif (\array_key_exists('2d_doc', $data) && null === $data['2d_doc']) {
            $object->set2dDoc(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['full_name' => $data->getFullName(), 'fiscal_number_1' => $data->getFiscalNumber1(), 'fiscal_number_2' => $data->getFiscalNumber2(), 'tax_notice_reference' => $data->getTaxNoticeReference(), 'issuance_date' => $data->getIssuanceDate()?->format('Y-m-d'), 'income_year' => $data->getIncomeYear(), 'reference_income' => $data->getReferenceIncome(), 'document_type' => $data->getDocumentType(), '2d_doc' => null === $data->get2dDoc() ? null : new JsonObject($this->normalizer->normalize($data->get2dDoc(), 'json', $context))];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchTaxNoticeExtraction::class => false];
    }
}
