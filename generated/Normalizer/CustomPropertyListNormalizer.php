<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CustomProperty;
use Qdequippe\Yousign\Api\Model\CustomPropertyList;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CustomPropertyListNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CustomPropertyList::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CustomPropertyList::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CustomPropertyList();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('data', $data) && null !== $data['data']) {
            $values = [];
            foreach ($data['data'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CustomProperty::class, 'json', $context);
            }
            $object->setData($values);
            unset($data['data']);
        } elseif (\array_key_exists('data', $data) && null === $data['data']) {
            $object->setData(null);
            unset($data['data']);
        }
        if (\array_key_exists('next_cursor', $data) && null !== $data['next_cursor']) {
            $object->setNextCursor($data['next_cursor']);
            unset($data['next_cursor']);
        } elseif (\array_key_exists('next_cursor', $data) && null === $data['next_cursor']) {
            $object->setNextCursor(null);
            unset($data['next_cursor']);
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
        $values = [];
        foreach ($data->getData() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['data'] = $values;
        if ($data->isInitialized('nextCursor') && null !== $data->getNextCursor()) {
            $dataArray['next_cursor'] = $data->getNextCursor();
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
        return [CustomPropertyList::class => false];
    }
}
