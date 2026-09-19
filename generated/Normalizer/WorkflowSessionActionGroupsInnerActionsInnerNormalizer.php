<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInner;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionGroupsInnerActionsInnerResolution;
use Qdequippe\Yousign\Api\Model\WorkflowSessionActionResource;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WorkflowSessionActionGroupsInnerActionsInnerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return WorkflowSessionActionGroupsInnerActionsInner::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && WorkflowSessionActionGroupsInnerActionsInner::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new WorkflowSessionActionGroupsInnerActionsInner();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('resource', $data) && null !== $data['resource']) {
            $object->setResource($this->denormalizer->denormalize($data['resource'], WorkflowSessionActionResource::class, 'json', $context));
            unset($data['resource']);
        } elseif (\array_key_exists('resource', $data) && null === $data['resource']) {
            $object->setResource(null);
            unset($data['resource']);
        }
        if (\array_key_exists('resolution', $data) && null !== $data['resolution']) {
            $object->setResolution($this->denormalizer->denormalize($data['resolution'], WorkflowSessionActionGroupsInnerActionsInnerResolution::class, 'json', $context));
            unset($data['resolution']);
        } elseif (\array_key_exists('resolution', $data) && null === $data['resolution']) {
            $object->setResolution(null);
            unset($data['resolution']);
        }
        if (\array_key_exists('previous_attempts', $data) && null !== $data['previous_attempts']) {
            $values = [];
            foreach ($data['previous_attempts'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner::class, 'json', $context);
            }
            $object->setPreviousAttempts($values);
            unset($data['previous_attempts']);
        } elseif (\array_key_exists('previous_attempts', $data) && null === $data['previous_attempts']) {
            $object->setPreviousAttempts(null);
            unset($data['previous_attempts']);
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
        $dataArray['resource'] = null === $data->getResource() ? null : new JsonObject($this->normalizer->normalize($data->getResource(), 'json', $context));
        $dataArray['resolution'] = null === $data->getResolution() ? null : new JsonObject($this->normalizer->normalize($data->getResolution(), 'json', $context));
        $values = [];
        foreach ($data->getPreviousAttempts() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['previous_attempts'] = $values;
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [WorkflowSessionActionGroupsInnerActionsInner::class => false];
    }
}
