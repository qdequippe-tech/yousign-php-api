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

class ConfigEmailTemplateNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ConfigEmailTemplate();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('to', $data) && null !== $data['to']) {
            $values = [];
            foreach ($data['to'] as $value) {
                $values[] = $value;
            }
            $object->setTo($values);
        } elseif (\array_key_exists('to', $data) && null === $data['to']) {
            $object->setTo(null);
        }
        if (\array_key_exists('subject', $data) && null !== $data['subject']) {
            $object->setSubject($data['subject']);
        } elseif (\array_key_exists('subject', $data) && null === $data['subject']) {
            $object->setSubject(null);
        }
        if (\array_key_exists('message', $data) && null !== $data['message']) {
            $object->setMessage($data['message']);
        } elseif (\array_key_exists('message', $data) && null === $data['message']) {
            $object->setMessage(null);
        }
        if (\array_key_exists('fromName', $data) && null !== $data['fromName']) {
            $object->setFromName($data['fromName']);
        } elseif (\array_key_exists('fromName', $data) && null === $data['fromName']) {
            $object->setFromName(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $values = [];
        foreach ($object->getTo() as $value) {
            $values[] = $value;
        }
        $data['to'] = $values;
        $data['subject'] = $object->getSubject();
        $data['message'] = $object->getMessage();
        if (null !== $object->getFromName()) {
            $data['fromName'] = $object->getFromName();
        }

        return $data;
    }
}
