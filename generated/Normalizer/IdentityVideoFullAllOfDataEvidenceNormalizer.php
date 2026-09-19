<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdentityVideoFullAllOfDataEvidence;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class IdentityVideoFullAllOfDataEvidenceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return IdentityVideoFullAllOfDataEvidence::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && IdentityVideoFullAllOfDataEvidence::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new IdentityVideoFullAllOfDataEvidence();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('document_front_image_url', $data) && null !== $data['document_front_image_url']) {
            $object->setDocumentFrontImageUrl($data['document_front_image_url']);
            unset($data['document_front_image_url']);
        } elseif (\array_key_exists('document_front_image_url', $data) && null === $data['document_front_image_url']) {
            $object->setDocumentFrontImageUrl(null);
            unset($data['document_front_image_url']);
        }
        if (\array_key_exists('document_back_image_url', $data) && null !== $data['document_back_image_url']) {
            $object->setDocumentBackImageUrl($data['document_back_image_url']);
            unset($data['document_back_image_url']);
        } elseif (\array_key_exists('document_back_image_url', $data) && null === $data['document_back_image_url']) {
            $object->setDocumentBackImageUrl(null);
            unset($data['document_back_image_url']);
        }
        if (\array_key_exists('face_image_url', $data) && null !== $data['face_image_url']) {
            $object->setFaceImageUrl($data['face_image_url']);
            unset($data['face_image_url']);
        } elseif (\array_key_exists('face_image_url', $data) && null === $data['face_image_url']) {
            $object->setFaceImageUrl(null);
            unset($data['face_image_url']);
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
        $dataArray['document_front_image_url'] = $data->getDocumentFrontImageUrl();
        $dataArray['document_back_image_url'] = $data->getDocumentBackImageUrl();
        $dataArray['face_image_url'] = $data->getFaceImageUrl();
        foreach ($data->additionalPropertyEntries() as $key => $value) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [IdentityVideoFullAllOfDataEvidence::class => false];
    }
}
