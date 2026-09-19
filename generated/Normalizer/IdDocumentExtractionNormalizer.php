<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdDocumentExtraction;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionAddress;
use Qdequippe\Yousign\Api\Model\IdDocumentExtractionMrz;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdDocumentExtractionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdDocumentExtraction::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdDocumentExtraction::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdDocumentExtraction();
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
        } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
            $object->setFirstName(null);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
        }
        if (\array_key_exists('birth_name', $data) && null !== $data['birth_name']) {
            $object->setBirthName($data['birth_name']);
        } elseif (\array_key_exists('birth_name', $data) && null === $data['birth_name']) {
            $object->setBirthName(null);
        }
        if (\array_key_exists('birth_date', $data) && null !== $data['birth_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['birth_date']);
            if (false === $date) {
                throw new InvalidDateException($data['birth_date'], 'Y-m-d');
            }
            $object->setBirthDate($date->setTime(0, 0, 0));
        } elseif (\array_key_exists('birth_date', $data) && null === $data['birth_date']) {
            $object->setBirthDate(null);
        }
        if (\array_key_exists('birth_location', $data) && null !== $data['birth_location']) {
            $object->setBirthLocation($data['birth_location']);
        } elseif (\array_key_exists('birth_location', $data) && null === $data['birth_location']) {
            $object->setBirthLocation(null);
        }
        if (\array_key_exists('gender', $data) && null !== $data['gender']) {
            $object->setGender($data['gender']);
        } elseif (\array_key_exists('gender', $data) && null === $data['gender']) {
            $object->setGender(null);
        }
        if (\array_key_exists('address', $data) && null !== $data['address']) {
            $object->setAddress($this->denormalizer->denormalize($data['address'], IdDocumentExtractionAddress::class, 'json', $context));
        } elseif (\array_key_exists('address', $data) && null === $data['address']) {
            $object->setAddress(null);
        }
        if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
            $object->setDocumentType($data['document_type']);
        } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
            $object->setDocumentType(null);
        }
        if (\array_key_exists('issuing_country_code', $data) && null !== $data['issuing_country_code']) {
            $object->setIssuingCountryCode($data['issuing_country_code']);
        } elseif (\array_key_exists('issuing_country_code', $data) && null === $data['issuing_country_code']) {
            $object->setIssuingCountryCode(null);
        }
        if (\array_key_exists('issuance_date', $data) && null !== $data['issuance_date']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['issuance_date']);
            if (false === $date_1) {
                throw new InvalidDateException($data['issuance_date'], 'Y-m-d');
            }
            $object->setIssuanceDate($date_1->setTime(0, 0, 0));
        } elseif (\array_key_exists('issuance_date', $data) && null === $data['issuance_date']) {
            $object->setIssuanceDate(null);
        }
        if (\array_key_exists('expiration_date', $data) && null !== $data['expiration_date']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d', $data['expiration_date']);
            if (false === $date_2) {
                throw new InvalidDateException($data['expiration_date'], 'Y-m-d');
            }
            $object->setExpirationDate($date_2->setTime(0, 0, 0));
        } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
            $object->setExpirationDate(null);
        }
        if (\array_key_exists('document_number', $data) && null !== $data['document_number']) {
            $object->setDocumentNumber($data['document_number']);
        } elseif (\array_key_exists('document_number', $data) && null === $data['document_number']) {
            $object->setDocumentNumber(null);
        }
        if (\array_key_exists('mrz', $data) && null !== $data['mrz']) {
            $object->setMrz($this->denormalizer->denormalize($data['mrz'], IdDocumentExtractionMrz::class, 'json', $context));
        } elseif (\array_key_exists('mrz', $data) && null === $data['mrz']) {
            $object->setMrz(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        return ['first_name' => $data->getFirstName(), 'last_name' => $data->getLastName(), 'birth_name' => $data->getBirthName(), 'birth_date' => $data->getBirthDate()?->format('Y-m-d'), 'birth_location' => $data->getBirthLocation(), 'gender' => $data->getGender(), 'address' => null === $data->getAddress() ? null : new JsonObject($this->normalizer->normalize($data->getAddress(), 'json', $context)), 'document_type' => $data->getDocumentType(), 'issuing_country_code' => $data->getIssuingCountryCode(), 'issuance_date' => $data->getIssuanceDate()?->format('Y-m-d'), 'expiration_date' => $data->getExpirationDate()?->format('Y-m-d'), 'document_number' => $data->getDocumentNumber(), 'mrz' => null === $data->getMrz() ? null : new JsonObject($this->normalizer->normalize($data->getMrz(), 'json', $context))];
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdDocumentExtraction::class => false];
    }
}
