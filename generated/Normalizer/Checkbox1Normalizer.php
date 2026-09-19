<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Checkbox1;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Checkbox1Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Checkbox1::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Checkbox1::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Checkbox1();
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
        if (\array_key_exists('checked', $data) && \is_int($data['checked'])) {
            $data['checked'] = (bool) $data['checked'];
        }
        if (\array_key_exists('read_only', $data) && \is_int($data['read_only'])) {
            $data['read_only'] = (bool) $data['read_only'];
        }
        if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
            $object->setSignerId($data['signer_id']);
            unset($data['signer_id']);
        } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
            $object->setSignerId(null);
            unset($data['signer_id']);
        }
        if (\array_key_exists('page', $data) && null !== $data['page']) {
            $object->setPage($data['page']);
            unset($data['page']);
        } elseif (\array_key_exists('page', $data) && null === $data['page']) {
            $object->setPage(null);
            unset($data['page']);
        }
        if (\array_key_exists('x', $data) && null !== $data['x']) {
            $object->setX($data['x']);
            unset($data['x']);
        } elseif (\array_key_exists('x', $data) && null === $data['x']) {
            $object->setX(null);
            unset($data['x']);
        }
        if (\array_key_exists('y', $data) && null !== $data['y']) {
            $object->setY($data['y']);
            unset($data['y']);
        } elseif (\array_key_exists('y', $data) && null === $data['y']) {
            $object->setY(null);
            unset($data['y']);
        }
        if (\array_key_exists('size', $data) && null !== $data['size']) {
            $object->setSize($data['size']);
            unset($data['size']);
        } elseif (\array_key_exists('size', $data) && null === $data['size']) {
            $object->setSize(null);
            unset($data['size']);
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
        if (\array_key_exists('checked', $data) && null !== $data['checked']) {
            $object->setChecked($data['checked']);
            unset($data['checked']);
        } elseif (\array_key_exists('checked', $data) && null === $data['checked']) {
            $object->setChecked(null);
            unset($data['checked']);
        }
        if (\array_key_exists('read_only', $data) && null !== $data['read_only']) {
            $object->setReadOnly($data['read_only']);
            unset($data['read_only']);
        } elseif (\array_key_exists('read_only', $data) && null === $data['read_only']) {
            $object->setReadOnly(null);
            unset($data['read_only']);
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
        if ($data->isInitialized('signerId') && null !== $data->getSignerId()) {
            $dataArray['signer_id'] = $data->getSignerId();
        }
        if ($data->isInitialized('page') && null !== $data->getPage()) {
            $dataArray['page'] = $data->getPage();
        }
        if ($data->isInitialized('x') && null !== $data->getX()) {
            $dataArray['x'] = $data->getX();
        }
        if ($data->isInitialized('y') && null !== $data->getY()) {
            $dataArray['y'] = $data->getY();
        }
        if ($data->isInitialized('size') && null !== $data->getSize()) {
            $dataArray['size'] = $data->getSize();
        }
        if ($data->isInitialized('optional') && null !== $data->getOptional()) {
            $dataArray['optional'] = $data->getOptional();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('checked') && null !== $data->getChecked()) {
            $dataArray['checked'] = $data->getChecked();
        }
        if ($data->isInitialized('readOnly') && null !== $data->getReadOnly()) {
            $dataArray['read_only'] = $data->getReadOnly();
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
        return [Checkbox1::class => false];
    }
}
