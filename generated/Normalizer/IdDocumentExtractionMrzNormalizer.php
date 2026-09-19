<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionMrz;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdDocumentExtractionMrzNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdDocumentExtractionMrz::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdDocumentExtractionMrz::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdDocumentExtractionMrz();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('line1', $data) && null !== $data['line1']) {
            $object->setLine1($data['line1']);
        } elseif (\array_key_exists('line1', $data) && null === $data['line1']) {
            $object->setLine1(null);
        }
        if (\array_key_exists('line2', $data) && null !== $data['line2']) {
            $object->setLine2($data['line2']);
        } elseif (\array_key_exists('line2', $data) && null === $data['line2']) {
            $object->setLine2(null);
        }
        if (\array_key_exists('line3', $data) && null !== $data['line3']) {
            $object->setLine3($data['line3']);
        } elseif (\array_key_exists('line3', $data) && null === $data['line3']) {
            $object->setLine3(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['line1' => $data->getLine1(), 'line2' => $data->getLine2(), 'line3' => $data->getLine3()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdDocumentExtractionMrz::class => false];
    }
}
