<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureDisplayOneOf1Options;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class SignatureDisplayOneOf1OptionsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureDisplayOneOf1Options::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureDisplayOneOf1Options::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureDisplayOneOf1Options();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('show_timezone', $data) && \is_int($data['show_timezone'])) {
            $data['show_timezone'] = (bool) $data['show_timezone'];
        }
        if (\array_key_exists('show_email', $data) && \is_int($data['show_email'])) {
            $data['show_email'] = (bool) $data['show_email'];
        }
        if (\array_key_exists('date_format', $data) && null !== $data['date_format']) {
            $object->setDateFormat($data['date_format']);
            unset($data['date_format']);
        } elseif (\array_key_exists('date_format', $data) && null === $data['date_format']) {
            $object->setDateFormat(null);
            unset($data['date_format']);
        }
        if (\array_key_exists('time_format', $data) && null !== $data['time_format']) {
            $object->setTimeFormat($data['time_format']);
            unset($data['time_format']);
        } elseif (\array_key_exists('time_format', $data) && null === $data['time_format']) {
            $object->setTimeFormat(null);
            unset($data['time_format']);
        }
        if (\array_key_exists('show_timezone', $data) && null !== $data['show_timezone']) {
            $object->setShowTimezone($data['show_timezone']);
            unset($data['show_timezone']);
        } elseif (\array_key_exists('show_timezone', $data) && null === $data['show_timezone']) {
            $object->setShowTimezone(null);
            unset($data['show_timezone']);
        }
        if (\array_key_exists('show_email', $data) && null !== $data['show_email']) {
            $object->setShowEmail($data['show_email']);
            unset($data['show_email']);
        } elseif (\array_key_exists('show_email', $data) && null === $data['show_email']) {
            $object->setShowEmail(null);
            unset($data['show_email']);
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
        if ($data->isInitialized('dateFormat') && null !== $data->getDateFormat()) {
            $dataArray['date_format'] = $data->getDateFormat();
        }
        if ($data->isInitialized('timeFormat') && null !== $data->getTimeFormat()) {
            $dataArray['time_format'] = $data->getTimeFormat();
        }
        if ($data->isInitialized('showTimezone') && null !== $data->getShowTimezone()) {
            $dataArray['show_timezone'] = $data->getShowTimezone();
        }
        if ($data->isInitialized('showEmail') && null !== $data->getShowEmail()) {
            $dataArray['show_email'] = $data->getShowEmail();
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
        return [SignatureDisplayOneOf1Options::class => false];
    }
}
