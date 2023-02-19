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

class ServerStampInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ServerStampInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ServerStampInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ServerStampInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
        }
        if (\array_key_exists('certificate', $data) && null !== $data['certificate']) {
            $object->setCertificate($data['certificate']);
        } elseif (\array_key_exists('certificate', $data) && null === $data['certificate']) {
            $object->setCertificate(null);
        }
        if (\array_key_exists('config', $data) && null !== $data['config']) {
            $values = [];
            foreach ($data['config'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\ServerStampConfig', 'json', $context);
            }
            $object->setConfig($values);
        } elseif (\array_key_exists('config', $data) && null === $data['config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('fileObjects', $data) && null !== $data['fileObjects']) {
            $values_1 = [];
            foreach ($data['fileObjects'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Qdequippe\\Yousign\\Api\\Model\\FileObjectInputWithoutFileReference', 'json', $context);
            }
            $object->setFileObjects($values_1);
        } elseif (\array_key_exists('fileObjects', $data) && null === $data['fileObjects']) {
            $object->setFileObjects(null);
        }
        if (\array_key_exists('signImage', $data) && null !== $data['signImage']) {
            $object->setSignImage($data['signImage']);
        } elseif (\array_key_exists('signImage', $data) && null === $data['signImage']) {
            $object->setSignImage(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['file'] = $object->getFile();
        $data['certificate'] = $object->getCertificate();
        if (null !== $object->getConfig()) {
            $values = [];
            foreach ($object->getConfig() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['config'] = $values;
        }
        $values_1 = [];
        foreach ($object->getFileObjects() as $value_1) {
            $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
        }
        $data['fileObjects'] = $values_1;
        if (null !== $object->getSignImage()) {
            $data['signImage'] = $object->getSignImage();
        }

        return $data;
    }
}
