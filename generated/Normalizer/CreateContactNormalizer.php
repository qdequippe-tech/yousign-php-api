<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateContact;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateContactNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateContact::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateContact::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateContact();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
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
        if (\array_key_exists('email', $data) && null !== $data['email']) {
            $object->setEmail($data['email']);
            unset($data['email']);
        } elseif (\array_key_exists('email', $data) && null === $data['email']) {
            $object->setEmail(null);
            unset($data['email']);
        }
        if (\array_key_exists('locale', $data) && null !== $data['locale']) {
            $object->setLocale($data['locale']);
            unset($data['locale']);
        } elseif (\array_key_exists('locale', $data) && null === $data['locale']) {
            $object->setLocale(null);
            unset($data['locale']);
        }
        if (\array_key_exists('phone_number', $data) && null !== $data['phone_number']) {
            $object->setPhoneNumber($data['phone_number']);
            unset($data['phone_number']);
        } elseif (\array_key_exists('phone_number', $data) && null === $data['phone_number']) {
            $object->setPhoneNumber(null);
            unset($data['phone_number']);
        }
        if (\array_key_exists('company_name', $data) && null !== $data['company_name']) {
            $object->setCompanyName($data['company_name']);
            unset($data['company_name']);
        } elseif (\array_key_exists('company_name', $data) && null === $data['company_name']) {
            $object->setCompanyName(null);
            unset($data['company_name']);
        }
        if (\array_key_exists('job_title', $data) && null !== $data['job_title']) {
            $object->setJobTitle($data['job_title']);
            unset($data['job_title']);
        } elseif (\array_key_exists('job_title', $data) && null === $data['job_title']) {
            $object->setJobTitle(null);
            unset($data['job_title']);
        }
        if (\array_key_exists('address_line_1', $data) && null !== $data['address_line_1']) {
            $object->setAddressLine1($data['address_line_1']);
            unset($data['address_line_1']);
        } elseif (\array_key_exists('address_line_1', $data) && null === $data['address_line_1']) {
            $object->setAddressLine1(null);
            unset($data['address_line_1']);
        }
        if (\array_key_exists('address_line_2', $data) && null !== $data['address_line_2']) {
            $object->setAddressLine2($data['address_line_2']);
            unset($data['address_line_2']);
        } elseif (\array_key_exists('address_line_2', $data) && null === $data['address_line_2']) {
            $object->setAddressLine2(null);
            unset($data['address_line_2']);
        }
        if (\array_key_exists('address_city', $data) && null !== $data['address_city']) {
            $object->setAddressCity($data['address_city']);
            unset($data['address_city']);
        } elseif (\array_key_exists('address_city', $data) && null === $data['address_city']) {
            $object->setAddressCity(null);
            unset($data['address_city']);
        }
        if (\array_key_exists('address_postal_code', $data) && null !== $data['address_postal_code']) {
            $object->setAddressPostalCode($data['address_postal_code']);
            unset($data['address_postal_code']);
        } elseif (\array_key_exists('address_postal_code', $data) && null === $data['address_postal_code']) {
            $object->setAddressPostalCode(null);
            unset($data['address_postal_code']);
        }
        if (\array_key_exists('address_country', $data) && null !== $data['address_country']) {
            $object->setAddressCountry($data['address_country']);
            unset($data['address_country']);
        } elseif (\array_key_exists('address_country', $data) && null === $data['address_country']) {
            $object->setAddressCountry(null);
            unset($data['address_country']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        foreach ($data as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['first_name'] = $data->getFirstName();
        $dataArray['last_name'] = $data->getLastName();
        $dataArray['email'] = $data->getEmail();
        $dataArray['locale'] = $data->getLocale();
        if ($data->isInitialized('phoneNumber') && null !== $data->getPhoneNumber()) {
            $dataArray['phone_number'] = $data->getPhoneNumber();
        }
        if ($data->isInitialized('companyName') && null !== $data->getCompanyName()) {
            $dataArray['company_name'] = $data->getCompanyName();
        }
        if ($data->isInitialized('jobTitle') && null !== $data->getJobTitle()) {
            $dataArray['job_title'] = $data->getJobTitle();
        }
        if ($data->isInitialized('addressLine1') && null !== $data->getAddressLine1()) {
            $dataArray['address_line_1'] = $data->getAddressLine1();
        }
        if ($data->isInitialized('addressLine2') && null !== $data->getAddressLine2()) {
            $dataArray['address_line_2'] = $data->getAddressLine2();
        }
        if ($data->isInitialized('addressCity') && null !== $data->getAddressCity()) {
            $dataArray['address_city'] = $data->getAddressCity();
        }
        if ($data->isInitialized('addressPostalCode') && null !== $data->getAddressPostalCode()) {
            $dataArray['address_postal_code'] = $data->getAddressPostalCode();
        }
        if ($data->isInitialized('addressCountry') && null !== $data->getAddressCountry()) {
            $dataArray['address_country'] = $data->getAddressCountry();
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateContact::class => false];
    }
}
