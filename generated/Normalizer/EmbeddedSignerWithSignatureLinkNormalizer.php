<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\EmbeddedSignerWithSignatureLink;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EmbeddedSignerWithSignatureLinkNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return EmbeddedSignerWithSignatureLink::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && EmbeddedSignerWithSignatureLink::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new EmbeddedSignerWithSignatureLink();
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
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
        }
        if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
            $object->setSignatureLink($data['signature_link']);
            unset($data['signature_link']);
        } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
            $object->setSignatureLink(null);
            unset($data['signature_link']);
        }
        if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['signature_link_expiration_date']);
            if (false === $date) {
                throw new InvalidDateException($data['signature_link_expiration_date'], 'Y-m-d\TH:i:sP');
            }
            $object->setSignatureLinkExpirationDate($date);
            unset($data['signature_link_expiration_date']);
        } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
            $object->setSignatureLinkExpirationDate(null);
            unset($data['signature_link_expiration_date']);
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
        $dataArray['id'] = $data->getId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['signature_link'] = $data->getSignatureLink();
        $dataArray['signature_link_expiration_date'] = $data->getSignatureLinkExpirationDate()?->format('Y-m-d\TH:i:sP');
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [EmbeddedSignerWithSignatureLink::class => false];
    }
}
