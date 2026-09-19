<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FrenchInvoiceExtraction;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class FrenchInvoiceExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return FrenchInvoiceExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && FrenchInvoiceExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new FrenchInvoiceExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('total_excluding_taxes', $data) && \is_int($data['total_excluding_taxes'])) {
            $data['total_excluding_taxes'] = (float) $data['total_excluding_taxes'];
        }
        if (\array_key_exists('total_including_taxes', $data) && \is_int($data['total_including_taxes'])) {
            $data['total_including_taxes'] = (float) $data['total_including_taxes'];
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
        if (\array_key_exists('invoice_number', $data) && null !== $data['invoice_number']) {
            $object->setInvoiceNumber($data['invoice_number']);
        } elseif (\array_key_exists('invoice_number', $data) && null === $data['invoice_number']) {
            $object->setInvoiceNumber(null);
        }
        if (\array_key_exists('invoice_date', $data) && null !== $data['invoice_date']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['invoice_date']);
            if (false === $date_1) {
                throw new InvalidDateException($data['invoice_date'], 'Y-m-d');
            }
            $object->setInvoiceDate($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('invoice_date', $data) && null === $data['invoice_date']) {
            $object->setInvoiceDate(null);
        }
        if (\array_key_exists('seller_name', $data) && null !== $data['seller_name']) {
            $object->setSellerName($data['seller_name']);
        } elseif (\array_key_exists('seller_name', $data) && null === $data['seller_name']) {
            $object->setSellerName(null);
        }
        if (\array_key_exists('seller_address', $data) && null !== $data['seller_address']) {
            $object->setSellerAddress($data['seller_address']);
        } elseif (\array_key_exists('seller_address', $data) && null === $data['seller_address']) {
            $object->setSellerAddress(null);
        }
        if (\array_key_exists('seller_company_number', $data) && null !== $data['seller_company_number']) {
            $object->setSellerCompanyNumber($data['seller_company_number']);
        } elseif (\array_key_exists('seller_company_number', $data) && null === $data['seller_company_number']) {
            $object->setSellerCompanyNumber(null);
        }
        if (\array_key_exists('vat_identification_number', $data) && null !== $data['vat_identification_number']) {
            $object->setVatIdentificationNumber($data['vat_identification_number']);
        } elseif (\array_key_exists('vat_identification_number', $data) && null === $data['vat_identification_number']) {
            $object->setVatIdentificationNumber(null);
        }
        if (\array_key_exists('billing_address', $data) && null !== $data['billing_address']) {
            $object->setBillingAddress($data['billing_address']);
        } elseif (\array_key_exists('billing_address', $data) && null === $data['billing_address']) {
            $object->setBillingAddress(null);
        }
        if (\array_key_exists('shipping_address', $data) && null !== $data['shipping_address']) {
            $object->setShippingAddress($data['shipping_address']);
        } elseif (\array_key_exists('shipping_address', $data) && null === $data['shipping_address']) {
            $object->setShippingAddress(null);
        }
        if (\array_key_exists('buyer_name', $data) && null !== $data['buyer_name']) {
            $object->setBuyerName($data['buyer_name']);
        } elseif (\array_key_exists('buyer_name', $data) && null === $data['buyer_name']) {
            $object->setBuyerName(null);
        }
        if (\array_key_exists('buyer_address', $data) && null !== $data['buyer_address']) {
            $object->setBuyerAddress($data['buyer_address']);
        } elseif (\array_key_exists('buyer_address', $data) && null === $data['buyer_address']) {
            $object->setBuyerAddress(null);
        }
        if (\array_key_exists('total_excluding_taxes', $data) && null !== $data['total_excluding_taxes']) {
            $object->setTotalExcludingTaxes($data['total_excluding_taxes']);
        } elseif (\array_key_exists('total_excluding_taxes', $data) && null === $data['total_excluding_taxes']) {
            $object->setTotalExcludingTaxes(null);
        }
        if (\array_key_exists('total_including_taxes', $data) && null !== $data['total_including_taxes']) {
            $object->setTotalIncludingTaxes($data['total_including_taxes']);
        } elseif (\array_key_exists('total_including_taxes', $data) && null === $data['total_including_taxes']) {
            $object->setTotalIncludingTaxes(null);
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
        return ['issuance_date' => $data->getIssuanceDate()?->format('Y-m-d'), 'invoice_number' => $data->getInvoiceNumber(), 'invoice_date' => $data->getInvoiceDate()?->format('Y-m-d'), 'seller_name' => $data->getSellerName(), 'seller_address' => $data->getSellerAddress(), 'seller_company_number' => $data->getSellerCompanyNumber(), 'vat_identification_number' => $data->getVatIdentificationNumber(), 'billing_address' => $data->getBillingAddress(), 'shipping_address' => $data->getShippingAddress(), 'buyer_name' => $data->getBuyerName(), 'buyer_address' => $data->getBuyerAddress(), 'total_excluding_taxes' => $data->getTotalExcludingTaxes(), 'total_including_taxes' => $data->getTotalIncludingTaxes(), 'document_type' => $data->getDocumentType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [FrenchInvoiceExtraction::class => false];
    }
}
