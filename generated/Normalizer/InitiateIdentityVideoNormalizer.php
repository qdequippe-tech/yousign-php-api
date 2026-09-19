<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitiateIdentityVideo;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateIdentityVideoNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateIdentityVideo::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateIdentityVideo::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateIdentityVideo();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('face_recognition', $data) && \is_int($data['face_recognition'])) {
            $data['face_recognition'] = (bool) $data['face_recognition'];
        }
        if (\array_key_exists('pvid', $data) && \is_int($data['pvid'])) {
            $data['pvid'] = (bool) $data['pvid'];
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
        if (\array_key_exists('redirection_url', $data) && null !== $data['redirection_url']) {
            $object->setRedirectionUrl($data['redirection_url']);
        } elseif (\array_key_exists('redirection_url', $data) && null === $data['redirection_url']) {
            $object->setRedirectionUrl(null);
        }
        if (\array_key_exists('face_recognition', $data) && null !== $data['face_recognition']) {
            $object->setFaceRecognition($data['face_recognition']);
        } elseif (\array_key_exists('face_recognition', $data) && null === $data['face_recognition']) {
            $object->setFaceRecognition(null);
        }
        if (\array_key_exists('pvid', $data) && null !== $data['pvid']) {
            $object->setPvid($data['pvid']);
        } elseif (\array_key_exists('pvid', $data) && null === $data['pvid']) {
            $object->setPvid(null);
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
        if (\array_key_exists('min_age', $data) && null !== $data['min_age']) {
            $object->setMinAge($data['min_age']);
        } elseif (\array_key_exists('min_age', $data) && null === $data['min_age']) {
            $object->setMinAge(null);
        }
        if (\array_key_exists('max_age', $data) && null !== $data['max_age']) {
            $object->setMaxAge($data['max_age']);
        } elseif (\array_key_exists('max_age', $data) && null === $data['max_age']) {
            $object->setMaxAge(null);
        }
        if (\array_key_exists('prohibited_countries', $data) && null !== $data['prohibited_countries']) {
            $values = [];
            foreach ($data['prohibited_countries'] as $value) {
                $values[] = $value;
            }
            $object->setProhibitedCountries($values);
        } elseif (\array_key_exists('prohibited_countries', $data) && null === $data['prohibited_countries']) {
            $object->setProhibitedCountries(null);
        }
        if (\array_key_exists('pre_selected_residence_country_code', $data) && null !== $data['pre_selected_residence_country_code']) {
            $object->setPreSelectedResidenceCountryCode($data['pre_selected_residence_country_code']);
        } elseif (\array_key_exists('pre_selected_residence_country_code', $data) && null === $data['pre_selected_residence_country_code']) {
            $object->setPreSelectedResidenceCountryCode(null);
        }
        if (\array_key_exists('pre_selected_document_issuing_country_code', $data) && null !== $data['pre_selected_document_issuing_country_code']) {
            $object->setPreSelectedDocumentIssuingCountryCode($data['pre_selected_document_issuing_country_code']);
        } elseif (\array_key_exists('pre_selected_document_issuing_country_code', $data) && null === $data['pre_selected_document_issuing_country_code']) {
            $object->setPreSelectedDocumentIssuingCountryCode(null);
        }
        if (\array_key_exists('pre_selected_document_type', $data) && null !== $data['pre_selected_document_type']) {
            $object->setPreSelectedDocumentType($data['pre_selected_document_type']);
        } elseif (\array_key_exists('pre_selected_document_type', $data) && null === $data['pre_selected_document_type']) {
            $object->setPreSelectedDocumentType(null);
        }
        if (\array_key_exists('pre_selected_locale', $data) && null !== $data['pre_selected_locale']) {
            $object->setPreSelectedLocale($data['pre_selected_locale']);
        } elseif (\array_key_exists('pre_selected_locale', $data) && null === $data['pre_selected_locale']) {
            $object->setPreSelectedLocale(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['first_name'] = $data->getFirstName();
        $dataArray['last_name'] = $data->getLastName();
        $dataArray['redirection_url'] = $data->getRedirectionUrl();
        if ($data->isInitialized('faceRecognition') && null !== $data->getFaceRecognition()) {
            $dataArray['face_recognition'] = $data->getFaceRecognition();
        }
        if ($data->isInitialized('pvid') && null !== $data->getPvid()) {
            $dataArray['pvid'] = $data->getPvid();
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
        if ($data->isInitialized('minAge') && null !== $data->getMinAge()) {
            $dataArray['min_age'] = $data->getMinAge();
        }
        if ($data->isInitialized('maxAge') && null !== $data->getMaxAge()) {
            $dataArray['max_age'] = $data->getMaxAge();
        }
        if ($data->isInitialized('prohibitedCountries') && null !== $data->getProhibitedCountries()) {
            $values = [];
            foreach ($data->getProhibitedCountries() as $value) {
                $values[] = $value;
            }
            $dataArray['prohibited_countries'] = $values;
        }
        if ($data->isInitialized('preSelectedResidenceCountryCode') && null !== $data->getPreSelectedResidenceCountryCode()) {
            $dataArray['pre_selected_residence_country_code'] = $data->getPreSelectedResidenceCountryCode();
        }
        if ($data->isInitialized('preSelectedDocumentIssuingCountryCode') && null !== $data->getPreSelectedDocumentIssuingCountryCode()) {
            $dataArray['pre_selected_document_issuing_country_code'] = $data->getPreSelectedDocumentIssuingCountryCode();
        }
        if ($data->isInitialized('preSelectedDocumentType') && null !== $data->getPreSelectedDocumentType()) {
            $dataArray['pre_selected_document_type'] = $data->getPreSelectedDocumentType();
        }
        if ($data->isInitialized('preSelectedLocale') && null !== $data->getPreSelectedLocale()) {
            $dataArray['pre_selected_locale'] = $data->getPreSelectedLocale();
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateIdentityVideo::class => false];
    }
}
