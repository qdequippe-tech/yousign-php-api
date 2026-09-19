<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ItalianTaxNoticeExtraction;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ItalianTaxNoticeExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItalianTaxNoticeExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ItalianTaxNoticeExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ItalianTaxNoticeExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('reference_income', $data) && \is_int($data['reference_income'])) {
            $data['reference_income'] = (float) $data['reference_income'];
        }
        if (\array_key_exists('employer_name', $data) && null !== $data['employer_name']) {
            $object->setEmployerName($data['employer_name']);
        } elseif (\array_key_exists('employer_name', $data) && null === $data['employer_name']) {
            $object->setEmployerName(null);
        }
        if (\array_key_exists('employer_codice_fiscale', $data) && null !== $data['employer_codice_fiscale']) {
            $object->setEmployerCodiceFiscale($data['employer_codice_fiscale']);
        } elseif (\array_key_exists('employer_codice_fiscale', $data) && null === $data['employer_codice_fiscale']) {
            $object->setEmployerCodiceFiscale(null);
        }
        if (\array_key_exists('employee_full_name', $data) && null !== $data['employee_full_name']) {
            $object->setEmployeeFullName($data['employee_full_name']);
        } elseif (\array_key_exists('employee_full_name', $data) && null === $data['employee_full_name']) {
            $object->setEmployeeFullName(null);
        }
        if (\array_key_exists('employee_codice_fiscale', $data) && null !== $data['employee_codice_fiscale']) {
            $object->setEmployeeCodiceFiscale($data['employee_codice_fiscale']);
        } elseif (\array_key_exists('employee_codice_fiscale', $data) && null === $data['employee_codice_fiscale']) {
            $object->setEmployeeCodiceFiscale(null);
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

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['employer_name' => $data->getEmployerName(), 'employer_codice_fiscale' => $data->getEmployerCodiceFiscale(), 'employee_full_name' => $data->getEmployeeFullName(), 'employee_codice_fiscale' => $data->getEmployeeCodiceFiscale(), 'issuance_date' => $data->getIssuanceDate()?->format('Y-m-d'), 'income_year' => $data->getIncomeYear(), 'reference_income' => $data->getReferenceIncome(), 'document_type' => $data->getDocumentType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ItalianTaxNoticeExtraction::class => false];
    }
}
