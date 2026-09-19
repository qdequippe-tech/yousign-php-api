<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\InitiateCompanyFromJson;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class InitiateCompanyFromJsonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return InitiateCompanyFromJson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && InitiateCompanyFromJson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new InitiateCompanyFromJson();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('company_number', $data) && null !== $data['company_number']) {
            $object->setCompanyNumber($data['company_number']);
            unset($data['company_number']);
        } elseif (\array_key_exists('company_number', $data) && null === $data['company_number']) {
            $object->setCompanyNumber(null);
            unset($data['company_number']);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
            unset($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
            unset($data['country_code']);
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
        if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
            $object->setCompanyName($data['company_name']);
            unset($data['company_name']);
        } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
            $object->setCompanyName(null);
            unset($data['company_name']);
        }
        if (\array_key_exists('zip_code', $data) && null !== $data['zip_code']) {
            $object->setZipCode($data['zip_code']);
            unset($data['zip_code']);
        } elseif (\array_key_exists('zip_code', $data) && null === $data['zip_code']) {
            $object->setZipCode(null);
            unset($data['zip_code']);
        }
        if (\array_key_exists('street', $data) && null !== $data['street']) {
            $object->setStreet($data['street']);
            unset($data['street']);
        } elseif (\array_key_exists('street', $data) && null === $data['street']) {
            $object->setStreet(null);
            unset($data['street']);
        }
        if (\array_key_exists('city', $data) && null !== $data['city']) {
            $object->setCity($data['city']);
            unset($data['city']);
        } elseif (\array_key_exists('city', $data) && null === $data['city']) {
            $object->setCity(null);
            unset($data['city']);
        }
        if (\array_key_exists('register_court', $data) && null !== $data['register_court']) {
            $object->setRegisterCourt($data['register_court']);
            unset($data['register_court']);
        } elseif (\array_key_exists('register_court', $data) && null === $data['register_court']) {
            $object->setRegisterCourt(null);
            unset($data['register_court']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['company_number'] = $data->getCompanyNumber();
        $dataArray['country_code'] = $data->getCountryCode();
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        if ($data->isInitialized('workflowSessionId') && null !== $data->getWorkflowSessionId()) {
            $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        }
        if ($data->isInitialized('previousAttemptId') && null !== $data->getPreviousAttemptId()) {
            $dataArray['previous_attempt_id'] = $data->getPreviousAttemptId();
        }
        if ($data->isInitialized('companyName') && null !== $data->getCompanyName()) {
            $dataArray['company_name'] = $data->getCompanyName();
        }
        if ($data->isInitialized('zipCode') && null !== $data->getZipCode()) {
            $dataArray['zip_code'] = $data->getZipCode();
        }
        if ($data->isInitialized('street') && null !== $data->getStreet()) {
            $dataArray['street'] = $data->getStreet();
        }
        if ($data->isInitialized('city') && null !== $data->getCity()) {
            $dataArray['city'] = $data->getCity();
        }
        if ($data->isInitialized('registerCourt') && null !== $data->getRegisterCourt()) {
            $dataArray['register_court'] = $data->getRegisterCourt();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [InitiateCompanyFromJson::class => false];
    }
}
