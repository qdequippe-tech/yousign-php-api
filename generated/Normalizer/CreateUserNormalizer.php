<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateUser;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateUserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateUser::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateUser::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateUser();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('locale', $data) && null !== $data['locale']) {
            $object->setLocale($data['locale']);
            unset($data['locale']);
        } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
            $object->setLocale(null);
            unset($data['locale']);
        }
        if (\array_key_exists('workspaces', $data) && null !== $data['workspaces']) {
            $values = [];
            foreach ($data['workspaces'] as $value) {
                $values[] = $value;
            }
            $object->setWorkspaces($values);
            unset($data['workspaces']);
        } elseif (\array_key_exists('workspaces', $data) && null === $data['workspaces']) {
            $object->setWorkspaces(null);
            unset($data['workspaces']);
        }
        if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
            $object->setFirstName($data['first_name']);
            unset($data['first_name']);
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
            unset($data['first_name']);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
            unset($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
            unset($data['last_name']);
        }
        if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
            $object->setPhoneNumber($data['phone_number']);
            unset($data['phone_number']);
        } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
            $object->setPhoneNumber(null);
            unset($data['phone_number']);
        }
        if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
            $object->setJobTitle($data['job_title']);
            unset($data['job_title']);
        } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
            $object->setJobTitle(null);
            unset($data['job_title']);
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
        $dataArray['email'] = $data->getEmail();
        $dataArray['role'] = $data->getRole();
        $dataArray['locale'] = $data->getLocale();
        $values = [];
        foreach ($data->getWorkspaces() as $value) {
            $values[] = $value;
        }
        $dataArray['workspaces'] = $values;
        if ($data->isInitialized('firstName') && null !== $data->getFirstName()) {
            $dataArray['first_name'] = $data->getFirstName();
        }
        if ($data->isInitialized('lastName') && null !== $data->getLastName()) {
            $dataArray['last_name'] = $data->getLastName();
        }
        if ($data->isInitialized('phoneNumber') && null !== $data->getPhoneNumber()) {
            $dataArray['phone_number'] = $data->getPhoneNumber();
        }
        if ($data->isInitialized('jobTitle') && null !== $data->getJobTitle()) {
            $dataArray['job_title'] = $data->getJobTitle();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateUser::class => false];
    }
}
