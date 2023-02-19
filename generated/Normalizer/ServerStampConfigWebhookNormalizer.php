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

class ServerStampConfigWebhookNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\ServerStampConfigWebhook' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\ServerStampConfigWebhook' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\ServerStampConfigWebhook();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('server_stamp.finished', $data) && null !== $data['server_stamp.finished']) {
            $values = [];
            foreach ($data['server_stamp.finished'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\ConfigWebhookTemplate', 'json', $context);
            }
            $object->setServerStampFinished($values);
        } elseif (\array_key_exists('server_stamp.finished', $data) && null === $data['server_stamp.finished']) {
            $object->setServerStampFinished(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getServerStampFinished()) {
            $values = [];
            foreach ($object->getServerStampFinished() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['server_stamp.finished'] = $values;
        }

        return $data;
    }
}
