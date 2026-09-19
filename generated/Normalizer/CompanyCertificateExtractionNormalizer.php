<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CompanyCertificateExtraction;
use Qdequippe\Yousign\Api\Model\CompanyCertificateExtractionLegalRepresentativesInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CompanyCertificateExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CompanyCertificateExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CompanyCertificateExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CompanyCertificateExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('verification_number', $data) && null !== $data['verification_number']) {
            $object->setVerificationNumber($data['verification_number']);
        } elseif (\array_key_exists('verification_number', $data) && null === $data['verification_number']) {
            $object->setVerificationNumber(null);
        }
        if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
            $object->setCompanyName($data['company_name']);
        } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
            $object->setCompanyName(null);
        }
        if (\array_key_exists('company_number', $data) && null !== $data['company_number']) {
            $object->setCompanyNumber($data['company_number']);
        } elseif (\array_key_exists('company_number', $data) && null === $data['company_number']) {
            $object->setCompanyNumber(null);
        }
        if (\array_key_exists('registered_address', $data) && null !== $data['registered_address']) {
            $object->setRegisteredAddress($data['registered_address']);
        } elseif (\array_key_exists('registered_address', $data) && null === $data['registered_address']) {
            $object->setRegisteredAddress(null);
        }
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $object->setIssuanceDate($data['issuance_date']);
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
        }
        if (\array_key_exists('legal_representatives', $data) && null !== $data['legal_representatives']) {
            $values = [];
            foreach ($data['legal_representatives'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CompanyCertificateExtractionLegalRepresentativesInner::class, 'json', $context);
            }
            $object->setLegalRepresentatives($values);
        } elseif (\array_key_exists('legal_representatives', $data) && null === $data['legal_representatives']) {
            $object->setLegalRepresentatives(null);
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
        $dataArray = [];
        $dataArray['verification_number'] = $data->getVerificationNumber();
        $dataArray['company_name'] = $data->getCompanyName();
        $dataArray['company_number'] = $data->getCompanyNumber();
        $dataArray['registered_address'] = $data->getRegisteredAddress();
        $dataArray['issuance_date'] = $data->getIssuanceDate();
        $values = [];
        foreach ($data->getLegalRepresentatives() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['legal_representatives'] = $values;
        $dataArray['document_type'] = $data->getDocumentType();

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CompanyCertificateExtraction::class => false];
    }
}
