<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Contact;
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
    class ContactNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Contact::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Contact::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Contact();
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
            if (\array_key_exists('locale', $data) && null !== $data['locale']) {
                $object->setLocale($data['locale']);
                unset($data['locale']);
            } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
                $object->setLocale(null);
            }
            if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
                $object->setPhoneNumber($data['phone_number']);
                unset($data['phone_number']);
            } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
                $object->setPhoneNumber(null);
            }
            if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
                $object->setCompanyName($data['company_name']);
                unset($data['company_name']);
            } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
                $object->setCompanyName(null);
            }
            if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
                $object->setJobTitle($data['job_title']);
                unset($data['job_title']);
            } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
                $object->setJobTitle(null);
            }
            if (\array_key_exists('address_line_1', $data) && null !== $data['address_line_1']) {
                $object->setAddressLine1($data['address_line_1']);
                unset($data['address_line_1']);
            } elseif (\array_key_exists('address_line_1', $data) && null === $data['address_line_1']) {
                $object->setAddressLine1(null);
            }
            if (\array_key_exists('address_line_2', $data) && null !== $data['address_line_2']) {
                $object->setAddressLine2($data['address_line_2']);
                unset($data['address_line_2']);
            } elseif (\array_key_exists('address_line_2', $data) && null === $data['address_line_2']) {
                $object->setAddressLine2(null);
            }
            if (\array_key_exists('address_city', $data) && null !== $data['address_city']) {
                $object->setAddressCity($data['address_city']);
                unset($data['address_city']);
            } elseif (\array_key_exists('address_city', $data) && null === $data['address_city']) {
                $object->setAddressCity(null);
            }
            if (\array_key_exists('address_postal_code', $data) && null !== $data['address_postal_code']) {
                $object->setAddressPostalCode($data['address_postal_code']);
                unset($data['address_postal_code']);
            } elseif (\array_key_exists('address_postal_code', $data) && null === $data['address_postal_code']) {
                $object->setAddressPostalCode(null);
            }
            if (\array_key_exists('address_country', $data) && null !== $data['address_country']) {
                $object->setAddressCountry($data['address_country']);
                unset($data['address_country']);
            } elseif (\array_key_exists('address_country', $data) && null === $data['address_country']) {
                $object->setAddressCountry(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
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
            $data['locale'] = $object->getLocale();
            $data['phone_number'] = $object->getPhoneNumber();
            $data['company_name'] = $object->getCompanyName();
            $data['job_title'] = $object->getJobTitle();
            $data['address_line_1'] = $object->getAddressLine1();
            $data['address_line_2'] = $object->getAddressLine2();
            $data['address_city'] = $object->getAddressCity();
            $data['address_postal_code'] = $object->getAddressPostalCode();
            $data['address_country'] = $object->getAddressCountry();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Contact::class => false];
        }
    }
} else {
    class ContactNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Contact::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Contact::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Contact();
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
            if (\array_key_exists('locale', $data) && null !== $data['locale']) {
                $object->setLocale($data['locale']);
                unset($data['locale']);
            } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
                $object->setLocale(null);
            }
            if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
                $object->setPhoneNumber($data['phone_number']);
                unset($data['phone_number']);
            } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
                $object->setPhoneNumber(null);
            }
            if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
                $object->setCompanyName($data['company_name']);
                unset($data['company_name']);
            } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
                $object->setCompanyName(null);
            }
            if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
                $object->setJobTitle($data['job_title']);
                unset($data['job_title']);
            } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
                $object->setJobTitle(null);
            }
            if (\array_key_exists('address_line_1', $data) && null !== $data['address_line_1']) {
                $object->setAddressLine1($data['address_line_1']);
                unset($data['address_line_1']);
            } elseif (\array_key_exists('address_line_1', $data) && null === $data['address_line_1']) {
                $object->setAddressLine1(null);
            }
            if (\array_key_exists('address_line_2', $data) && null !== $data['address_line_2']) {
                $object->setAddressLine2($data['address_line_2']);
                unset($data['address_line_2']);
            } elseif (\array_key_exists('address_line_2', $data) && null === $data['address_line_2']) {
                $object->setAddressLine2(null);
            }
            if (\array_key_exists('address_city', $data) && null !== $data['address_city']) {
                $object->setAddressCity($data['address_city']);
                unset($data['address_city']);
            } elseif (\array_key_exists('address_city', $data) && null === $data['address_city']) {
                $object->setAddressCity(null);
            }
            if (\array_key_exists('address_postal_code', $data) && null !== $data['address_postal_code']) {
                $object->setAddressPostalCode($data['address_postal_code']);
                unset($data['address_postal_code']);
            } elseif (\array_key_exists('address_postal_code', $data) && null === $data['address_postal_code']) {
                $object->setAddressPostalCode(null);
            }
            if (\array_key_exists('address_country', $data) && null !== $data['address_country']) {
                $object->setAddressCountry($data['address_country']);
                unset($data['address_country']);
            } elseif (\array_key_exists('address_country', $data) && null === $data['address_country']) {
                $object->setAddressCountry(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['first_name'] = $object->getFirstName();
            $data['last_name'] = $object->getLastName();
            $data['email'] = $object->getEmail();
            $data['locale'] = $object->getLocale();
            $data['phone_number'] = $object->getPhoneNumber();
            $data['company_name'] = $object->getCompanyName();
            $data['job_title'] = $object->getJobTitle();
            $data['address_line_1'] = $object->getAddressLine1();
            $data['address_line_2'] = $object->getAddressLine2();
            $data['address_city'] = $object->getAddressCity();
            $data['address_postal_code'] = $object->getAddressPostalCode();
            $data['address_country'] = $object->getAddressCountry();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Contact::class => false];
        }
    }
}
