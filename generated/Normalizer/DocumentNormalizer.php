<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Document;
use Qdequippe\Yousign\Api\Model\DocumentInitials;
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

class DocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Document::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Document::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Document();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('is_protected', $data) && \is_int($data['is_protected'])) {
            $data['is_protected'] = (bool) $data['is_protected'];
        }
        if (\array_key_exists('is_signed', $data) && \is_int($data['is_signed'])) {
            $data['is_signed'] = (bool) $data['is_signed'];
        }
        if (\array_key_exists('is_locked', $data) && \is_int($data['is_locked'])) {
            $data['is_locked'] = (bool) $data['is_locked'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('filename', $data) && null !== $data['filename']) {
            $object->setFilename($data['filename']);
            unset($data['filename']);
        } elseif (\array_key_exists('filename', $data) && null === $data['filename']) {
            $object->setFilename(null);
            unset($data['filename']);
        }
        if (\array_key_exists('nature', $data) && null !== $data['nature']) {
            $object->setNature($data['nature']);
            unset($data['nature']);
        } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
            $object->setNature(null);
            unset($data['nature']);
        }
        if (\array_key_exists('content_type', $data) && null !== $data['content_type']) {
            $object->setContentType($data['content_type']);
            unset($data['content_type']);
        } elseif (\array_key_exists('content_type', $data) && null === $data['content_type']) {
            $object->setContentType(null);
            unset($data['content_type']);
        }
        if (\array_key_exists('sha256', $data) && null !== $data['sha256']) {
            $object->setSha256($data['sha256']);
            unset($data['sha256']);
        } elseif (\array_key_exists('sha256', $data) && null === $data['sha256']) {
            $object->setSha256(null);
            unset($data['sha256']);
        }
        if (\array_key_exists('is_protected', $data) && null !== $data['is_protected']) {
            $object->setIsProtected($data['is_protected']);
            unset($data['is_protected']);
        } elseif (\array_key_exists('is_protected', $data) && null === $data['is_protected']) {
            $object->setIsProtected(null);
            unset($data['is_protected']);
        }
        if (\array_key_exists('is_signed', $data) && null !== $data['is_signed']) {
            $object->setIsSigned($data['is_signed']);
            unset($data['is_signed']);
        } elseif (\array_key_exists('is_signed', $data) && null === $data['is_signed']) {
            $object->setIsSigned(null);
            unset($data['is_signed']);
        }
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('total_pages', $data) && null !== $data['total_pages']) {
            $object->setTotalPages($data['total_pages']);
            unset($data['total_pages']);
        } elseif (\array_key_exists('total_pages', $data) && null === $data['total_pages']) {
            $object->setTotalPages(null);
            unset($data['total_pages']);
        }
        if (\array_key_exists('is_locked', $data) && null !== $data['is_locked']) {
            $object->setIsLocked($data['is_locked']);
            unset($data['is_locked']);
        } elseif (\array_key_exists('is_locked', $data) && null === $data['is_locked']) {
            $object->setIsLocked(null);
            unset($data['is_locked']);
        }
        if (\array_key_exists('initials', $data) && null !== $data['initials']) {
            $object->setInitials($this->denormalizer->denormalize($data['initials'], DocumentInitials::class, 'json', $context));
            unset($data['initials']);
        } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
            $object->setInitials(null);
            unset($data['initials']);
        }
        if (\array_key_exists('total_anchors', $data) && null !== $data['total_anchors']) {
            $object->setTotalAnchors($data['total_anchors']);
            unset($data['total_anchors']);
        } elseif (\array_key_exists('total_anchors', $data) && null === $data['total_anchors']) {
            $object->setTotalAnchors(null);
            unset($data['total_anchors']);
        }
        if (\array_key_exists('excluded_approvers', $data) && null !== $data['excluded_approvers']) {
            $values = [];
            foreach ($data['excluded_approvers'] as $value) {
                $values[] = $value;
            }
            $object->setExcludedApprovers($values);
            unset($data['excluded_approvers']);
        } elseif (\array_key_exists('excluded_approvers', $data) && null === $data['excluded_approvers']) {
            $object->setExcludedApprovers(null);
            unset($data['excluded_approvers']);
        }
        if (\array_key_exists('excluded_signers', $data) && null !== $data['excluded_signers']) {
            $values_1 = [];
            foreach ($data['excluded_signers'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExcludedSigners($values_1);
            unset($data['excluded_signers']);
        } elseif (\array_key_exists('excluded_signers', $data) && null === $data['excluded_signers']) {
            $object->setExcludedSigners(null);
            unset($data['excluded_signers']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['id'] = $data->getId();
        $dataArray['filename'] = $data->getFilename();
        $dataArray['nature'] = $data->getNature();
        $dataArray['content_type'] = $data->getContentType();
        $dataArray['sha256'] = $data->getSha256();
        $dataArray['is_protected'] = $data->getIsProtected();
        $dataArray['is_signed'] = $data->getIsSigned();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['total_pages'] = $data->getTotalPages();
        $dataArray['is_locked'] = $data->getIsLocked();
        $dataArray['initials'] = null === $data->getInitials() ? null : new JsonObject($this->normalizer->normalize($data->getInitials(), 'json', $context));
        $dataArray['total_anchors'] = $data->getTotalAnchors();
        $values = [];
        foreach ($data->getExcludedApprovers() as $value) {
            $values[] = $value;
        }
        $dataArray['excluded_approvers'] = $values;
        $values_1 = [];
        foreach ($data->getExcludedSigners() as $value_1) {
            $values_1[] = $value_1;
        }
        $dataArray['excluded_signers'] = $values_1;
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [Document::class => false];
    }
}
