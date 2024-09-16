<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\User;
use Qdequippe\Yousign\Api\Model\UserWorkspacesInner;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class UserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return User::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && User::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new User();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('email', $data) && null !== $data['email']) {
                $object->setEmail($data['email']);
                unset($data['email']);
            } elseif (\array_key_exists('email', $data) && null === $data['email']) {
                $object->setEmail(null);
            }
            if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
                $object->setPhoneNumber($data['phone_number']);
                unset($data['phone_number']);
            } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
                $object->setPhoneNumber(null);
            }
            if (\array_key_exists('locale', $data) && null !== $data['locale']) {
                $object->setLocale($data['locale']);
                unset($data['locale']);
            } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
                $object->setLocale(null);
            }
            if (\array_key_exists('avatar', $data) && null !== $data['avatar']) {
                $object->setAvatar($data['avatar']);
                unset($data['avatar']);
            } elseif (\array_key_exists('avatar', $data) && null === $data['avatar']) {
                $object->setAvatar(null);
            }
            if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
                $object->setJobTitle($data['job_title']);
                unset($data['job_title']);
            } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
                $object->setJobTitle(null);
            }
            if (\array_key_exists('is_active', $data) && null !== $data['is_active']) {
                $object->setIsActive($data['is_active']);
                unset($data['is_active']);
            } elseif (\array_key_exists('is_active', $data) && null === $data['is_active']) {
                $object->setIsActive(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('role', $data) && null !== $data['role']) {
                $object->setRole($data['role']);
                unset($data['role']);
            } elseif (\array_key_exists('role', $data) && null === $data['role']) {
                $object->setRole(null);
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
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['first_name'] = $object->getFirstName();
            $data['last_name'] = $object->getLastName();
            $data['email'] = $object->getEmail();
            $data['phone_number'] = $object->getPhoneNumber();
            $data['locale'] = $object->getLocale();
            $data['avatar'] = $object->getAvatar();
            $data['job_title'] = $object->getJobTitle();
            $data['is_active'] = $object->getIsActive();
            $data['role'] = $object->getRole();
            if ($object->isInitialized('workspaces') && null !== $object->getWorkspaces()) {
                $values = [];
                foreach ($object->getWorkspaces() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['workspaces'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [User::class => false];
        }
    }
} else {
    class UserNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return User::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && User::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new User();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('email', $data) && null !== $data['email']) {
                $object->setEmail($data['email']);
                unset($data['email']);
            } elseif (\array_key_exists('email', $data) && null === $data['email']) {
                $object->setEmail(null);
            }
            if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
                $object->setPhoneNumber($data['phone_number']);
                unset($data['phone_number']);
            } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
                $object->setPhoneNumber(null);
            }
            if (\array_key_exists('locale', $data) && null !== $data['locale']) {
                $object->setLocale($data['locale']);
                unset($data['locale']);
            } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
                $object->setLocale(null);
            }
            if (\array_key_exists('avatar', $data) && null !== $data['avatar']) {
                $object->setAvatar($data['avatar']);
                unset($data['avatar']);
            } elseif (\array_key_exists('avatar', $data) && null === $data['avatar']) {
                $object->setAvatar(null);
            }
            if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
                $object->setJobTitle($data['job_title']);
                unset($data['job_title']);
            } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
                $object->setJobTitle(null);
            }
            if (\array_key_exists('is_active', $data) && null !== $data['is_active']) {
                $object->setIsActive($data['is_active']);
                unset($data['is_active']);
            } elseif (\array_key_exists('is_active', $data) && null === $data['is_active']) {
                $object->setIsActive(null);
            }
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('role', $data) && null !== $data['role']) {
                $object->setRole($data['role']);
                unset($data['role']);
            } elseif (\array_key_exists('role', $data) && null === $data['role']) {
                $object->setRole(null);
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
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['first_name'] = $object->getFirstName();
            $data['last_name'] = $object->getLastName();
            $data['email'] = $object->getEmail();
            $data['phone_number'] = $object->getPhoneNumber();
            $data['locale'] = $object->getLocale();
            $data['avatar'] = $object->getAvatar();
            $data['job_title'] = $object->getJobTitle();
            $data['is_active'] = $object->getIsActive();
            $data['role'] = $object->getRole();
            if ($object->isInitialized('workspaces') && null !== $object->getWorkspaces()) {
                $values = [];
                foreach ($object->getWorkspaces() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
                }
                $data['workspaces'] = $values;
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [User::class => false];
        }
    }
}
