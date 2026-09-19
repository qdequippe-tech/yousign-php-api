<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateFieldFont;
use Qdequippe\Yousign\Api\Model\Text;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Text::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Text::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Text();
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
        if (\array_key_exists('signer_id', $data) && null !== $data['signer_id']) {
            $object->setSignerId($data['signer_id']);
            unset($data['signer_id']);
        } elseif (\array_key_exists('signer_id', $data) && null === $data['signer_id']) {
            $object->setSignerId(null);
            unset($data['signer_id']);
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
        if (\array_key_exists('max_length', $data) && null !== $data['max_length']) {
            $object->setMaxLength($data['max_length']);
            unset($data['max_length']);
        } elseif (\array_key_exists('max_length', $data) && null === $data['max_length']) {
            $object->setMaxLength(null);
            unset($data['max_length']);
        }
        if (\array_key_exists('question', $data) && null !== $data['question']) {
            $object->setQuestion($data['question']);
            unset($data['question']);
        } elseif (\array_key_exists('question', $data) && null === $data['question']) {
            $object->setQuestion(null);
            unset($data['question']);
        }
        if (\array_key_exists('instruction', $data) && null !== $data['instruction']) {
            $object->setInstruction($data['instruction']);
            unset($data['instruction']);
        } elseif (\array_key_exists('instruction', $data) && null === $data['instruction']) {
            $object->setInstruction(null);
            unset($data['instruction']);
        }
        if (\array_key_exists('optional', $data) && null !== $data['optional']) {
            $object->setOptional($data['optional']);
            unset($data['optional']);
        } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
            $object->setOptional(null);
            unset($data['optional']);
        }
        if (\array_key_exists('font', $data) && null !== $data['font']) {
            $object->setFont($this->denormalizer->denormalize($data['font'], CreateFieldFont::class, 'json', $context));
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
        if (\array_key_exists('default_value', $data) && null !== $data['default_value']) {
            $object->setDefaultValue($data['default_value']);
            unset($data['default_value']);
        } elseif (\array_key_exists('default_value', $data) && null === $data['default_value']) {
            $object->setDefaultValue(null);
            unset($data['default_value']);
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
        $dataArray['signer_id'] = $data->getSignerId();
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
        $dataArray['max_length'] = $data->getMaxLength();
        $dataArray['question'] = $data->getQuestion();
        if ($data->isInitialized('instruction') && null !== $data->getInstruction()) {
            $dataArray['instruction'] = $data->getInstruction();
        }
        if ($data->isInitialized('optional') && null !== $data->getOptional()) {
            $dataArray['optional'] = $data->getOptional();
        }
        if ($data->isInitialized('font') && null !== $data->getFont()) {
            $dataArray['font'] = null === $data->getFont() ? null : new JsonObject($this->normalizer->normalize($data->getFont(), 'json', $context));
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('defaultValue') && null !== $data->getDefaultValue()) {
            $dataArray['default_value'] = $data->getDefaultValue();
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
        return [Text::class => false];
    }
}
