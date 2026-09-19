<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\RadioGroup2;
use Qdequippe\Yousign\Api\Model\RadioGroup2RadiosInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RadioGroup2Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return RadioGroup2::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && RadioGroup2::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new RadioGroup2();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('optional', $data) && \is_int($data['optional'])) {
            $data['optional'] = (bool) $data['optional'];
        }
        if (\array_key_exists('read_only', $data) && \is_int($data['read_only'])) {
            $data['read_only'] = (bool) $data['read_only'];
        }
        if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
            $object->setDocumentId($data['document_id']);
            unset($data['document_id']);
        } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
            $object->setDocumentId(null);
            unset($data['document_id']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('page', $data) && null !== $data['page']) {
            $object->setPage($data['page']);
            unset($data['page']);
        } elseif (\array_key_exists('page', $data) && null === $data['page']) {
            $object->setPage(null);
            unset($data['page']);
        }
        if (\array_key_exists('optional', $data) && null !== $data['optional']) {
            $object->setOptional($data['optional']);
            unset($data['optional']);
        } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
            $object->setOptional(null);
            unset($data['optional']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('read_only', $data) && null !== $data['read_only']) {
            $object->setReadOnly($data['read_only']);
            unset($data['read_only']);
        } elseif (\array_key_exists('read_only', $data) && null === $data['read_only']) {
            $object->setReadOnly(null);
            unset($data['read_only']);
        }
        if (\array_key_exists('radios', $data) && null !== $data['radios']) {
            $values = [];
            foreach ($data['radios'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, RadioGroup2RadiosInner::class, 'json', $context);
            }
            $object->setRadios($values);
            unset($data['radios']);
        } elseif (\array_key_exists('radios', $data) && null === $data['radios']) {
            $object->setRadios(null);
            unset($data['radios']);
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
        $dataArray['document_id'] = $data->getDocumentId();
        $dataArray['type'] = $data->getType();
        $dataArray['page'] = $data->getPage();
        $dataArray['optional'] = $data->getOptional();
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('readOnly') && null !== $data->getReadOnly()) {
            $dataArray['read_only'] = $data->getReadOnly();
        }
        $values = [];
        foreach ($data->getRadios() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['radios'] = $values;
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [RadioGroup2::class => false];
    }
}
