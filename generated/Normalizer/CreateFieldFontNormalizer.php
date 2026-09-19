<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\FontVariants;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateFieldFontNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateFieldFont::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateFieldFont::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateFieldFont();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('family', $data) && null !== $data['family']) {
            $object->setFamily($data['family']);
            unset($data['family']);
        } elseif (\array_key_exists('family', $data) && null === $data['family']) {
            $object->setFamily(null);
            unset($data['family']);
        }
        if (\array_key_exists('color', $data) && null !== $data['color']) {
            $object->setColor($data['color']);
            unset($data['color']);
        } elseif (\array_key_exists('color', $data) && null === $data['color']) {
            $object->setColor(null);
            unset($data['color']);
        }
        if (\array_key_exists('size', $data) && null !== $data['size']) {
            $object->setSize($data['size']);
            unset($data['size']);
        } elseif (\array_key_exists('size', $data) && null === $data['size']) {
            $object->setSize(null);
            unset($data['size']);
        }
        if (\array_key_exists('variants', $data) && null !== $data['variants']) {
            $object->setVariants($this->denormalizer->denormalize($data['variants'], FontVariants::class, 'json', $context));
            unset($data['variants']);
        } elseif (\array_key_exists('variants', $data) && null === $data['variants']) {
            $object->setVariants(null);
            unset($data['variants']);
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
        $dataArray['family'] = $data->getFamily();
        $dataArray['color'] = $data->getColor();
        $dataArray['size'] = $data->getSize();
        $dataArray['variants'] = null === $data->getVariants() ? null : new JsonObject($this->normalizer->normalize($data->getVariants(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateFieldFont::class => false];
    }
}
