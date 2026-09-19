<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayload;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealFieldSealPayloadCaptionsInner;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateElectronicSealFieldSealPayloadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateElectronicSealFieldSealPayload::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateElectronicSealFieldSealPayload::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateElectronicSealFieldSealPayload();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('height', $data) && null !== $data['height']) {
            $object->setHeight($data['height']);
            unset($data['height']);
        } elseif (\array_key_exists('height', $data) && null === $data['height']) {
            $object->setHeight(null);
            unset($data['height']);
        }
        if (\array_key_exists('width', $data) && null !== $data['width']) {
            $object->setWidth($data['width']);
            unset($data['width']);
        } elseif (\array_key_exists('width', $data) && null === $data['width']) {
            $object->setWidth(null);
            unset($data['width']);
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
        if (\array_key_exists('reason', $data) && null !== $data['reason']) {
            $object->setReason($data['reason']);
            unset($data['reason']);
        } elseif (\array_key_exists('reason', $data) && null === $data['reason']) {
            $object->setReason(null);
            unset($data['reason']);
        }
        if (\array_key_exists('captions', $data) && null !== $data['captions']) {
            $values = [];
            foreach ($data['captions'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, CreateElectronicSealFieldSealPayloadCaptionsInner::class, 'json', $context);
            }
            $object->setCaptions($values);
            unset($data['captions']);
        } elseif (\array_key_exists('captions', $data) && null === $data['captions']) {
            $object->setCaptions(null);
            unset($data['captions']);
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
        $dataArray['type'] = $data->getType();
        $dataArray['height'] = $data->getHeight();
        $dataArray['width'] = $data->getWidth();
        $dataArray['page'] = $data->getPage();
        $dataArray['x'] = $data->getX();
        $dataArray['y'] = $data->getY();
        if ($data->isInitialized('reason') && null !== $data->getReason()) {
            $dataArray['reason'] = $data->getReason();
        }
        if ($data->isInitialized('captions') && null !== $data->getCaptions()) {
            $values = [];
            foreach ($data->getCaptions() as $value) {
                $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $dataArray['captions'] = $values;
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
        return [CreateElectronicSealFieldSealPayload::class => false];
    }
}
