<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\WorkflowTemplate;
use Qdequippe\Yousign\Api\Model\WorkflowTemplateActionGroupsInner;
use Qdequippe\Yousign\Api\Model\WorkflowTemplateWorkspacesInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WorkflowTemplateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return WorkflowTemplate::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && WorkflowTemplate::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new WorkflowTemplate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('action_groups', $data) && null !== $data['action_groups']) {
            $values = [];
            foreach ($data['action_groups'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, WorkflowTemplateActionGroupsInner::class, 'json', $context);
            }
            $object->setActionGroups($values);
            unset($data['action_groups']);
        } elseif (\array_key_exists('action_groups', $data) && null === $data['action_groups']) {
            $object->setActionGroups(null);
            unset($data['action_groups']);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $values_1 = [];
            foreach ($data['workspaces'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, WorkflowTemplateWorkspacesInner::class, 'json', $context);
            }
            $object->setWorkspaces($values_1);
            unset($data['workspaces']);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
            unset($data['workspaces']);
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
        $values = [];
        foreach ($data->getActionGroups() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['action_groups'] = $values;
        $values_1 = [];
        foreach ($data->getWorkspaces() as $value_1) {
            $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
        }
        $dataArray['workspaces'] = $values_1;
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [WorkflowTemplate::class => false];
    }
}
