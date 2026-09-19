<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtraction;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtractionBranchDescription;
use Qdequippe\Yousign\Api\Model\BusinessRegistrationCertificateExtractionCompanyDescription;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class BusinessRegistrationCertificateExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return BusinessRegistrationCertificateExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && BusinessRegistrationCertificateExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new BusinessRegistrationCertificateExtraction();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $object->setIssuanceDate($data['issuance_date']);
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
        }
        if (\array_key_exists('company_description', $data) && null !== $data['company_description']) {
            $object->setCompanyDescription($this->denormalizer->denormalize($data['company_description'], BusinessRegistrationCertificateExtractionCompanyDescription::class, 'json', $context));
        } elseif (\array_key_exists('company_description', $data) && null === $data['company_description']) {
            $object->setCompanyDescription(null);
        }
        if (\array_key_exists('branch_description', $data) && null !== $data['branch_description']) {
            $object->setBranchDescription($this->denormalizer->denormalize($data['branch_description'], BusinessRegistrationCertificateExtractionBranchDescription::class, 'json', $context));
        } elseif (\array_key_exists('branch_description', $data) && null === $data['branch_description']) {
            $object->setBranchDescription(null);
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
        return ['issuance_date' => $data->getIssuanceDate(), 'company_description' => null === $data->getCompanyDescription() ? null : new JsonObject($this->normalizer->normalize($data->getCompanyDescription(), 'json', $context)), 'branch_description' => null === $data->getBranchDescription() ? null : new JsonObject($this->normalizer->normalize($data->getBranchDescription(), 'json', $context)), 'document_type' => $data->getDocumentType()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [BusinessRegistrationCertificateExtraction::class => false];
    }
}
