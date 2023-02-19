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

class WorkspaceConfigNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfig' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfig' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\WorkspaceConfig();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('authenticationModes', $data) && null !== $data['authenticationModes']) {
            $values = [];
            foreach ($data['authenticationModes'] as $value) {
                $values[] = $value;
            }
            $object->setAuthenticationModes($values);
        } elseif (\array_key_exists('authenticationModes', $data) && null === $data['authenticationModes']) {
            $object->setAuthenticationModes(null);
        }
        if (\array_key_exists('procedure', $data) && null !== $data['procedure']) {
            $object->setProcedure($this->denormalizer->denormalize($data['procedure'], 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfigProcedure', 'json', $context));
        } elseif (\array_key_exists('procedure', $data) && null === $data['procedure']) {
            $object->setProcedure(null);
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($this->denormalizer->denormalize($data['email'], 'Qdequippe\\Yousign\\Api\\Model\\WorkspaceConfigEmail', 'json', $context));
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getAuthenticationModes()) {
            $values = [];
            foreach ($object->getAuthenticationModes() as $value) {
                $values[] = $value;
            }
            $data['authenticationModes'] = $values;
        }
        if (null !== $object->getProcedure()) {
            $data['procedure'] = $this->normalizer->normalize($object->getProcedure(), 'json', $context);
        }
        if (null !== $object->getEmail()) {
            $data['email'] = $this->normalizer->normalize($object->getEmail(), 'json', $context);
        }

        return $data;
    }
}
