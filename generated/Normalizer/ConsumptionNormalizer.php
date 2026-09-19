<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Consumption;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Consumption::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Consumption::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Consumption();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('app', $data) && null !== $data['app']) {
            $object->setApp($this->denormalizer->denormalize($data['app'], ConsumptionApp::class, 'json', $context));
            unset($data['app']);
        } elseif (\array_key_exists('app', $data) && null === $data['app']) {
            $object->setApp(null);
            unset($data['app']);
        }
        if (\array_key_exists('api', $data) && null !== $data['api']) {
            $object->setApi($this->denormalizer->denormalize($data['api'], ConsumptionApi::class, 'json', $context));
            unset($data['api']);
        } elseif (\array_key_exists('api', $data) && null === $data['api']) {
            $object->setApi(null);
            unset($data['api']);
        }
        if (\array_key_exists('connector', $data) && null !== $data['connector']) {
            $object->setConnector($this->denormalizer->denormalize($data['connector'], ConsumptionApp::class, 'json', $context));
            unset($data['connector']);
        } elseif (\array_key_exists('connector', $data) && null === $data['connector']) {
            $object->setConnector(null);
            unset($data['connector']);
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
        $dataArray['app'] = null === $data->getApp() ? null : new JsonObject($this->normalizer->normalize($data->getApp(), 'json', $context));
        $dataArray['api'] = null === $data->getApi() ? null : new JsonObject($this->normalizer->normalize($data->getApi(), 'json', $context));
        $dataArray['connector'] = null === $data->getConnector() ? null : new JsonObject($this->normalizer->normalize($data->getConnector(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [Consumption::class => false];
    }
}
