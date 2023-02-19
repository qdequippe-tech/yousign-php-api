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

class ProcedureInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ProcedureInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ProcedureInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ProcedureInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
        }
        if (\array_key_exists('description', $data) && null !== $data['description']) {
            $object->setDescription($data['description']);
        } elseif (\array_key_exists('description', $data) && null === $data['description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('expiresAt', $data) && null !== $data['expiresAt']) {
            $object->setExpiresAt(\DateTime::createFromFormat('Y-m-d', $data['expiresAt'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('expiresAt', $data) && null === $data['expiresAt']) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('template', $data) && null !== $data['template']) {
            $object->setTemplate($data['template']);
        } elseif (\array_key_exists('template', $data) && null === $data['template']) {
            $object->setTemplate(null);
        }
        if (\array_key_exists('ordered', $data) && null !== $data['ordered']) {
            $object->setOrdered($data['ordered']);
        } elseif (\array_key_exists('ordered', $data) && null === $data['ordered']) {
            $object->setOrdered(null);
        }
        if (\array_key_exists('metadata', $data) && null !== $data['metadata']) {
            $object->setMetadata($this->denormalizer->denormalize($data['metadata'], 'Qdequippe\\Yousign\\Api\\Model\\ProcedureInputMetadata', 'json', $context));
        } elseif (\array_key_exists('metadata', $data) && null === $data['metadata']) {
            $object->setMetadata(null);
        }
        if (\array_key_exists('config', $data) && null !== $data['config']) {
            $object->setConfig($this->denormalizer->denormalize($data['config'], 'Qdequippe\\Yousign\\Api\\Model\\ProcedureConfig', 'json', $context));
        } elseif (\array_key_exists('config', $data) && null === $data['config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('members', $data) && null !== $data['members']) {
            $values = [];
            foreach ($data['members'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\MemberInput', 'json', $context);
            }
            $object->setMembers($values);
        } elseif (\array_key_exists('members', $data) && null === $data['members']) {
            $object->setMembers(null);
        }
        if (\array_key_exists('start', $data) && null !== $data['start']) {
            $object->setStart($data['start']);
        } elseif (\array_key_exists('start', $data) && null === $data['start']) {
            $object->setStart(null);
        }
        if (\array_key_exists('relatedFilesEnable', $data) && null !== $data['relatedFilesEnable']) {
            $object->setRelatedFilesEnable($data['relatedFilesEnable']);
        } elseif (\array_key_exists('relatedFilesEnable', $data) && null === $data['relatedFilesEnable']) {
            $object->setRelatedFilesEnable(null);
        }
        if (\array_key_exists('archive', $data) && null !== $data['archive']) {
            $object->setArchive($data['archive']);
        } elseif (\array_key_exists('archive', $data) && null === $data['archive']) {
            $object->setArchive(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if (null !== $object->getExpiresAt()) {
            $data['expiresAt'] = $object->getExpiresAt()->format('Y-m-d');
        }
        if (null !== $object->getTemplate()) {
            $data['template'] = $object->getTemplate();
        }
        if (null !== $object->getOrdered()) {
            $data['ordered'] = $object->getOrdered();
        }
        if (null !== $object->getMetadata()) {
            $data['metadata'] = $this->normalizer->normalize($object->getMetadata(), 'json', $context);
        }
        if (null !== $object->getConfig()) {
            $data['config'] = $this->normalizer->normalize($object->getConfig(), 'json', $context);
        }
        if (null !== $object->getMembers()) {
            $values = [];
            foreach ($object->getMembers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['members'] = $values;
        }
        if (null !== $object->getStart()) {
            $data['start'] = $object->getStart();
        }
        if (null !== $object->getRelatedFilesEnable()) {
            $data['relatedFilesEnable'] = $object->getRelatedFilesEnable();
        }
        if (null !== $object->getArchive()) {
            $data['archive'] = $object->getArchive();
        }

        return $data;
    }
}
