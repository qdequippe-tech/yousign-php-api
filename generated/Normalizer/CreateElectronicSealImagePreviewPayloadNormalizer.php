<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayloadField;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateElectronicSealImagePreviewPayloadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateElectronicSealImagePreviewPayload::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateElectronicSealImagePreviewPayload::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateElectronicSealImagePreviewPayload();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('image_id', $data) && null !== $data['image_id']) {
            $object->setImageId($data['image_id']);
        } elseif (\array_key_exists('image_id', $data) && null === $data['image_id']) {
            $object->setImageId(null);
        }
        if (\array_key_exists('field', $data) && null !== $data['field']) {
            $object->setField($this->denormalizer->denormalize($data['field'], CreateElectronicSealImagePreviewPayloadField::class, 'json', $context));
        } elseif (\array_key_exists('field', $data) && null === $data['field']) {
            $object->setField(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('imageId') && null !== $data->getImageId()) {
            $dataArray['image_id'] = $data->getImageId();
        }
        $dataArray['field'] = null === $data->getField() ? null : new JsonObject($this->normalizer->normalize($data->getField(), 'json', $context));

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateElectronicSealImagePreviewPayload::class => false];
    }
}
