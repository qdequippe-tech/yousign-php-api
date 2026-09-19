<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfData;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataPoliticallyExposedPerson;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctions;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WatchlistFullAllOfDataNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return WatchlistFullAllOfData::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && WatchlistFullAllOfData::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new WatchlistFullAllOfData();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('politically_exposed_person', $data) && null !== $data['politically_exposed_person']) {
            $object->setPoliticallyExposedPerson($this->denormalizer->denormalize($data['politically_exposed_person'], WatchlistFullAllOfDataPoliticallyExposedPerson::class, 'json', $context));
            unset($data['politically_exposed_person']);
        } elseif (\array_key_exists('politically_exposed_person', $data) && null === $data['politically_exposed_person']) {
            $object->setPoliticallyExposedPerson(null);
            unset($data['politically_exposed_person']);
        }
        if (\array_key_exists('sanctions', $data) && null !== $data['sanctions']) {
            $object->setSanctions($this->denormalizer->denormalize($data['sanctions'], WatchlistFullAllOfDataSanctions::class, 'json', $context));
            unset($data['sanctions']);
        } elseif (\array_key_exists('sanctions', $data) && null === $data['sanctions']) {
            $object->setSanctions(null);
            unset($data['sanctions']);
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
        $dataArray['politically_exposed_person'] = null === $data->getPoliticallyExposedPerson() ? null : new JsonObject($this->normalizer->normalize($data->getPoliticallyExposedPerson(), 'json', $context));
        $dataArray['sanctions'] = null === $data->getSanctions() ? null : new JsonObject($this->normalizer->normalize($data->getSanctions(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [WatchlistFullAllOfData::class => false];
    }
}
