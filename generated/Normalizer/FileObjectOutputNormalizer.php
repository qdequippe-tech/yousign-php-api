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

class FileObjectOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\FileObjectOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\FileObjectOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\FileObjectOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($this->denormalizer->denormalize($data['file'], 'Qdequippe\\Yousign\\Api\\Model\\FileOutput', 'json', $context));
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
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
        if (\array_key_exists('mention2 (internal)', $data) && null !== $data['mention2 (internal)']) {
            $object->setMention2Internal($data['mention2 (internal)']);
        } elseif (\array_key_exists('mention2 (internal)', $data) && null === $data['mention2 (internal)']) {
            $object->setMention2Internal(null);
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
        if (\array_key_exists('executedAt', $data) && null !== $data['executedAt']) {
            $object->setExecutedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['executedAt']));
        } elseif (\array_key_exists('executedAt', $data) && null === $data['executedAt']) {
            $object->setExecutedAt(null);
        }
        if (\array_key_exists('reason', $data) && null !== $data['reason']) {
            $object->setReason($data['reason']);
        } elseif (\array_key_exists('reason', $data) && null === $data['reason']) {
            $object->setReason(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('contentRequired', $data) && null !== $data['contentRequired']) {
            $object->setContentRequired($data['contentRequired']);
        } elseif (\array_key_exists('contentRequired', $data) && null === $data['contentRequired']) {
            $object->setContentRequired(null);
        }
        if (\array_key_exists('content', $data) && null !== $data['content']) {
            $object->setContent($data['content']);
        } elseif (\array_key_exists('content', $data) && null === $data['content']) {
            $object->setContent(null);
        }
        if (\array_key_exists('fontFamily', $data) && null !== $data['fontFamily']) {
            $object->setFontFamily($data['fontFamily']);
        } elseif (\array_key_exists('fontFamily', $data) && null === $data['fontFamily']) {
            $object->setFontFamily(null);
        }
        if (\array_key_exists('fontSize', $data) && null !== $data['fontSize']) {
            $object->setFontSize($data['fontSize']);
        } elseif (\array_key_exists('fontSize', $data) && null === $data['fontSize']) {
            $object->setFontSize(null);
        }
        if (\array_key_exists('fontColor', $data) && null !== $data['fontColor']) {
            $object->setFontColor($data['fontColor']);
        } elseif (\array_key_exists('fontColor', $data) && null === $data['fontColor']) {
            $object->setFontColor(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        $data['file'] = $this->normalizer->normalize($object->getFile(), 'json', $context);
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
        if (null !== $object->getMention2Internal()) {
            $data['mention2 (internal)'] = $object->getMention2Internal();
        }
        if (null !== $object->getCreatedAt()) {
            $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUpdatedAt()) {
            $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getExecutedAt()) {
            $data['executedAt'] = $object->getExecutedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getReason()) {
            $data['reason'] = $object->getReason();
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        if (null !== $object->getContentRequired()) {
            $data['contentRequired'] = $object->getContentRequired();
        }
        if (null !== $object->getContent()) {
            $data['content'] = $object->getContent();
        }
        if (null !== $object->getFontFamily()) {
            $data['fontFamily'] = $object->getFontFamily();
        }
        if (null !== $object->getFontSize()) {
            $data['fontSize'] = $object->getFontSize();
        }
        if (null !== $object->getFontColor()) {
            $data['fontColor'] = $object->getFontColor();
        }

        return $data;
    }
}
