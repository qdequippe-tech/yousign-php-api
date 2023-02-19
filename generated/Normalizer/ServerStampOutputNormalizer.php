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

class ServerStampOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ServerStampOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ServerStampOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ServerStampOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
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
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Qdequippe\\Yousign\\Api\\Model\\FileObjectOutputWithoutFileReference', 'json', $context);
            }
            $object->setFileObjects($values_1);
        } elseif (\array_key_exists('fileObjects', $data) && null === $data['fileObjects']) {
            $object->setFileObjects(null);
        }
        if (\array_key_exists('createdAt', $data) && null !== $data['createdAt']) {
            $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['createdAt']));
        } elseif (\array_key_exists('createdAt', $data) && null === $data['createdAt']) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updatedAt', $data) && null !== $data['updatedAt']) {
            $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updatedAt']));
        } elseif (\array_key_exists('updatedAt', $data) && null === $data['updatedAt']) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('finishedAt', $data) && null !== $data['finishedAt']) {
            $object->setFinishedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['finishedAt']));
        } elseif (\array_key_exists('finishedAt', $data) && null === $data['finishedAt']) {
            $object->setFinishedAt(null);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('workspace', $data) && null !== $data['workspace']) {
            $object->setWorkspace($data['workspace']);
        } elseif (\array_key_exists('workspace', $data) && null === $data['workspace']) {
            $object->setWorkspace(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['id'] = $object->getId();
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
        $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        $data['finishedAt'] = $object->getFinishedAt()->format('Y-m-d\\TH:i:sP');
        $data['status'] = $object->getStatus();
        $data['workspace'] = $object->getWorkspace();

        return $data;
    }
}
