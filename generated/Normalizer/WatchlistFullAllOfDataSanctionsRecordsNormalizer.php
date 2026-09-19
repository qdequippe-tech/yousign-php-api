<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctionsRecords;
use Qdequippe\Yousign\Api\Model\WatchlistFullAllOfDataSanctionsSources;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class WatchlistFullAllOfDataSanctionsRecordsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return WatchlistFullAllOfDataSanctionsRecords::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && WatchlistFullAllOfDataSanctionsRecords::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new WatchlistFullAllOfDataSanctionsRecords();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('active', $data) && \is_int($data['active'])) {
            $data['active'] = (bool) $data['active'];
        }
        if (\array_key_exists('description', $data) && null !== $data['description']) {
            $object->setDescription($data['description']);
            unset($data['description']);
        } elseif (\array_key_exists('description', $data) && null === $data['description']) {
            $object->setDescription(null);
            unset($data['description']);
        }
        if (\array_key_exists('authority', $data) && null !== $data['authority']) {
            $object->setAuthority($data['authority']);
            unset($data['authority']);
        } elseif (\array_key_exists('authority', $data) && null === $data['authority']) {
            $object->setAuthority(null);
            unset($data['authority']);
        }
        if (\array_key_exists('country_code', $data) && null !== $data['country_code']) {
            $object->setCountryCode($data['country_code']);
            unset($data['country_code']);
        } elseif (\array_key_exists('country_code', $data) && null === $data['country_code']) {
            $object->setCountryCode(null);
            unset($data['country_code']);
        }
        if (\array_key_exists('active', $data) && null !== $data['active']) {
            $object->setActive($data['active']);
            unset($data['active']);
        } elseif (\array_key_exists('active', $data) && null === $data['active']) {
            $object->setActive(null);
            unset($data['active']);
        }
        if (\array_key_exists('started_on', $data) && null !== $data['started_on']) {
            $object->setStartedOn($data['started_on']);
            unset($data['started_on']);
        } elseif (\array_key_exists('started_on', $data) && null === $data['started_on']) {
            $object->setStartedOn(null);
            unset($data['started_on']);
        }
        if (\array_key_exists('ended_on', $data) && null !== $data['ended_on']) {
            $object->setEndedOn($data['ended_on']);
            unset($data['ended_on']);
        } elseif (\array_key_exists('ended_on', $data) && null === $data['ended_on']) {
            $object->setEndedOn(null);
            unset($data['ended_on']);
        }
        if (\array_key_exists('sources', $data) && null !== $data['sources']) {
            $values = [];
            foreach ($data['sources'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, WatchlistFullAllOfDataSanctionsSources::class, 'json', $context);
            }
            $object->setSources($values);
            unset($data['sources']);
        } elseif (\array_key_exists('sources', $data) && null === $data['sources']) {
            $object->setSources(null);
            unset($data['sources']);
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
        $dataArray['description'] = $data->getDescription();
        $dataArray['authority'] = $data->getAuthority();
        $dataArray['country_code'] = $data->getCountryCode();
        $dataArray['active'] = $data->getActive();
        $dataArray['started_on'] = $data->getStartedOn();
        $dataArray['ended_on'] = $data->getEndedOn();
        $values = [];
        foreach ($data->getSources() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['sources'] = $values;
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [WatchlistFullAllOfDataSanctionsRecords::class => false];
    }
}
