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

class ProcedureOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ProcedureOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ProcedureOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ProcedureOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
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
        if (\array_key_exists('expiresAt', $data) && null !== $data['expiresAt']) {
            $object->setExpiresAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['expiresAt']));
        } elseif (\array_key_exists('expiresAt', $data) && null === $data['expiresAt']) {
            $object->setExpiresAt(null);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('creator', $data) && null !== $data['creator']) {
            $object->setCreator($data['creator']);
        } elseif (\array_key_exists('creator', $data) && null === $data['creator']) {
            $object->setCreator(null);
        }
        if (\array_key_exists('creatorFirstName', $data) && null !== $data['creatorFirstName']) {
            $object->setCreatorFirstName($data['creatorFirstName']);
        } elseif (\array_key_exists('creatorFirstName', $data) && null === $data['creatorFirstName']) {
            $object->setCreatorFirstName(null);
        }
        if (\array_key_exists('creatorLastName', $data) && null !== $data['creatorLastName']) {
            $object->setCreatorLastName($data['creatorLastName']);
        } elseif (\array_key_exists('creatorLastName', $data) && null === $data['creatorLastName']) {
            $object->setCreatorLastName(null);
        }
        if (\array_key_exists('workspace', $data) && null !== $data['workspace']) {
            $object->setWorkspace($data['workspace']);
        } elseif (\array_key_exists('workspace', $data) && null === $data['workspace']) {
            $object->setWorkspace(null);
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
        if (\array_key_exists('parent', $data) && null !== $data['parent']) {
            $object->setParent($data['parent']);
        } elseif (\array_key_exists('parent', $data) && null === $data['parent']) {
            $object->setParent(null);
        }
        if (\array_key_exists('metadata', $data) && null !== $data['metadata']) {
            $object->setMetadata($this->denormalizer->denormalize($data['metadata'], 'Qdequippe\\Yousign\\Api\\Model\\ProcedureOutputMetadata', 'json', $context));
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
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\MemberOutput', 'json', $context);
            }
            $object->setMembers($values);
        } elseif (\array_key_exists('members', $data) && null === $data['members']) {
            $object->setMembers(null);
        }
        if (\array_key_exists('files', $data) && null !== $data['files']) {
            $values_1 = [];
            foreach ($data['files'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Qdequippe\\Yousign\\Api\\Model\\FileOutput', 'json', $context);
            }
            $object->setFiles($values_1);
        } elseif (\array_key_exists('files', $data) && null === $data['files']) {
            $object->setFiles(null);
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
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if (null !== $object->getCreatedAt()) {
            $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUpdatedAt()) {
            $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getExpiresAt()) {
            $data['expiresAt'] = $object->getExpiresAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getCreator()) {
            $data['creator'] = $object->getCreator();
        }
        if (null !== $object->getCreatorFirstName()) {
            $data['creatorFirstName'] = $object->getCreatorFirstName();
        }
        if (null !== $object->getCreatorLastName()) {
            $data['creatorLastName'] = $object->getCreatorLastName();
        }
        if (null !== $object->getWorkspace()) {
            $data['workspace'] = $object->getWorkspace();
        }
        if (null !== $object->getTemplate()) {
            $data['template'] = $object->getTemplate();
        }
        if (null !== $object->getOrdered()) {
            $data['ordered'] = $object->getOrdered();
        }
        if (null !== $object->getParent()) {
            $data['parent'] = $object->getParent();
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
        if (null !== $object->getFiles()) {
            $values_1 = [];
            foreach ($object->getFiles() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['files'] = $values_1;
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
