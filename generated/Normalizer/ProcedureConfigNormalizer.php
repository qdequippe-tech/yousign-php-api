<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class ProcedureConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfig' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfig' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ProcedureConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($this->denormalizer->denormalize($data['email'], 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfigEmail', 'json', $context));
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
        }
        if (\array_key_exists('reminders', $data) && null !== $data['reminders']) {
            $values = [];
            foreach ($data['reminders'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfigReminder', 'json', $context);
            }
            $object->setReminders($values);
        } elseif (\array_key_exists('reminders', $data) && null === $data['reminders']) {
            $object->setReminders(null);
        }
        if (\array_key_exists('webhook', $data) && null !== $data['webhook']) {
            $object->setWebhook($this->denormalizer->denormalize($data['webhook'], 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfigWebhook', 'json', $context));
        } elseif (\array_key_exists('webhook', $data) && null === $data['webhook']) {
            $object->setWebhook(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getEmail()) {
            $data['email'] = $this->normalizer->normalize($object->getEmail(), 'json', $context);
        }
        if (null !== $object->getReminders()) {
            $values = [];
            foreach ($object->getReminders() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['reminders'] = $values;
        }
        if (null !== $object->getWebhook()) {
            $data['webhook'] = $this->normalizer->normalize($object->getWebhook(), 'json', $context);
        }

        return $data;
    }
}
