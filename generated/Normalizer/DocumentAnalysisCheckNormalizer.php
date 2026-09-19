<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\DocumentAnalysisCheck;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class DocumentAnalysisCheckNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return DocumentAnalysisCheck::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && DocumentAnalysisCheck::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new DocumentAnalysisCheck();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('extracted', $data) && null !== $data['extracted']) {
            $object->setExtracted($data['extracted']);
        } elseif (\array_key_exists('extracted', $data) && null === $data['extracted']) {
            $object->setExtracted(null);
        }
        if (\array_key_exists('expected', $data) && null !== $data['expected']) {
            $object->setExpected($data['expected']);
        } elseif (\array_key_exists('expected', $data) && null === $data['expected']) {
            $object->setExpected(null);
        }
        if (\array_key_exists('match_level', $data) && null !== $data['match_level']) {
            $object->setMatchLevel($data['match_level']);
        } elseif (\array_key_exists('match_level', $data) && null === $data['match_level']) {
            $object->setMatchLevel(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['extracted' => $data->getExtracted(), 'expected' => $data->getExpected(), 'match_level' => $data->getMatchLevel()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [DocumentAnalysisCheck::class => false];
    }
}
