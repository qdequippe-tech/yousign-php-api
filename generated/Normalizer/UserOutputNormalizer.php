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

class UserOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\UserOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\UserOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\UserOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
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
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
        }
        if (\array_key_exists('organization', $data) && null !== $data['organization']) {
            $object->setOrganization($data['organization']);
        } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
            $object->setOrganization(null);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $values = [];
            foreach ($data['workspaces'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Qdequippe\\Yousign\\Api\\Model\\UserWorkspaceOutput', 'json', $context);
            }
            $object->setWorkspaces($values);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
        }
        if (\array_key_exists('permission', $data) && null !== $data['permission']) {
            $object->setPermission($data['permission']);
        } elseif (\array_key_exists('permission', $data) && null === $data['permission']) {
            $object->setPermission(null);
        }
        if (\array_key_exists('group', $data) && null !== $data['group']) {
            $object->setGroup($this->denormalizer->denormalize($data['group'], 'Qdequippe\\Yousign\\Api\\Model\\UserGroup', 'json', $context));
        } elseif (\array_key_exists('group', $data) && null === $data['group']) {
            $object->setGroup(null);
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
        if (\array_key_exists('deleted', $data) && null !== $data['deleted']) {
            $object->setDeleted($data['deleted']);
        } elseif (\array_key_exists('deleted', $data) && null === $data['deleted']) {
            $object->setDeleted(null);
        }
        if (\array_key_exists('config', $data) && null !== $data['config']) {
            $object->setConfig($data['config']);
        } elseif (\array_key_exists('config', $data) && null === $data['config']) {
            $object->setConfig(null);
        }
        if (\array_key_exists('inweboUserRequest', $data) && null !== $data['inweboUserRequest']) {
            $object->setInweboUserRequest($data['inweboUserRequest']);
        } elseif (\array_key_exists('inweboUserRequest', $data) && null === $data['inweboUserRequest']) {
            $object->setInweboUserRequest(null);
        }
        if (\array_key_exists('samlNameId', $data) && null !== $data['samlNameId']) {
            $object->setSamlNameId($data['samlNameId']);
        } elseif (\array_key_exists('samlNameId', $data) && null === $data['samlNameId']) {
            $object->setSamlNameId(null);
        }
        if (\array_key_exists('defaultSignImage', $data) && null !== $data['defaultSignImage']) {
            $object->setDefaultSignImage($data['defaultSignImage']);
        } elseif (\array_key_exists('defaultSignImage', $data) && null === $data['defaultSignImage']) {
            $object->setDefaultSignImage(null);
        }
        if (\array_key_exists('notifications', $data) && null !== $data['notifications']) {
            $object->setNotifications($this->denormalizer->denormalize($data['notifications'], 'Qdequippe\\Yousign\\Api\\Model\\UserOutputNotifications', 'json', $context));
        } elseif (\array_key_exists('notifications', $data) && null === $data['notifications']) {
            $object->setNotifications(null);
        }
        if (\array_key_exists('fastSign', $data) && null !== $data['fastSign']) {
            $object->setFastSign($data['fastSign']);
        } elseif (\array_key_exists('fastSign', $data) && null === $data['fastSign']) {
            $object->setFastSign(null);
        }
        if (\array_key_exists('fullName', $data) && null !== $data['fullName']) {
            $object->setFullName($data['fullName']);
        } elseif (\array_key_exists('fullName', $data) && null === $data['fullName']) {
            $object->setFullName(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        $data['firstname'] = $object->getFirstname();
        $data['lastname'] = $object->getLastname();
        $data['email'] = $object->getEmail();
        if (null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if (null !== $object->getPhone()) {
            $data['phone'] = $object->getPhone();
        }
        if (null !== $object->getStatus()) {
            $data['status'] = $object->getStatus();
        }
        if (null !== $object->getOrganization()) {
            $data['organization'] = $object->getOrganization();
        }
        if (null !== $object->getWorkspaces()) {
            $values = [];
            foreach ($object->getWorkspaces() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['workspaces'] = $values;
        }
        if (null !== $object->getPermission()) {
            $data['permission'] = $object->getPermission();
        }
        if (null !== $object->getGroup()) {
            $data['group'] = $this->normalizer->normalize($object->getGroup(), 'json', $context);
        }
        if (null !== $object->getCreatedAt()) {
            $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUpdatedAt()) {
            $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getDeleted()) {
            $data['deleted'] = $object->getDeleted();
        }
        if (null !== $object->getConfig()) {
            $data['config'] = $object->getConfig();
        }
        if (null !== $object->getInweboUserRequest()) {
            $data['inweboUserRequest'] = $object->getInweboUserRequest();
        }
        if (null !== $object->getSamlNameId()) {
            $data['samlNameId'] = $object->getSamlNameId();
        }
        if (null !== $object->getDefaultSignImage()) {
            $data['defaultSignImage'] = $object->getDefaultSignImage();
        }
        if (null !== $object->getNotifications()) {
            $data['notifications'] = $this->normalizer->normalize($object->getNotifications(), 'json', $context);
        }
        if (null !== $object->getFastSign()) {
            $data['fastSign'] = $object->getFastSign();
        }
        if (null !== $object->getFullName()) {
            $data['fullName'] = $object->getFullName();
        }

        return $data;
    }
}
