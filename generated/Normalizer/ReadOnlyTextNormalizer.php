<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\ReadOnlyText;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ReadOnlyTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ReadOnlyText::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ReadOnlyText::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ReadOnlyText();
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
        if (\array_key_exists('text', $data) && null !== $data['text']) {
            $object->setText($data['text']);
            unset($data['text']);
        } elseif (\array_key_exists('text', $data) && null === $data['text']) {
            $object->setText(null);
            unset($data['text']);
        }
        if (\array_key_exists('font', $data) && null !== $data['font']) {
            $object->setFont($this->denormalizer->denormalize($data['font'], CreateFieldFont::class, 'json', $context));
            unset($data['font']);
        } elseif (\array_key_exists('font', $data) && null === $data['font']) {
            $object->setFont(null);
            unset($data['font']);
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
        $dataArray['type'] = $data->getType();
        $dataArray['page'] = $data->getPage();
        $dataArray['x'] = $data->getX();
        $dataArray['y'] = $data->getY();
        if ($data->isInitialized('width') && null !== $data->getWidth()) {
            $dataArray['width'] = $data->getWidth();
        }
        if ($data->isInitialized('height') && null !== $data->getHeight()) {
            $dataArray['height'] = $data->getHeight();
        }
        $dataArray['text'] = $data->getText();
        if ($data->isInitialized('font') && null !== $data->getFont()) {
            $dataArray['font'] = null === $data->getFont() ? null : new JsonObject($this->normalizer->normalize($data->getFont(), 'json', $context));
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
        return [ReadOnlyText::class => false];
    }
}
