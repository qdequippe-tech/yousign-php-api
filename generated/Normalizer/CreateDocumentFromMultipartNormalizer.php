<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateDocumentFromMultipart;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateDocumentFromMultipartNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateDocumentFromMultipart::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateDocumentFromMultipart::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateDocumentFromMultipart();
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
        if (\array_key_exists('flatten', $data) && \is_int($data['flatten'])) {
            $data['flatten'] = (bool) $data['flatten'];
        }
        if (\array_key_exists('file', $data) && null !== $data['file']) {
            $object->setFile($data['file']);
            unset($data['file']);
        } elseif (\array_key_exists('file', $data) && null === $data['file']) {
            $object->setFile(null);
            unset($data['file']);
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
        if (\array_key_exists('password', $data) && null !== $data['password']) {
            $object->setPassword($data['password']);
            unset($data['password']);
        } elseif (\array_key_exists('password', $data) && null === $data['password']) {
            $object->setPassword(null);
            unset($data['password']);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('initials', $data) && null !== $data['initials']) {
            $values = new JsonObject();
            foreach ($data['initials'] as $key => $value) {
                $values[$key] = $value;
            }
            $object->setInitials($values);
            unset($data['initials']);
        } elseif (\array_key_exists('initials', $data) && null === $data['initials']) {
            $object->setInitials(null);
            unset($data['initials']);
        }
        if (\array_key_exists('parse_anchors', $data) && null !== $data['parse_anchors']) {
            $object->setParseAnchors($data['parse_anchors']);
            unset($data['parse_anchors']);
        } elseif (\array_key_exists('parse_anchors', $data) && null === $data['parse_anchors']) {
            $object->setParseAnchors(null);
            unset($data['parse_anchors']);
        }
        if (\array_key_exists('flatten', $data) && null !== $data['flatten']) {
            $object->setFlatten($data['flatten']);
            unset($data['flatten']);
        } elseif (\array_key_exists('flatten', $data) && null === $data['flatten']) {
            $object->setFlatten(null);
            unset($data['flatten']);
        }
        if (\array_key_exists('excluded_approvers', $data) && null !== $data['excluded_approvers']) {
            $values_1 = [];
            foreach ($data['excluded_approvers'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExcludedApprovers($values_1);
            unset($data['excluded_approvers']);
        } elseif (\array_key_exists('excluded_approvers', $data) && null === $data['excluded_approvers']) {
            $object->setExcludedApprovers(null);
            unset($data['excluded_approvers']);
        }
        if (\array_key_exists('excluded_signers', $data) && null !== $data['excluded_signers']) {
            $values_2 = [];
            foreach ($data['excluded_signers'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setExcludedSigners($values_2);
            unset($data['excluded_signers']);
        } elseif (\array_key_exists('excluded_signers', $data) && null === $data['excluded_signers']) {
            $object->setExcludedSigners(null);
            unset($data['excluded_signers']);
        }
        foreach ($data as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $object[$key_1] = $value_3;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['file'] = $data->getFile();
        $dataArray['nature'] = $data->getNature();
        if ($data->isInitialized('insertAfterId') && null !== $data->getInsertAfterId()) {
            $dataArray['insert_after_id'] = $data->getInsertAfterId();
        }
        if ($data->isInitialized('password') && null !== $data->getPassword()) {
            $dataArray['password'] = $data->getPassword();
        }
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('initials') && null !== $data->getInitials()) {
            $values = new JsonObject();
            foreach ($data->getInitials() as $key => $value) {
                $values[$key] = $value;
            }
            $dataArray['initials'] = $values;
        }
        if ($data->isInitialized('parseAnchors') && null !== $data->getParseAnchors()) {
            $dataArray['parse_anchors'] = $data->getParseAnchors();
        }
        if ($data->isInitialized('flatten') && null !== $data->getFlatten()) {
            $dataArray['flatten'] = $data->getFlatten();
        }
        if ($data->isInitialized('excludedApprovers') && null !== $data->getExcludedApprovers()) {
            $values_1 = [];
            foreach ($data->getExcludedApprovers() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['excluded_approvers'] = $values_1;
        }
        if ($data->isInitialized('excludedSigners') && null !== $data->getExcludedSigners()) {
            $values_2 = [];
            foreach ($data->getExcludedSigners() as $value_2) {
                $values_2[] = $value_2;
            }
            $dataArray['excluded_signers'] = $values_2;
        }
        foreach ($data->additionalPropertyEntries() as $key_1 => $value_3) {
            if (preg_match('/.*/', (string) $key_1)) {
                $dataArray[$key_1] = $value_3;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateDocumentFromMultipart::class => false];
    }
}
