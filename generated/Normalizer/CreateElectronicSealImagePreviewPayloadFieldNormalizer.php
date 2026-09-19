<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayloadField;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealImagePreviewPayloadFieldCaptionsInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateElectronicSealImagePreviewPayloadFieldNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateElectronicSealImagePreviewPayloadField::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateElectronicSealImagePreviewPayloadField::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateElectronicSealImagePreviewPayloadField();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('width', $data) && null !== $data['width']) {
            $object->setWidth($data['width']);
        } elseif (\array_key_exists('width', $data) && null === $data['width']) {
            $object->setWidth(null);
        }
        if (\array_key_exists('height', $data) && null !== $data['height']) {
            $object->setHeight($data['height']);
        } elseif (\array_key_exists('height', $data) && null === $data['height']) {
            $object->setHeight(null);
        }
        if (\array_key_exists('captions', $data) && null !== $data['captions']) {
            $values = [];
            foreach ($data['captions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CreateElectronicSealImagePreviewPayloadFieldCaptionsInner::class, 'json', $context);
            }
            $object->setCaptions($values);
        } elseif (\array_key_exists('captions', $data) && null === $data['captions']) {
            $object->setCaptions(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['width'] = $data->getWidth();
        $dataArray['height'] = $data->getHeight();
        if ($data->isInitialized('captions') && null !== $data->getCaptions()) {
            $values = [];
            foreach ($data->getCaptions() as $value) {
                $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['captions'] = $values;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateElectronicSealImagePreviewPayloadField::class => false];
    }
}
