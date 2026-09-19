<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchCustomText;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSignerFromScratchCustomTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NewSignerFromScratchCustomText::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NewSignerFromScratchCustomText::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NewSignerFromScratchCustomText();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('request_subject', $data) && null !== $data['request_subject']) {
            $object->setRequestSubject($data['request_subject']);
            unset($data['request_subject']);
        } elseif (\array_key_exists('request_subject', $data) && null === $data['request_subject']) {
            $object->setRequestSubject(null);
            unset($data['request_subject']);
        }
        if (\array_key_exists('request_body', $data) && null !== $data['request_body']) {
            $object->setRequestBody($data['request_body']);
            unset($data['request_body']);
        } elseif (\array_key_exists('request_body', $data) && null === $data['request_body']) {
            $object->setRequestBody(null);
            unset($data['request_body']);
        }
        if (\array_key_exists('reminder_subject', $data) && null !== $data['reminder_subject']) {
            $object->setReminderSubject($data['reminder_subject']);
            unset($data['reminder_subject']);
        } elseif (\array_key_exists('reminder_subject', $data) && null === $data['reminder_subject']) {
            $object->setReminderSubject(null);
            unset($data['reminder_subject']);
        }
        if (\array_key_exists('reminder_body', $data) && null !== $data['reminder_body']) {
            $object->setReminderBody($data['reminder_body']);
            unset($data['reminder_body']);
        } elseif (\array_key_exists('reminder_body', $data) && null === $data['reminder_body']) {
            $object->setReminderBody(null);
            unset($data['reminder_body']);
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
        if ($data->isInitialized('requestSubject') && null !== $data->getRequestSubject()) {
            $dataArray['request_subject'] = $data->getRequestSubject();
        }
        if ($data->isInitialized('requestBody') && null !== $data->getRequestBody()) {
            $dataArray['request_body'] = $data->getRequestBody();
        }
        if ($data->isInitialized('reminderSubject') && null !== $data->getReminderSubject()) {
            $dataArray['reminder_subject'] = $data->getReminderSubject();
        }
        if ($data->isInitialized('reminderBody') && null !== $data->getReminderBody()) {
            $dataArray['reminder_body'] = $data->getReminderBody();
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
        return [NewSignerFromScratchCustomText::class => false];
    }
}
