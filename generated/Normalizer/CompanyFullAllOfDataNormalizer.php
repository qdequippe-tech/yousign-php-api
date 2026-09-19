<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfData;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataBeneficialOwners;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformation;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataHeadquarter;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataLegalRepresentatives;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CompanyFullAllOfDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CompanyFullAllOfData::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CompanyFullAllOfData::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CompanyFullAllOfData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
            $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], CompanyFullAllOfDataExtractedFromDocument::class, 'json', $context));
            unset($data['extracted_from_document']);
        } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
            $object->setExtractedFromDocument(null);
            unset($data['extracted_from_document']);
        }
        if (\array_key_exists('company_information', $data) && null !== $data['company_information']) {
            $object->setCompanyInformation($this->denormalizer->denormalize($data['company_information'], CompanyFullAllOfDataCompanyInformation::class, 'json', $context));
            unset($data['company_information']);
        } elseif (\array_key_exists('company_information', $data) && null === $data['company_information']) {
            $object->setCompanyInformation(null);
            unset($data['company_information']);
        }
        if (\array_key_exists('headquarter', $data) && null !== $data['headquarter']) {
            $object->setHeadquarter($this->denormalizer->denormalize($data['headquarter'], CompanyFullAllOfDataHeadquarter::class, 'json', $context));
            unset($data['headquarter']);
        } elseif (\array_key_exists('headquarter', $data) && null === $data['headquarter']) {
            $object->setHeadquarter(null);
            unset($data['headquarter']);
        }
        if (\array_key_exists('legal_representatives', $data) && null !== $data['legal_representatives']) {
            $values = [];
            foreach ($data['legal_representatives'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CompanyFullAllOfDataLegalRepresentatives::class, 'json', $context);
            }
            $object->setLegalRepresentatives($values);
            unset($data['legal_representatives']);
        } elseif (\array_key_exists('legal_representatives', $data) && null === $data['legal_representatives']) {
            $object->setLegalRepresentatives(null);
            unset($data['legal_representatives']);
        }
        if (\array_key_exists('beneficial_owners', $data) && null !== $data['beneficial_owners']) {
            $values_1 = [];
            foreach ($data['beneficial_owners'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, CompanyFullAllOfDataBeneficialOwners::class, 'json', $context);
            }
            $object->setBeneficialOwners($values_1);
            unset($data['beneficial_owners']);
        } elseif (\array_key_exists('beneficial_owners', $data) && null === $data['beneficial_owners']) {
            $object->setBeneficialOwners(null);
            unset($data['beneficial_owners']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('extractedFromDocument') && null !== $data->getExtractedFromDocument()) {
            $dataArray['extracted_from_document'] = null === $data->getExtractedFromDocument() ? null : new JsonObject($this->normalizer->normalize($data->getExtractedFromDocument(), 'json', $context));
        }
        if ($data->isInitialized('companyInformation') && null !== $data->getCompanyInformation()) {
            $dataArray['company_information'] = null === $data->getCompanyInformation() ? null : new JsonObject($this->normalizer->normalize($data->getCompanyInformation(), 'json', $context));
        }
        if ($data->isInitialized('headquarter') && null !== $data->getHeadquarter()) {
            $dataArray['headquarter'] = null === $data->getHeadquarter() ? null : new JsonObject($this->normalizer->normalize($data->getHeadquarter(), 'json', $context));
        }
        if ($data->isInitialized('legalRepresentatives') && null !== $data->getLegalRepresentatives()) {
            $values = [];
            foreach ($data->getLegalRepresentatives() as $value) {
                $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['legal_representatives'] = $values;
        }
        if ($data->isInitialized('beneficialOwners') && null !== $data->getBeneficialOwners()) {
            $values_1 = [];
            foreach ($data->getBeneficialOwners() as $value_1) {
                $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['beneficial_owners'] = $values_1;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CompanyFullAllOfData::class => false];
    }
}
