<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AnalysisType;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicant;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicantChecks;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateDocumentAnalysisFromApplicantNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateDocumentAnalysisFromApplicant::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateDocumentAnalysisFromApplicant::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateDocumentAnalysisFromApplicant();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('applicant_id', $data) && null !== $data['applicant_id']) {
            $object->setApplicantId($data['applicant_id']);
        } elseif (\array_key_exists('applicant_id', $data) && null === $data['applicant_id']) {
            $object->setApplicantId(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('analysis_type', $data) && null !== $data['analysis_type']) {
            $object->setAnalysisType($this->denormalizer->denormalize($data['analysis_type'], AnalysisType::class, 'json', $context));
        } elseif (\array_key_exists('analysis_type', $data) && null === $data['analysis_type']) {
            $object->setAnalysisType(null);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('checks', $data) && null !== $data['checks']) {
            $object->setChecks($this->denormalizer->denormalize($data['checks'], InitiateDocumentAnalysisFromApplicantChecks::class, 'json', $context));
        } elseif (\array_key_exists('checks', $data) && null === $data['checks']) {
            $object->setChecks(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['applicant_id'] = $data->getApplicantId();
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('analysisType') && null !== $data->getAnalysisType()) {
            $dataArray['analysis_type'] = null === $data->getAnalysisType() ? null : new JsonObject($this->normalizer->normalize($data->getAnalysisType(), 'json', $context));
        }
        if ($data->isInitialized('countryCode') && null !== $data->getCountryCode()) {
            $dataArray['country_code'] = $data->getCountryCode();
        }
        if ($data->isInitialized('checks') && null !== $data->getChecks()) {
            $dataArray['checks'] = null === $data->getChecks() ? null : new JsonObject($this->normalizer->normalize($data->getChecks(), 'json', $context));
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateDocumentAnalysisFromApplicant::class => false];
    }
}
