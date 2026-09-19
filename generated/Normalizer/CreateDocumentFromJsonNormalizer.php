<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromJson;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateDocumentFromJsonNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateDocumentFromJson::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateDocumentFromJson::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateDocumentFromJson();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('parse_anchors', $data) && \is_int($data['parse_anchors'])) {
            $data['parse_anchors'] = (bool) $data['parse_anchors'];
        }
        if (\array_key_exists('electronic_seal_document_id', $data) && null !== $data['electronic_seal_document_id']) {
            $object->setElectronicSealDocumentId($data['electronic_seal_document_id']);
            unset($data['electronic_seal_document_id']);
        } elseif (\array_key_exists('electronic_seal_document_id', $data) && null === $data['electronic_seal_document_id']) {
            $object->setElectronicSealDocumentId(null);
            unset($data['electronic_seal_document_id']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('nature', $data) && null !== $data['nature']) {
            $object->setNature($data['nature']);
            unset($data['nature']);
        } elseif (\array_key_exists('nature', $data) && null === $data['nature']) {
            $object->setNature(null);
            unset($data['nature']);
        }
        if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
            $object->setInsertAfterId($data['insert_after_id']);
            unset($data['insert_after_id']);
        } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
            $object->setInsertAfterId(null);
            unset($data['insert_after_id']);
        }
        if (\array_key_exists('parse_anchors', $data) && null !== $data['parse_anchors']) {
            $object->setParseAnchors($data['parse_anchors']);
            unset($data['parse_anchors']);
        } elseif (\array_key_exists('parse_anchors', $data) && null === $data['parse_anchors']) {
            $object->setParseAnchors(null);
            unset($data['parse_anchors']);
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
        $dataArray['electronic_seal_document_id'] = $data->getElectronicSealDocumentId();
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        $dataArray['nature'] = $data->getNature();
        if ($data->isInitialized('insertAfterId') && null !== $data->getInsertAfterId()) {
            $dataArray['insert_after_id'] = $data->getInsertAfterId();
        }
        if ($data->isInitialized('parseAnchors') && null !== $data->getParseAnchors()) {
            $dataArray['parse_anchors'] = $data->getParseAnchors();
        }
        if ($data->isInitialized('excludedApprovers') && null !== $data->getExcludedApprovers()) {
            $values = [];
            foreach ($data->getExcludedApprovers() as $value) {
                $values[] = $value;
            }
            $dataArray['excluded_approvers'] = $values;
        }
        if ($data->isInitialized('excludedSigners') && null !== $data->getExcludedSigners()) {
            $values_1 = [];
            foreach ($data->getExcludedSigners() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['excluded_signers'] = $values_1;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateDocumentFromJson::class => false];
    }
}
