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

class WorkspaceConfigEmailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfigEmail' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfigEmail' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\WorkspaceConfigEmail();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('procedure.started', $data) && null !== $data['procedure.started']) {
            $values = [];
            foreach ($data['procedure.started'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setProcedureStarted($values);
        } elseif (\array_key_exists('procedure.started', $data) && null === $data['procedure.started']) {
            $object->setProcedureStarted(null);
        }
        if (\array_key_exists('procedure.finished', $data) && null !== $data['procedure.finished']) {
            $values_1 = [];
            foreach ($data['procedure.finished'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setProcedureFinished($values_1);
        } elseif (\array_key_exists('procedure.finished', $data) && null === $data['procedure.finished']) {
            $object->setProcedureFinished(null);
        }
        if (\array_key_exists('procedure.refused', $data) && null !== $data['procedure.refused']) {
            $values_2 = [];
            foreach ($data['procedure.refused'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setProcedureRefused($values_2);
        } elseif (\array_key_exists('procedure.refused', $data) && null === $data['procedure.refused']) {
            $object->setProcedureRefused(null);
        }
        if (\array_key_exists('procedure.expired', $data) && null !== $data['procedure.expired']) {
            $values_3 = [];
            foreach ($data['procedure.expired'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setProcedureExpired($values_3);
        } elseif (\array_key_exists('procedure.expired', $data) && null === $data['procedure.expired']) {
            $object->setProcedureExpired(null);
        }
        if (\array_key_exists('procedure.deleted', $data) && null !== $data['procedure.deleted']) {
            $values_4 = [];
            foreach ($data['procedure.deleted'] as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setProcedureDeleted($values_4);
        } elseif (\array_key_exists('procedure.deleted', $data) && null === $data['procedure.deleted']) {
            $object->setProcedureDeleted(null);
        }
        if (\array_key_exists('member.started', $data) && null !== $data['member.started']) {
            $values_5 = [];
            foreach ($data['member.started'] as $value_5) {
                $values_5[] = $this->denormalizer->denormalize($value_5, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setMemberStarted($values_5);
        } elseif (\array_key_exists('member.started', $data) && null === $data['member.started']) {
            $object->setMemberStarted(null);
        }
        if (\array_key_exists('member.finished', $data) && null !== $data['member.finished']) {
            $values_6 = [];
            foreach ($data['member.finished'] as $value_6) {
                $values_6[] = $this->denormalizer->denormalize($value_6, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setMemberFinished($values_6);
        } elseif (\array_key_exists('member.finished', $data) && null === $data['member.finished']) {
            $object->setMemberFinished(null);
        }
        if (\array_key_exists('comment.created', $data) && null !== $data['comment.created']) {
            $values_7 = [];
            foreach ($data['comment.created'] as $value_7) {
                $values_7[] = $this->denormalizer->denormalize($value_7, 'Qdequippe\\Yousign\\Api\\Model\\ConfigEmailTemplate', 'json', $context);
            }
            $object->setCommentCreated($values_7);
        } elseif (\array_key_exists('comment.created', $data) && null === $data['comment.created']) {
            $object->setCommentCreated(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getProcedureStarted()) {
            $values = [];
            foreach ($object->getProcedureStarted() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['procedure.started'] = $values;
        }
        if (null !== $object->getProcedureFinished()) {
            $values_1 = [];
            foreach ($object->getProcedureFinished() as $value_1) {
                $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data['procedure.finished'] = $values_1;
        }
        if (null !== $object->getProcedureRefused()) {
            $values_2 = [];
            foreach ($object->getProcedureRefused() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['procedure.refused'] = $values_2;
        }
        if (null !== $object->getProcedureExpired()) {
            $values_3 = [];
            foreach ($object->getProcedureExpired() as $value_3) {
                $values_3[] = $this->normalizer->normalize($value_3, 'json', $context);
            }
            $data['procedure.expired'] = $values_3;
        }
        if (null !== $object->getProcedureDeleted()) {
            $values_4 = [];
            foreach ($object->getProcedureDeleted() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data['procedure.deleted'] = $values_4;
        }
        if (null !== $object->getMemberStarted()) {
            $values_5 = [];
            foreach ($object->getMemberStarted() as $value_5) {
                $values_5[] = $this->normalizer->normalize($value_5, 'json', $context);
            }
            $data['member.started'] = $values_5;
        }
        if (null !== $object->getMemberFinished()) {
            $values_6 = [];
            foreach ($object->getMemberFinished() as $value_6) {
                $values_6[] = $this->normalizer->normalize($value_6, 'json', $context);
            }
            $data['member.finished'] = $values_6;
        }
        if (null !== $object->getCommentCreated()) {
            $values_7 = [];
            foreach ($object->getCommentCreated() as $value_7) {
                $values_7[] = $this->normalizer->normalize($value_7, 'json', $context);
            }
            $data['comment.created'] = $values_7;
        }

        return $data;
    }
}
