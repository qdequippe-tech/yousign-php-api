<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AddonConsumption;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AddonConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return AddonConsumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && AddonConsumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new AddonConsumption();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('start_at', $data) && null !== $data['start_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['start_at']);
            if (false === $date) {
                throw new InvalidDateException($data['start_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setStartAt($date);
            unset($data['start_at']);
        } elseif (\array_key_exists('start_at', $data) && null === $data['start_at']) {
            $object->setStartAt(null);
            unset($data['start_at']);
        }
        if (\array_key_exists('end_at', $data) && null !== $data['end_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['end_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['end_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setEndAt($date_1);
            unset($data['end_at']);
        } elseif (\array_key_exists('end_at', $data) && null === $data['end_at']) {
            $object->setEndAt(null);
            unset($data['end_at']);
        }
        if (\array_key_exists('quota', $data) && null !== $data['quota']) {
            $object->setQuota($data['quota']);
            unset($data['quota']);
        } elseif (\array_key_exists('quota', $data) && null === $data['quota']) {
            $object->setQuota(null);
            unset($data['quota']);
        }
        if (\array_key_exists('consumed', $data) && null !== $data['consumed']) {
            $object->setConsumed($data['consumed']);
            unset($data['consumed']);
        } elseif (\array_key_exists('consumed', $data) && null === $data['consumed']) {
            $object->setConsumed(null);
            unset($data['consumed']);
        }
        if (\array_key_exists('provisioned', $data) && null !== $data['provisioned']) {
            $object->setProvisioned($data['provisioned']);
            unset($data['provisioned']);
        } elseif (\array_key_exists('provisioned', $data) && null === $data['provisioned']) {
            $object->setProvisioned(null);
            unset($data['provisioned']);
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
        $dataArray['name'] = $data->getName();
        $dataArray['start_at'] = $data->getStartAt()->format('Y-m-d\TH:i:sP');
        $dataArray['end_at'] = $data->getEndAt()->format('Y-m-d\TH:i:sP');
        $dataArray['quota'] = $data->getQuota();
        $dataArray['consumed'] = $data->getConsumed();
        if ($data->isInitialized('provisioned') && null !== $data->getProvisioned()) {
            $dataArray['provisioned'] = $data->getProvisioned();
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
        return [AddonConsumption::class => false];
    }
}
