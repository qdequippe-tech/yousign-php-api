<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformation;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationActivities;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationCommercialRegistration;
use Qdequippe\Yousign\Api\Model\CompanyFullAllOfDataCompanyInformationLegalForm;
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

class CompanyFullAllOfDataCompanyInformationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CompanyFullAllOfDataCompanyInformation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CompanyFullAllOfDataCompanyInformation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CompanyFullAllOfDataCompanyInformation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('partial_data', $data) && \is_int($data['partial_data'])) {
            $data['partial_data'] = (bool) $data['partial_data'];
        }
        if (\array_key_exists('active', $data) && \is_int($data['active'])) {
            $data['active'] = (bool) $data['active'];
        }
        if (\array_key_exists('has_workforce', $data) && \is_int($data['has_workforce'])) {
            $data['has_workforce'] = (bool) $data['has_workforce'];
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('trade_name', $data) && null !== $data['trade_name']) {
            $object->setTradeName($data['trade_name']);
            unset($data['trade_name']);
        } elseif (\array_key_exists('trade_name', $data) && null === $data['trade_name']) {
            $object->setTradeName(null);
            unset($data['trade_name']);
        }
        if (\array_key_exists('company_number', $data) && null !== $data['company_number']) {
            $object->setCompanyNumber($data['company_number']);
            unset($data['company_number']);
        } elseif (\array_key_exists('company_number', $data) && null === $data['company_number']) {
            $object->setCompanyNumber(null);
            unset($data['company_number']);
        }
        if (\array_key_exists('partial_data', $data) && null !== $data['partial_data']) {
            $object->setPartialData($data['partial_data']);
            unset($data['partial_data']);
        } elseif (\array_key_exists('partial_data', $data) && null === $data['partial_data']) {
            $object->setPartialData(null);
            unset($data['partial_data']);
        }
        if (\array_key_exists('required_document_type', $data) && null !== $data['required_document_type']) {
            $values = [];
            foreach ($data['required_document_type'] as $value) {
                $values[] = $value;
            }
            $object->setRequiredDocumentType($values);
            unset($data['required_document_type']);
        } elseif (\array_key_exists('required_document_type', $data) && null === $data['required_document_type']) {
            $object->setRequiredDocumentType(null);
            unset($data['required_document_type']);
        }
        if (\array_key_exists('legal_form', $data) && null !== $data['legal_form']) {
            $object->setLegalForm($this->denormalizer->denormalize($data['legal_form'], CompanyFullAllOfDataCompanyInformationLegalForm::class, 'json', $context));
            unset($data['legal_form']);
        } elseif (\array_key_exists('legal_form', $data) && null === $data['legal_form']) {
            $object->setLegalForm(null);
            unset($data['legal_form']);
        }
        if (\array_key_exists('vat_number', $data) && null !== $data['vat_number']) {
            $object->setVatNumber($data['vat_number']);
            unset($data['vat_number']);
        } elseif (\array_key_exists('vat_number', $data) && null === $data['vat_number']) {
            $object->setVatNumber(null);
            unset($data['vat_number']);
        }
        if (\array_key_exists('activities', $data) && null !== $data['activities']) {
            $values_1 = [];
            foreach ($data['activities'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, CompanyFullAllOfDataCompanyInformationActivities::class, 'json', $context);
            }
            $object->setActivities($values_1);
            unset($data['activities']);
        } elseif (\array_key_exists('activities', $data) && null === $data['activities']) {
            $object->setActivities(null);
            unset($data['activities']);
        }
        if (\array_key_exists('founded_on', $data) && null !== $data['founded_on']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['founded_on']);
            if (false === $date) {
                throw new InvalidDateException($data['founded_on'], 'Y-m-d');
            }
            $object->setFoundedOn($date->setTime(0, 0, 0));
            unset($data['founded_on']);
        } elseif (\array_key_exists('founded_on', $data) && null === $data['founded_on']) {
            $object->setFoundedOn(null);
            unset($data['founded_on']);
        }
        if (\array_key_exists('ceased_on', $data) && null !== $data['ceased_on']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['ceased_on']);
            if (false === $date_1) {
                throw new InvalidDateException($data['ceased_on'], 'Y-m-d');
            }
            $object->setCeasedOn($date_1->setTime(0, 0, 0));
            unset($data['ceased_on']);
        } elseif (\array_key_exists('ceased_on', $data) && null === $data['ceased_on']) {
            $object->setCeasedOn(null);
            unset($data['ceased_on']);
        }
        if (\array_key_exists('active', $data) && null !== $data['active']) {
            $object->setActive($data['active']);
            unset($data['active']);
        } elseif (\array_key_exists('active', $data) && null === $data['active']) {
            $object->setActive(null);
            unset($data['active']);
        }
        if (\array_key_exists('commercial_registration', $data) && null !== $data['commercial_registration']) {
            $object->setCommercialRegistration($this->denormalizer->denormalize($data['commercial_registration'], CompanyFullAllOfDataCompanyInformationCommercialRegistration::class, 'json', $context));
            unset($data['commercial_registration']);
        } elseif (\array_key_exists('commercial_registration', $data) && null === $data['commercial_registration']) {
            $object->setCommercialRegistration(null);
            unset($data['commercial_registration']);
        }
        if (\array_key_exists('has_workforce', $data) && null !== $data['has_workforce']) {
            $object->setHasWorkforce($data['has_workforce']);
            unset($data['has_workforce']);
        } elseif (\array_key_exists('has_workforce', $data) && null === $data['has_workforce']) {
            $object->setHasWorkforce(null);
            unset($data['has_workforce']);
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
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('tradeName') && null !== $data->getTradeName()) {
            $dataArray['trade_name'] = $data->getTradeName();
        }
        if ($data->isInitialized('companyNumber') && null !== $data->getCompanyNumber()) {
            $dataArray['company_number'] = $data->getCompanyNumber();
        }
        if ($data->isInitialized('partialData') && null !== $data->getPartialData()) {
            $dataArray['partial_data'] = $data->getPartialData();
        }
        if ($data->isInitialized('requiredDocumentType') && null !== $data->getRequiredDocumentType()) {
            $values = [];
            foreach ($data->getRequiredDocumentType() as $value) {
                $values[] = $value;
            }
            $dataArray['required_document_type'] = $values;
        }
        if ($data->isInitialized('legalForm') && null !== $data->getLegalForm()) {
            $dataArray['legal_form'] = null === $data->getLegalForm() ? null : new JsonObject($this->normalizer->normalize($data->getLegalForm(), 'json', $context));
        }
        if ($data->isInitialized('vatNumber') && null !== $data->getVatNumber()) {
            $dataArray['vat_number'] = $data->getVatNumber();
        }
        if ($data->isInitialized('activities') && null !== $data->getActivities()) {
            $values_1 = [];
            foreach ($data->getActivities() as $value_1) {
                $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['activities'] = $values_1;
        }
        if ($data->isInitialized('foundedOn') && null !== $data->getFoundedOn()) {
            $dataArray['founded_on'] = $data->getFoundedOn()?->format('Y-m-d');
        }
        if ($data->isInitialized('ceasedOn') && null !== $data->getCeasedOn()) {
            $dataArray['ceased_on'] = $data->getCeasedOn()?->format('Y-m-d');
        }
        if ($data->isInitialized('active') && null !== $data->getActive()) {
            $dataArray['active'] = $data->getActive();
        }
        if ($data->isInitialized('commercialRegistration') && null !== $data->getCommercialRegistration()) {
            $dataArray['commercial_registration'] = null === $data->getCommercialRegistration() ? null : new JsonObject($this->normalizer->normalize($data->getCommercialRegistration(), 'json', $context));
        }
        if ($data->isInitialized('hasWorkforce') && null !== $data->getHasWorkforce()) {
            $dataArray['has_workforce'] = $data->getHasWorkforce();
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
        return [CompanyFullAllOfDataCompanyInformation::class => false];
    }
}
