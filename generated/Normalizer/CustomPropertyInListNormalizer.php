<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CustomPropertyInList;
use Qdequippe\Yousign\Api\Model\CustomPropertyOption;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CustomPropertyInListNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CustomPropertyInList::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CustomPropertyInList::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CustomPropertyInList();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('required', $data) && \is_int($data['required'])) {
            $data['required'] = (bool) $data['required'];
        }
        if (\array_key_exists('multiple_answer_allowed', $data) && \is_int($data['multiple_answer_allowed'])) {
            $data['multiple_answer_allowed'] = (bool) $data['multiple_answer_allowed'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('required', $data) && null !== $data['required']) {
            $object->setRequired($data['required']);
            unset($data['required']);
        } elseif (\array_key_exists('required', $data) && null === $data['required']) {
            $object->setRequired(null);
            unset($data['required']);
        }
        if (\array_key_exists('multiple_answer_allowed', $data) && null !== $data['multiple_answer_allowed']) {
            $object->setMultipleAnswerAllowed($data['multiple_answer_allowed']);
            unset($data['multiple_answer_allowed']);
        } elseif (\array_key_exists('multiple_answer_allowed', $data) && null === $data['multiple_answer_allowed']) {
            $object->setMultipleAnswerAllowed(null);
            unset($data['multiple_answer_allowed']);
        }
        if (\array_key_exists('workspace_ids', $data) && null !== $data['workspace_ids']) {
            $values = [];
            foreach ($data['workspace_ids'] as $value) {
                $values[] = $value;
            }
            $object->setWorkspaceIds($values);
            unset($data['workspace_ids']);
        } elseif (\array_key_exists('workspace_ids', $data) && null === $data['workspace_ids']) {
            $object->setWorkspaceIds(null);
            unset($data['workspace_ids']);
        }
        if (\array_key_exists('default_value', $data) && null !== $data['default_value']) {
            $object->setDefaultValue($data['default_value']);
            unset($data['default_value']);
        } elseif (\array_key_exists('default_value', $data) && null === $data['default_value']) {
            $object->setDefaultValue(null);
            unset($data['default_value']);
        }
        if (\array_key_exists('options', $data) && null !== $data['options']) {
            $values_1 = [];
            foreach ($data['options'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, CustomPropertyOption::class, 'json', $context);
            }
            $object->setOptions($values_1);
            unset($data['options']);
        } elseif (\array_key_exists('options', $data) && null === $data['options']) {
            $object->setOptions(null);
            unset($data['options']);
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
        $dataArray['id'] = $data->getId();
        $dataArray['name'] = $data->getName();
        $dataArray['type'] = $data->getType();
        if ($data->isInitialized('required') && null !== $data->getRequired()) {
            $dataArray['required'] = $data->getRequired();
        }
        if ($data->isInitialized('multipleAnswerAllowed') && null !== $data->getMultipleAnswerAllowed()) {
            $dataArray['multiple_answer_allowed'] = $data->getMultipleAnswerAllowed();
        }
        if ($data->isInitialized('workspaceIds') && null !== $data->getWorkspaceIds()) {
            $values = [];
            foreach ($data->getWorkspaceIds() as $value) {
                $values[] = $value;
            }
            $dataArray['workspace_ids'] = $values;
        }
        if ($data->isInitialized('defaultValue') && null !== $data->getDefaultValue()) {
            $dataArray['default_value'] = $data->getDefaultValue();
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values_1 = [];
            foreach ($data->getOptions() as $value_1) {
                $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['options'] = $values_1;
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
        return [CustomPropertyInList::class => false];
    }
}
