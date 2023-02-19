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

class UserInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\UserInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\UserInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\UserInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
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
        if (\array_key_exists('title', $data) && null !== $data['title']) {
            $object->setTitle($data['title']);
        } elseif (\array_key_exists('title', $data) && null === $data['title']) {
            $object->setTitle(null);
        }
        if (\array_key_exists('phone', $data) && null !== $data['phone']) {
            $object->setPhone($data['phone']);
        } elseif (\array_key_exists('phone', $data) && null === $data['phone']) {
            $object->setPhone(null);
        }
        if (\array_key_exists('permission', $data) && null !== $data['permission']) {
            $object->setPermission($data['permission']);
        } elseif (\array_key_exists('permission', $data) && null === $data['permission']) {
            $object->setPermission(null);
        }
        if (\array_key_exists('group', $data) && null !== $data['group']) {
            $object->setGroup($data['group']);
        } elseif (\array_key_exists('group', $data) && null === $data['group']) {
            $object->setGroup(null);
        }
        if (\array_key_exists('config', $data) && null !== $data['config']) {
            $object->setConfig($data['config']);
        } elseif (\array_key_exists('config', $data) && null === $data['config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('defaultSignImage', $data) && null !== $data['defaultSignImage']) {
            $object->setDefaultSignImage($data['defaultSignImage']);
        } elseif (\array_key_exists('defaultSignImage', $data) && null === $data['defaultSignImage']) {
            $object->setDefaultSignImage(null);
        }
        if (\array_key_exists('notifications', $data) && null !== $data['notifications']) {
            $object->setNotifications($this->denormalizer->denormalize($data['notifications'], 'Qdequippe\\Yousign\\Api\\Model\\UserInputNotifications', 'json', $context));
        } elseif (\array_key_exists('notifications', $data) && null === $data['notifications']) {
            $object->setNotifications(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['firstname'] = $object->getFirstname();
        $data['lastname'] = $object->getLastname();
        $data['email'] = $object->getEmail();
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if (null !== $object->getPhone()) {
            $data['phone'] = $object->getPhone();
        }
        if (null !== $object->getPermission()) {
            $data['permission'] = $object->getPermission();
        }
        if (null !== $object->getGroup()) {
            $data['group'] = $object->getGroup();
        }
        if (null !== $object->getConfig()) {
            $data['config'] = $object->getConfig();
        }
        if (null !== $object->getDefaultSignImage()) {
            $data['defaultSignImage'] = $object->getDefaultSignImage();
        }
        if (null !== $object->getNotifications()) {
            $data['notifications'] = $this->normalizer->normalize($object->getNotifications(), 'json', $context);
        }

        return $data;
    }
}
