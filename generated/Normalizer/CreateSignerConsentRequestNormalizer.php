<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequest;
use Qdequippe\Yousign\Api\Model\CreateSignerConsentRequestSettings;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CreateSignerConsentRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return CreateSignerConsentRequest::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && CreateSignerConsentRequest::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new CreateSignerConsentRequest();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('optional', $data) && \is_int($data['optional'])) {
            $data['optional'] = (bool) $data['optional'];
        }
        if (\array_key_exists('type', $data) && null !== $data['type']) {
            $object->setType($data['type']);
            unset($data['type']);
        } elseif (\array_key_exists('type', $data) && null === $data['type']) {
            $object->setType(null);
            unset($data['type']);
        }
        if (\array_key_exists('settings', $data) && null !== $data['settings']) {
            $object->setSettings($this->denormalizer->denormalize($data['settings'], CreateSignerConsentRequestSettings::class, 'json', $context));
            unset($data['settings']);
        } elseif (\array_key_exists('settings', $data) && null === $data['settings']) {
            $object->setSettings(null);
            unset($data['settings']);
        }
        if (\array_key_exists('optional', $data) && null !== $data['optional']) {
            $object->setOptional($data['optional']);
            unset($data['optional']);
        } elseif (\array_key_exists('optional', $data) && null === $data['optional']) {
            $object->setOptional(null);
            unset($data['optional']);
        }
        if (\array_key_exists('signer_ids', $data) && null !== $data['signer_ids']) {
            $values = [];
            foreach ($data['signer_ids'] as $value) {
                $values[] = $value;
            }
            $object->setSignerIds($values);
            unset($data['signer_ids']);
        } elseif (\array_key_exists('signer_ids', $data) && null === $data['signer_ids']) {
            $object->setSignerIds(null);
            unset($data['signer_ids']);
        }
        if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
            $object->setInsertAfterId($data['insert_after_id']);
            unset($data['insert_after_id']);
        } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
            $object->setInsertAfterId(null);
            unset($data['insert_after_id']);
        }
        if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
            $object->setDocumentId($data['document_id']);
            unset($data['document_id']);
        } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
            $object->setDocumentId(null);
            unset($data['document_id']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['type'] = $data->getType();
        $dataArray['settings'] = null === $data->getSettings() ? null : new JsonObject($this->normalizer->normalize($data->getSettings(), 'json', $context));
        $dataArray['optional'] = $data->getOptional();
        $values = [];
        foreach ($data->getSignerIds() as $value) {
            $values[] = $value;
        }
        $dataArray['signer_ids'] = $values;
        if ($data->isInitialized('insertAfterId') && null !== $data->getInsertAfterId()) {
            $dataArray['insert_after_id'] = $data->getInsertAfterId();
        }
        if ($data->isInitialized('documentId') && null !== $data->getDocumentId()) {
            $dataArray['document_id'] = $data->getDocumentId();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [CreateSignerConsentRequest::class => false];
    }
}
