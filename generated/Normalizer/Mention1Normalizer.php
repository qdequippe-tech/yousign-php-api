<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Mention1;
use Qdequippe\Yousign\Api\Model\UpdateFieldFont;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class Mention1Normalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Mention1::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Mention1::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Mention1();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('width', $data) && null !== $data['width']) {
            $object->setWidth($data['width']);
            unset($data['width']);
        } elseif (\array_key_exists('width', $data) && null === $data['width']) {
            $object->setWidth(null);
            unset($data['width']);
        }
        if (\array_key_exists('height', $data) && null !== $data['height']) {
            $object->setHeight($data['height']);
            unset($data['height']);
        } elseif (\array_key_exists('height', $data) && null === $data['height']) {
            $object->setHeight(null);
            unset($data['height']);
        }
        if (\array_key_exists('mention', $data) && null !== $data['mention']) {
            $object->setMention($data['mention']);
            unset($data['mention']);
        } elseif (\array_key_exists('mention', $data) && null === $data['mention']) {
            $object->setMention(null);
            unset($data['mention']);
        }
        if (\array_key_exists('font', $data) && null !== $data['font']) {
            $object->setFont($this->denormalizer->denormalize($data['font'], UpdateFieldFont::class, 'json', $context));
            unset($data['font']);
        } elseif (\array_key_exists('font', $data) && null === $data['font']) {
            $object->setFont(null);
            unset($data['font']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
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
        if ($data->isInitialized('width') && null !== $data->getWidth()) {
            $dataArray['width'] = $data->getWidth();
        }
        if ($data->isInitialized('height') && null !== $data->getHeight()) {
            $dataArray['height'] = $data->getHeight();
        }
        if ($data->isInitialized('mention') && null !== $data->getMention()) {
            $dataArray['mention'] = $data->getMention();
        }
        if ($data->isInitialized('font') && null !== $data->getFont()) {
            $dataArray['font'] = null === $data->getFont() ? null : new JsonObject($this->normalizer->normalize($data->getFont(), 'json', $context));
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
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
        return [Mention1::class => false];
    }
}
