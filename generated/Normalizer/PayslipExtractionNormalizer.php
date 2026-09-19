<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\PayslipExtraction;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class PayslipExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return PayslipExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && PayslipExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new PayslipExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('net_pay', $data) && \is_int($data['net_pay'])) {
            $data['net_pay'] = (float) $data['net_pay'];
        }
        if (\array_key_exists('gross_pay', $data) && \is_int($data['gross_pay'])) {
            $data['gross_pay'] = (float) $data['gross_pay'];
        }
        if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
            $object->setFirstName($data['first_name']);
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
        }
        if (\array_key_exists('full_name', $data) && null !== $data['full_name']) {
            $object->setFullName($data['full_name']);
        } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
            $object->setFullName(null);
        }
        if (\array_key_exists('employer_name', $data) && null !== $data['employer_name']) {
            $object->setEmployerName($data['employer_name']);
        } elseif (\array_key_exists('employer_name', $data) && null === $data['employer_name']) {
            $object->setEmployerName(null);
        }
        if (\array_key_exists('pay_period_start_date', $data) && null !== $data['pay_period_start_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['pay_period_start_date']);
            if (false === $date) {
                throw new InvalidDateException($data['pay_period_start_date'], 'Y-m-d');
            }
            $object->setPayPeriodStartDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('pay_period_start_date', $data) && null === $data['pay_period_start_date']) {
            $object->setPayPeriodStartDate(null);
        }
        if (\array_key_exists('pay_period_end_date', $data) && null !== $data['pay_period_end_date']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['pay_period_end_date']);
            if (false === $date_1) {
                throw new InvalidDateException($data['pay_period_end_date'], 'Y-m-d');
            }
            $object->setPayPeriodEndDate($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('pay_period_end_date', $data) && null === $data['pay_period_end_date']) {
            $object->setPayPeriodEndDate(null);
        }
        if (\array_key_exists('net_pay', $data) && null !== $data['net_pay']) {
            $object->setNetPay($data['net_pay']);
        } elseif (\array_key_exists('net_pay', $data) && null === $data['net_pay']) {
            $object->setNetPay(null);
        }
        if (\array_key_exists('gross_pay', $data) && null !== $data['gross_pay']) {
            $object->setGrossPay($data['gross_pay']);
        } elseif (\array_key_exists('gross_pay', $data) && null === $data['gross_pay']) {
            $object->setGrossPay(null);
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
        return ['first_name' => $data->getFirstName(), 'last_name' => $data->getLastName(), 'full_name' => $data->getFullName(), 'employer_name' => $data->getEmployerName(), 'pay_period_start_date' => $data->getPayPeriodStartDate()?->format('Y-m-d'), 'pay_period_end_date' => $data->getPayPeriodEndDate()?->format('Y-m-d'), 'net_pay' => $data->getNetPay(), 'gross_pay' => $data->getGrossPay(), 'document_type' => $data->getDocumentType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [PayslipExtraction::class => false];
    }
}
