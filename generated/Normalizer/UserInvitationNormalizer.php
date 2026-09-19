<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UserInvitation;
use Qdequippe\Yousign\Api\Model\UserWorkspacesInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UserInvitationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UserInvitation::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UserInvitation::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UserInvitation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($data['email']);
            unset($data['email']);
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
            unset($data['email']);
        }
        if (\array_key_exists('role', $data) && null !== $data['role']) {
            $object->setRole($data['role']);
            unset($data['role']);
        } elseif (\array_key_exists('role', $data) && null === $data['role']) {
            $object->setRole(null);
            unset($data['role']);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $values = [];
            foreach ($data['workspaces'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, UserWorkspacesInner::class, 'json', $context);
            }
            $object->setWorkspaces($values);
            unset($data['workspaces']);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
            unset($data['workspaces']);
        }
        if (\array_key_exists('expired_at', $data) && null !== $data['expired_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expired_at']);
            if (false === $date) {
                throw new InvalidDateException($data['expired_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setExpiredAt($date);
            unset($data['expired_at']);
        } elseif (\array_key_exists('expired_at', $data) && null === $data['expired_at']) {
            $object->setExpiredAt(null);
            unset($data['expired_at']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date_1);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['role'] = $data->getRole();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UserInvitation::class => false];
    }
}
