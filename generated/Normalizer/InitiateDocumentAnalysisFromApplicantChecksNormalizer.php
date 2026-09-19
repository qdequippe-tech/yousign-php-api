<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicantChecks;
use Qdequippe\Yousign\Api\Model\InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateDocumentAnalysisFromApplicantChecksNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateDocumentAnalysisFromApplicantChecks::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateDocumentAnalysisFromApplicantChecks::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateDocumentAnalysisFromApplicantChecks();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('income_year_check', $data) && null !== $data['income_year_check']) {
            $object->setIncomeYearCheck($this->denormalizer->denormalize($data['income_year_check'], InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck::class, 'json', $context));
        } elseif (\array_key_exists('income_year_check', $data) && null === $data['income_year_check']) {
            $object->setIncomeYearCheck(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('incomeYearCheck') && null !== $data->getIncomeYearCheck()) {
            $dataArray['income_year_check'] = null === $data->getIncomeYearCheck() ? null : new JsonObject($this->normalizer->normalize($data->getIncomeYearCheck(), 'json', $context));
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateDocumentAnalysisFromApplicantChecks::class => false];
    }
}
