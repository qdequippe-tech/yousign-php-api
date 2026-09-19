<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitiateIdentityDocument;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateIdentityDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateIdentityDocument::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateIdentityDocument::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateIdentityDocument();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
        }
        if (\array_key_exists('additional_file', $data) && null !== $data['additional_file']) {
            $object->setAdditionalFile($data['additional_file']);
        } elseif (\array_key_exists('additional_file', $data) && null === $data['additional_file']) {
            $object->setAdditionalFile(null);
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

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['first_name'] = $data->getFirstName();
        $dataArray['last_name'] = $data->getLastName();
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['type'] = $data->getType();
        }
        $dataArray['file'] = $data->getFile();
        if ($data->isInitialized('additionalFile') && null !== $data->getAdditionalFile()) {
            $dataArray['additional_file'] = $data->getAdditionalFile();
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

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateIdentityDocument::class => false];
    }
}
