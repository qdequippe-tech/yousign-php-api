<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfDataExtractedFromDocument;
use Qdequippe\Yousign\Api\Model\ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc;
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

class ProofOfAddressVerificationFullAllOfDataExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ProofOfAddressVerificationFullAllOfDataExtractedFromDocument::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && ProofOfAddressVerificationFullAllOfDataExtractedFromDocument::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new ProofOfAddressVerificationFullAllOfDataExtractedFromDocument();
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
        if (\array_key_exists('full_address', $data) && null !== $data['full_address']) {
            $object->setFullAddress($data['full_address']);
            unset($data['full_address']);
        } elseif (\array_key_exists('full_address', $data) && null === $data['full_address']) {
            $object->setFullAddress(null);
            unset($data['full_address']);
        }
        if (\array_key_exists('issued_on', $data) && null !== $data['issued_on']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['issued_on']);
            if (false === $date) {
                throw new InvalidDateException($data['issued_on'], 'Y-m-d');
            }
            $object->setIssuedOn($date->setTime(0, 0, 0));
            unset($data['issued_on']);
        } elseif (\array_key_exists('issued_on', $data) && null === $data['issued_on']) {
            $object->setIssuedOn(null);
            unset($data['issued_on']);
        }
        if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
            $object->setDocumentType($data['document_type']);
            unset($data['document_type']);
        } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
            $object->setDocumentType(null);
            unset($data['document_type']);
        }
        if (\array_key_exists('2d_doc', $data) && null !== $data['2d_doc']) {
            $object->set2dDoc($this->denormalizer->denormalize($data['2d_doc'], ProofOfAddressVerificationFullAllOfDataExtractedFromDocument2dDoc::class, 'json', $context));
            unset($data['2d_doc']);
        } elseif (\array_key_exists('2d_doc', $data) && null === $data['2d_doc']) {
            $object->set2dDoc(null);
            unset($data['2d_doc']);
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
        $dataArray['full_address'] = $data->getFullAddress();
        $dataArray['issued_on'] = $data->getIssuedOn()?->format('Y-m-d');
        if ($data->isInitialized('documentType') && null !== $data->getDocumentType()) {
            $dataArray['document_type'] = $data->getDocumentType();
        }
        $dataArray['2d_doc'] = null === $data->get2dDoc() ? null : new JsonObject($this->normalizer->normalize($data->get2dDoc(), 'json', $context));
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [ProofOfAddressVerificationFullAllOfDataExtractedFromDocument::class => false];
    }
}
