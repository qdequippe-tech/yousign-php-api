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

class CheckDocumentIdentitiesInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentIdentitiesInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentIdentitiesInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\CheckDocumentIdentitiesInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
        }
        if (\array_key_exists('firstNames', $data) && null !== $data['firstNames']) {
            $values = [];
            foreach ($data['firstNames'] as $value) {
                $values[] = $value;
            }
            $object->setFirstNames($values);
        } elseif (\array_key_exists('firstNames', $data) && null === $data['firstNames']) {
            $object->setFirstNames(null);
        }
        if (\array_key_exists('birthName', $data) && null !== $data['birthName']) {
            $object->setBirthName($data['birthName']);
        } elseif (\array_key_exists('birthName', $data) && null === $data['birthName']) {
            $object->setBirthName(null);
        }
        if (\array_key_exists('birthDate', $data) && null !== $data['birthDate']) {
            $object->setBirthDate(\DateTime::createFromFormat('Y-m-d', $data['birthDate'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('birthDate', $data) && null === $data['birthDate']) {
            $object->setBirthDate(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['file'] = $object->getFile();
        if (null !== $object->getFirstNames()) {
            $values = [];
            foreach ($object->getFirstNames() as $value) {
                $values[] = $value;
            }
            $data['firstNames'] = $values;
        }
        if (null !== $object->getBirthName()) {
            $data['birthName'] = $object->getBirthName();
        }
        if (null !== $object->getBirthDate()) {
            $data['birthDate'] = $object->getBirthDate()->format('Y-m-d');
        }

        return $data;
    }
}
