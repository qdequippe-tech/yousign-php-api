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

class MemberInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\MemberInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\MemberInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\MemberInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('user', $data) && null !== $data['user']) {
            $object->setUser($data['user']);
        } elseif (\array_key_exists('user', $data) && null === $data['user']) {
            $object->setUser(null);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
        }
        if (\array_key_exists('firstname', $data) && null !== $data['firstname']) {
            $object->setFirstname($data['firstname']);
        } elseif (\array_key_exists('firstname', $data) && null === $data['firstname']) {
            $object->setFirstname(null);
        }
        if (\array_key_exists('lastname', $data) && null !== $data['lastname']) {
            $object->setLastname($data['lastname']);
        } elseif (\array_key_exists('lastname', $data) && null === $data['lastname']) {
            $object->setLastname(null);
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($data['email']);
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
        }
        if (\array_key_exists('phone', $data) && null !== $data['phone']) {
            $object->setPhone($data['phone']);
        } elseif (\array_key_exists('phone', $data) && null === $data['phone']) {
            $object->setPhone(null);
        }
        if (\array_key_exists('position', $data) && null !== $data['position']) {
            $object->setPosition($data['position']);
        } elseif (\array_key_exists('position', $data) && null === $data['position']) {
            $object->setPosition(null);
        }
        if (\array_key_exists('fileObjects', $data) && null !== $data['fileObjects']) {
            $values = [];
            foreach ($data['fileObjects'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\FileObjectInput', 'json', $context);
            }
            $object->setFileObjects($values);
        } elseif (\array_key_exists('fileObjects', $data) && null === $data['fileObjects']) {
            $object->setFileObjects(null);
        }
        if (\array_key_exists('procedure', $data) && null !== $data['procedure']) {
            $object->setProcedure($data['procedure']);
        } elseif (\array_key_exists('procedure', $data) && null === $data['procedure']) {
            $object->setProcedure(null);
        }
        if (\array_key_exists('operationLevel', $data) && null !== $data['operationLevel']) {
            $object->setOperationLevel($data['operationLevel']);
        } elseif (\array_key_exists('operationLevel', $data) && null === $data['operationLevel']) {
            $object->setOperationLevel(null);
        }
        if (\array_key_exists('operationCustomModes', $data) && null !== $data['operationCustomModes']) {
            $values_1 = [];
            foreach ($data['operationCustomModes'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setOperationCustomModes($values_1);
        } elseif (\array_key_exists('operationCustomModes', $data) && null === $data['operationCustomModes']) {
            $object->setOperationCustomModes(null);
        }
        if (\array_key_exists('operationModeSmsConfig', $data) && null !== $data['operationModeSmsConfig']) {
            $object->setOperationModeSmsConfig($this->denormalizer->denormalize($data['operationModeSmsConfig'], 'Qdequippe\\Yousign\\Api\\Model\\OperationModeSmsConfiguration', 'json', $context));
        } elseif (\array_key_exists('operationModeSmsConfig', $data) && null === $data['operationModeSmsConfig']) {
            $object->setOperationModeSmsConfig(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getUser()) {
            $data['user'] = $object->getUser();
        }
        if (null !== $object->getType()) {
            $data['type'] = $object->getType();
        }
        if (null !== $object->getFirstname()) {
            $data['firstname'] = $object->getFirstname();
        }
        if (null !== $object->getLastname()) {
            $data['lastname'] = $object->getLastname();
        }
        if (null !== $object->getEmail()) {
            $data['email'] = $object->getEmail();
        }
        if (null !== $object->getPhone()) {
            $data['phone'] = $object->getPhone();
        }
        if (null !== $object->getPosition()) {
            $data['position'] = $object->getPosition();
        }
        if (null !== $object->getFileObjects()) {
            $values = [];
            foreach ($object->getFileObjects() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['fileObjects'] = $values;
        }
        if (null !== $object->getProcedure()) {
            $data['procedure'] = $object->getProcedure();
        }
        if (null !== $object->getOperationLevel()) {
            $data['operationLevel'] = $object->getOperationLevel();
        }
        if (null !== $object->getOperationCustomModes()) {
            $values_1 = [];
            foreach ($object->getOperationCustomModes() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['operationCustomModes'] = $values_1;
        }
        if (null !== $object->getOperationModeSmsConfig()) {
            $data['operationModeSmsConfig'] = $this->normalizer->normalize($object->getOperationModeSmsConfig(), 'json', $context);
        }

        return $data;
    }
}
