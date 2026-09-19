<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\IdentityDocumentFullAllOfDataExtractedFromDocumentMrz;
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

class IdentityDocumentFullAllOfDataExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdentityDocumentFullAllOfDataExtractedFromDocument::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdentityDocumentFullAllOfDataExtractedFromDocument::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdentityDocumentFullAllOfDataExtractedFromDocument();
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
        if (\array_key_exists('birth_name', $data) && null !== $data['birth_name']) {
            $object->setBirthName($data['birth_name']);
            unset($data['birth_name']);
        } elseif (\array_key_exists('birth_name', $data) && null === $data['birth_name']) {
            $object->setBirthName(null);
            unset($data['birth_name']);
        }
        if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
            $object->setLastName($data['last_name']);
            unset($data['last_name']);
        } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
            $object->setLastName(null);
            unset($data['last_name']);
        }
        if (\array_key_exists('born_on', $data) && null !== $data['born_on']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['born_on']);
            if (false === $date) {
                throw new InvalidDateException($data['born_on'], 'Y-m-d');
            }
            $object->setBornOn($date->setTime(0, 0, 0));
            unset($data['born_on']);
        } elseif (\array_key_exists('born_on', $data) && null === $data['born_on']) {
            $object->setBornOn(null);
            unset($data['born_on']);
        }
        if (\array_key_exists('birth_location', $data) && null !== $data['birth_location']) {
            $object->setBirthLocation($data['birth_location']);
            unset($data['birth_location']);
        } elseif (\array_key_exists('birth_location', $data) && null === $data['birth_location']) {
            $object->setBirthLocation(null);
            unset($data['birth_location']);
        }
        if (\array_key_exists('gender', $data) && null !== $data['gender']) {
            $object->setGender($data['gender']);
            unset($data['gender']);
        } elseif (\array_key_exists('gender', $data) && null === $data['gender']) {
            $object->setGender(null);
            unset($data['gender']);
        }
        if (\array_key_exists('full_address', $data) && null !== $data['full_address']) {
            $object->setFullAddress($data['full_address']);
            unset($data['full_address']);
        } elseif (\array_key_exists('full_address', $data) && null === $data['full_address']) {
            $object->setFullAddress(null);
            unset($data['full_address']);
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('issuing_country_code', $data) && null !== $data['issuing_country_code']) {
            $object->setIssuingCountryCode($data['issuing_country_code']);
            unset($data['issuing_country_code']);
        } elseif (\array_key_exists('issuing_country_code', $data) && null === $data['issuing_country_code']) {
            $object->setIssuingCountryCode(null);
            unset($data['issuing_country_code']);
        }
        if (\array_key_exists('issued_on', $data) && null !== $data['issued_on']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d', $data['issued_on']);
            if (false === $date_1) {
                throw new InvalidDateException($data['issued_on'], 'Y-m-d');
            }
            $object->setIssuedOn($date_1->setTime(0, 0, 0));
            unset($data['issued_on']);
        } elseif (\array_key_exists('issued_on', $data) && null === $data['issued_on']) {
            $object->setIssuedOn(null);
            unset($data['issued_on']);
        }
        if (\array_key_exists('expired_on', $data) && null !== $data['expired_on']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d', $data['expired_on']);
            if (false === $date_2) {
                throw new InvalidDateException($data['expired_on'], 'Y-m-d');
            }
            $object->setExpiredOn($date_2->setTime(0, 0, 0));
            unset($data['expired_on']);
        } elseif (\array_key_exists('expired_on', $data) && null === $data['expired_on']) {
            $object->setExpiredOn(null);
            unset($data['expired_on']);
        }
        if (\array_key_exists('document_number', $data) && null !== $data['document_number']) {
            $object->setDocumentNumber($data['document_number']);
            unset($data['document_number']);
        } elseif (\array_key_exists('document_number', $data) && null === $data['document_number']) {
            $object->setDocumentNumber(null);
            unset($data['document_number']);
        }
        if (\array_key_exists('mrz', $data) && null !== $data['mrz']) {
            $object->setMrz($this->denormalizer->denormalize($data['mrz'], IdentityDocumentFullAllOfDataExtractedFromDocumentMrz::class, 'json', $context));
            unset($data['mrz']);
        } elseif (\array_key_exists('mrz', $data) && null === $data['mrz']) {
            $object->setMrz(null);
            unset($data['mrz']);
        }
        if (\array_key_exists('national_identification_number', $data) && null !== $data['national_identification_number']) {
            $object->setNationalIdentificationNumber($data['national_identification_number']);
            unset($data['national_identification_number']);
        } elseif (\array_key_exists('national_identification_number', $data) && null === $data['national_identification_number']) {
            $object->setNationalIdentificationNumber(null);
            unset($data['national_identification_number']);
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
        $dataArray['birth_name'] = $data->getBirthName();
        $dataArray['last_name'] = $data->getLastName();
        $dataArray['born_on'] = $data->getBornOn()?->format('Y-m-d');
        $dataArray['birth_location'] = $data->getBirthLocation();
        $dataArray['gender'] = $data->getGender();
        $dataArray['full_address'] = $data->getFullAddress();
        $dataArray['type'] = $data->getType();
        $dataArray['issuing_country_code'] = $data->getIssuingCountryCode();
        $dataArray['issued_on'] = $data->getIssuedOn()?->format('Y-m-d');
        $dataArray['expired_on'] = $data->getExpiredOn()?->format('Y-m-d');
        $dataArray['document_number'] = $data->getDocumentNumber();
        $dataArray['mrz'] = null === $data->getMrz() ? null : new JsonObject($this->normalizer->normalize($data->getMrz(), 'json', $context));
        $dataArray['national_identification_number'] = $data->getNationalIdentificationNumber();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdentityDocumentFullAllOfDataExtractedFromDocument::class => false];
    }
}
