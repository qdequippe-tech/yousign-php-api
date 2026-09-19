<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CustomPropertyOptionUpdate;
use Qdequippe\Yousign\Api\Model\UpdateCustomProperty;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateCustomPropertyNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateCustomProperty::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateCustomProperty::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateCustomProperty();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('multiple_answer_allowed', $data) && \is_int($data['multiple_answer_allowed'])) {
            $data['multiple_answer_allowed'] = (bool) $data['multiple_answer_allowed'];
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('multiple_answer_allowed', $data) && null !== $data['multiple_answer_allowed']) {
            $object->setMultipleAnswerAllowed($data['multiple_answer_allowed']);
        } elseif (\array_key_exists('multiple_answer_allowed', $data) && null === $data['multiple_answer_allowed']) {
            $object->setMultipleAnswerAllowed(null);
        }
        if (\array_key_exists('default_value', $data) && null !== $data['default_value']) {
            $object->setDefaultValue($data['default_value']);
        } elseif (\array_key_exists('default_value', $data) && null === $data['default_value']) {
            $object->setDefaultValue(null);
        }
        if (\array_key_exists('options', $data) && null !== $data['options']) {
            $values = [];
            foreach ($data['options'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CustomPropertyOptionUpdate::class, 'json', $context);
            }
            $object->setOptions($values);
        } elseif (\array_key_exists('options', $data) && null === $data['options']) {
            $object->setOptions(null);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $values_1 = [];
            foreach ($data['workspaces'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setWorkspaces($values_1);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('type') && null !== $data->getType()) {
            $dataArray['type'] = $data->getType();
        }
        if ($data->isInitialized('multipleAnswerAllowed') && null !== $data->getMultipleAnswerAllowed()) {
            $dataArray['multiple_answer_allowed'] = $data->getMultipleAnswerAllowed();
        }
        if ($data->isInitialized('defaultValue') && null !== $data->getDefaultValue()) {
            $dataArray['default_value'] = $data->getDefaultValue();
        }
        if ($data->isInitialized('options') && null !== $data->getOptions()) {
            $values = [];
            foreach ($data->getOptions() as $value) {
                $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['options'] = $values;
        }
        if ($data->isInitialized('workspaces') && null !== $data->getWorkspaces()) {
            $values_1 = [];
            foreach ($data->getWorkspaces() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['workspaces'] = $values_1;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateCustomProperty::class => false];
    }
}
