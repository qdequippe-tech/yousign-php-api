<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AnalysisType;
use Qdequippe\Yousign\Api\Model\DocumentClassification;
use Qdequippe\Yousign\Api\Model\FraudRiskAnalysis;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocument;
use Qdequippe\Yousign\Api\Model\ItalianVehicleRegistrationDocumentExtraction;
use Qdequippe\Yousign\Api\Model\VehicleRegistrationDocumentCheck;
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

class ItalianVehicleRegistrationDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItalianVehicleRegistrationDocument::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ItalianVehicleRegistrationDocument::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ItalianVehicleRegistrationDocument();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('data_anonymized', $data) && \is_int($data['data_anonymized'])) {
            $data['data_anonymized'] = (bool) $data['data_anonymized'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('workflow_session_id', $data) && null !== $data['workflow_session_id']) {
            $object->setWorkflowSessionId($data['workflow_session_id']);
            unset($data['workflow_session_id']);
        } elseif (\array_key_exists('workflow_session_id', $data) && null === $data['workflow_session_id']) {
            $object->setWorkflowSessionId(null);
            unset($data['workflow_session_id']);
        }
        if (\array_key_exists('previous_attempt_id', $data) && null !== $data['previous_attempt_id']) {
            $object->setPreviousAttemptId($data['previous_attempt_id']);
            unset($data['previous_attempt_id']);
        } elseif (\array_key_exists('previous_attempt_id', $data) && null === $data['previous_attempt_id']) {
            $object->setPreviousAttemptId(null);
            unset($data['previous_attempt_id']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('updated_at', $data) && null !== $data['updated_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['updated_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['updated_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setUpdatedAt($date_1);
            unset($data['updated_at']);
        } elseif (\array_key_exists('updated_at', $data) && null === $data['updated_at']) {
            $object->setUpdatedAt(null);
            unset($data['updated_at']);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
        }
        if (\array_key_exists('status_codes', $data) && null !== $data['status_codes']) {
            $values = [];
            foreach ($data['status_codes'] as $value) {
                $values[] = $value;
            }
            $object->setStatusCodes($values);
            unset($data['status_codes']);
        } elseif (\array_key_exists('status_codes', $data) && null === $data['status_codes']) {
            $object->setStatusCodes(null);
            unset($data['status_codes']);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
            unset($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
            unset($data['country_code']);
        }
        if (\array_key_exists('applicant_id', $data) && null !== $data['applicant_id']) {
            $object->setApplicantId($data['applicant_id']);
            unset($data['applicant_id']);
        } elseif (\array_key_exists('applicant_id', $data) && null === $data['applicant_id']) {
            $object->setApplicantId(null);
            unset($data['applicant_id']);
        }
        if (\array_key_exists('data_anonymized', $data) && null !== $data['data_anonymized']) {
            $object->setDataAnonymized($data['data_anonymized']);
            unset($data['data_anonymized']);
        } elseif (\array_key_exists('data_anonymized', $data) && null === $data['data_anonymized']) {
            $object->setDataAnonymized(null);
            unset($data['data_anonymized']);
        }
        if (\array_key_exists('analysis_type', $data) && null !== $data['analysis_type']) {
            $object->setAnalysisType($this->denormalizer->denormalize($data['analysis_type'], AnalysisType::class, 'json', $context));
            unset($data['analysis_type']);
        } elseif (\array_key_exists('analysis_type', $data) && null === $data['analysis_type']) {
            $object->setAnalysisType(null);
            unset($data['analysis_type']);
        }
        if (\array_key_exists('fraud_risk_analysis', $data) && null !== $data['fraud_risk_analysis']) {
            $object->setFraudRiskAnalysis($this->denormalizer->denormalize($data['fraud_risk_analysis'], FraudRiskAnalysis::class, 'json', $context));
            unset($data['fraud_risk_analysis']);
        } elseif (\array_key_exists('fraud_risk_analysis', $data) && null === $data['fraud_risk_analysis']) {
            $object->setFraudRiskAnalysis(null);
            unset($data['fraud_risk_analysis']);
        }
        if (\array_key_exists('document_classification', $data) && null !== $data['document_classification']) {
            $object->setDocumentClassification($this->denormalizer->denormalize($data['document_classification'], DocumentClassification::class, 'json', $context));
            unset($data['document_classification']);
        } elseif (\array_key_exists('document_classification', $data) && null === $data['document_classification']) {
            $object->setDocumentClassification(null);
            unset($data['document_classification']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
            $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], ItalianVehicleRegistrationDocumentExtraction::class, 'json', $context));
            unset($data['extracted_from_document']);
        } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
            $object->setExtractedFromDocument(null);
            unset($data['extracted_from_document']);
        }
        if (\array_key_exists('checks', $data) && null !== $data['checks']) {
            $object->setChecks($this->denormalizer->denormalize($data['checks'], VehicleRegistrationDocumentCheck::class, 'json', $context));
            unset($data['checks']);
        } elseif (\array_key_exists('checks', $data) && null === $data['checks']) {
            $object->setChecks(null);
            unset($data['checks']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['workspace_id'] = $data->getWorkspaceId();
        $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        $dataArray['previous_attempt_id'] = $data->getPreviousAttemptId();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['updated_at'] = $data->getUpdatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['status'] = $data->getStatus();
        $values = [];
        foreach ($data->getStatusCodes() as $value) {
            $values[] = $value;
        }
        $dataArray['status_codes'] = $values;
        if ($data->isInitialized('countryCode') && null !== $data->getCountryCode()) {
            $dataArray['country_code'] = $data->getCountryCode();
        }
        $dataArray['applicant_id'] = $data->getApplicantId();
        $dataArray['data_anonymized'] = $data->getDataAnonymized();
        if ($data->isInitialized('analysisType') && null !== $data->getAnalysisType()) {
            $dataArray['analysis_type'] = null === $data->getAnalysisType() ? null : new JsonObject($this->normalizer->normalize($data->getAnalysisType(), 'json', $context));
        }
        if ($data->isInitialized('fraudRiskAnalysis') && null !== $data->getFraudRiskAnalysis()) {
            $dataArray['fraud_risk_analysis'] = null === $data->getFraudRiskAnalysis() ? null : new JsonObject($this->normalizer->normalize($data->getFraudRiskAnalysis(), 'json', $context));
        }
        if ($data->isInitialized('documentClassification') && null !== $data->getDocumentClassification()) {
            $dataArray['document_classification'] = null === $data->getDocumentClassification() ? null : new JsonObject($this->normalizer->normalize($data->getDocumentClassification(), 'json', $context));
        }
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['type'] = $data->getType();
        }
        if ($data->isInitialized('extractedFromDocument') && null !== $data->getExtractedFromDocument()) {
            $dataArray['extracted_from_document'] = null === $data->getExtractedFromDocument() ? null : new JsonObject($this->normalizer->normalize($data->getExtractedFromDocument(), 'json', $context));
        }
        if ($data->isInitialized('checks') && null !== $data->getChecks()) {
            $dataArray['checks'] = null === $data->getChecks() ? null : new JsonObject($this->normalizer->normalize($data->getChecks(), 'json', $context));
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ItalianVehicleRegistrationDocument::class => false];
    }
}
