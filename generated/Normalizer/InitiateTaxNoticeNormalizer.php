<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AnalysisTypeMultipart;
use Qdequippe\Yousign\Api\Model\InitiateTaxNotice;
use Qdequippe\Yousign\Api\Model\InitiateTaxNoticeChecks;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateTaxNoticeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateTaxNotice::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateTaxNotice::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateTaxNotice();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
        }
        if (\array_key_exists('workflow_session_id', $data) && null !== $data['workflow_session_id']) {
            $object->setWorkflowSessionId($data['workflow_session_id']);
        } elseif (\array_key_exists('workflow_session_id', $data) && null === $data['workflow_session_id']) {
            $object->setWorkflowSessionId(null);
        }
        if (\array_key_exists('previous_attempt_id', $data) && null !== $data['previous_attempt_id']) {
            $object->setPreviousAttemptId($data['previous_attempt_id']);
        } elseif (\array_key_exists('previous_attempt_id', $data) && null === $data['previous_attempt_id']) {
            $object->setPreviousAttemptId(null);
        }
        if (\array_key_exists('analysis_type', $data) && null !== $data['analysis_type']) {
            $object->setAnalysisType($this->denormalizer->denormalize($data['analysis_type'], AnalysisTypeMultipart::class, 'json', $context));
        } elseif (\array_key_exists('analysis_type', $data) && null === $data['analysis_type']) {
            $object->setAnalysisType(null);
        }
        if (\array_key_exists('checks', $data) && null !== $data['checks']) {
            $object->setChecks($this->denormalizer->denormalize($data['checks'], InitiateTaxNoticeChecks::class, 'json', $context));
        } elseif (\array_key_exists('checks', $data) && null === $data['checks']) {
            $object->setChecks(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['file'] = $data->getFile();
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('countryCode') && null !== $data->getCountryCode()) {
            $dataArray['country_code'] = $data->getCountryCode();
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        if ($data->isInitialized('workflowSessionId') && null !== $data->getWorkflowSessionId()) {
            $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        }
        if ($data->isInitialized('previousAttemptId') && null !== $data->getPreviousAttemptId()) {
            $dataArray['previous_attempt_id'] = $data->getPreviousAttemptId();
        }
        if ($data->isInitialized('analysisType') && null !== $data->getAnalysisType()) {
            $dataArray['analysis_type'] = null === $data->getAnalysisType() ? null : new JsonObject($this->normalizer->normalize($data->getAnalysisType(), 'json', $context));
        }
        if ($data->isInitialized('checks') && null !== $data->getChecks()) {
            $dataArray['checks'] = null === $data->getChecks() ? null : new JsonObject($this->normalizer->normalize($data->getChecks(), 'json', $context));
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateTaxNotice::class => false];
    }
}
