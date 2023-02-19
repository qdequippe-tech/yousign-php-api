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

class FileObjectInputWithoutFileReferenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\FileObjectInputWithoutFileReference' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\FileObjectInputWithoutFileReference' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\FileObjectInputWithoutFileReference();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('page', $data) && null !== $data['page']) {
            $object->setPage($data['page']);
        } elseif (\array_key_exists('page', $data) && null === $data['page']) {
            $object->setPage(null);
        }
        if (\array_key_exists('position', $data) && null !== $data['position']) {
            $object->setPosition($data['position']);
        } elseif (\array_key_exists('position', $data) && null === $data['position']) {
            $object->setPosition(null);
        }
        if (\array_key_exists('fieldName', $data) && null !== $data['fieldName']) {
            $object->setFieldName($data['fieldName']);
        } elseif (\array_key_exists('fieldName', $data) && null === $data['fieldName']) {
            $object->setFieldName(null);
        }
        if (\array_key_exists('mention', $data) && null !== $data['mention']) {
            $object->setMention($data['mention']);
        } elseif (\array_key_exists('mention', $data) && null === $data['mention']) {
            $object->setMention(null);
        }
        if (\array_key_exists('mention2', $data) && null !== $data['mention2']) {
            $object->setMention2($data['mention2']);
        } elseif (\array_key_exists('mention2', $data) && null === $data['mention2']) {
            $object->setMention2(null);
        }
        if (\array_key_exists('reason', $data) && null !== $data['reason']) {
            $object->setReason($data['reason']);
        } elseif (\array_key_exists('reason', $data) && null === $data['reason']) {
            $object->setReason(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getPage()) {
            $data['page'] = $object->getPage();
        }
        if (null !== $object->getPosition()) {
            $data['position'] = $object->getPosition();
        }
        if (null !== $object->getFieldName()) {
            $data['fieldName'] = $object->getFieldName();
        }
        if (null !== $object->getMention()) {
            $data['mention'] = $object->getMention();
        }
        if (null !== $object->getMention2()) {
            $data['mention2'] = $object->getMention2();
        }
        if (null !== $object->getReason()) {
            $data['reason'] = $object->getReason();
        }

        return $data;
    }
}
