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

class ConsentProcessValueInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ConsentProcessValueInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ConsentProcessValueInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ConsentProcessValueInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('consentProcess', $data) && null !== $data['consentProcess']) {
            $object->setConsentProcess($data['consentProcess']);
        } elseif (\array_key_exists('consentProcess', $data) && null === $data['consentProcess']) {
            $object->setConsentProcess(null);
        }
        if (\array_key_exists('member', $data) && null !== $data['member']) {
            $object->setMember($data['member']);
        } elseif (\array_key_exists('member', $data) && null === $data['member']) {
            $object->setMember(null);
        }
        if (\array_key_exists('value', $data) && null !== $data['value']) {
            $object->setValue($data['value']);
        } elseif (\array_key_exists('value', $data) && null === $data['value']) {
            $object->setValue(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['consentProcess'] = $object->getConsentProcess();
        $data['member'] = $object->getMember();
        if (null !== $object->getValue()) {
            $data['value'] = $object->getValue();
        }

        return $data;
    }
}
