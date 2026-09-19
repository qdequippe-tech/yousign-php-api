<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchReminderSettings;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSignatureRequestFromScratchReminderSettingsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NewSignatureRequestFromScratchReminderSettings::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NewSignatureRequestFromScratchReminderSettings::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NewSignatureRequestFromScratchReminderSettings();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('interval_in_days', $data) && null !== $data['interval_in_days']) {
            $object->setIntervalInDays($data['interval_in_days']);
        } elseif (\array_key_exists('interval_in_days', $data) && null === $data['interval_in_days']) {
            $object->setIntervalInDays(null);
        }
        if (\array_key_exists('max_occurrences', $data) && null !== $data['max_occurrences']) {
            $object->setMaxOccurrences($data['max_occurrences']);
        } elseif (\array_key_exists('max_occurrences', $data) && null === $data['max_occurrences']) {
            $object->setMaxOccurrences(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['interval_in_days' => $data->getIntervalInDays(), 'max_occurrences' => $data->getMaxOccurrences()];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [NewSignatureRequestFromScratchReminderSettings::class => false];
    }
}
