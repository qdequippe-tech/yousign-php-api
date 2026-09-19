<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\FieldCheckbox;
use Qdequippe\Yousign\Api\Model\FieldMention;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroup;
use Qdequippe\Yousign\Api\Model\FieldReadOnlyText;
use Qdequippe\Yousign\Api\Model\FieldSignature;
use Qdequippe\Yousign\Api\Model\FieldSignatureDate;
use Qdequippe\Yousign\Api\Model\FieldSignerEmail;
use Qdequippe\Yousign\Api\Model\FieldSignerName;
use Qdequippe\Yousign\Api\Model\FieldText;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
use Qdequippe\Yousign\Api\Model\Pagination;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('meta', $data) && null !== $data['meta']) {
            $object->setMeta($this->denormalizer->denormalize($data['meta'], Pagination::class, 'json', $context));
            unset($data['meta']);
        } elseif (\array_key_exists('meta', $data) && null === $data['meta']) {
            $object->setMeta(null);
            unset($data['meta']);
        }
        if (\array_key_exists('data', $data) && null !== $data['data']) {
            $values = [];
            foreach ($data['data'] as $value) {
                $value_1 = $value;
                if (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'signature' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('reason', $value) && \array_key_exists('display', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldSignature::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'text' == $value['type']) && \array_key_exists('width', $value) && \array_key_exists('height', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('question', $value) && \array_key_exists('instruction', $value) && \array_key_exists('optional', $value) && \array_key_exists('answer', $value) && \array_key_exists('max_length', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldText::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'mention' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('mention', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldMention::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'checkbox' == $value['type']) && \array_key_exists('name', $value) && \array_key_exists('checked', $value) && \array_key_exists('page', $value) && \array_key_exists('optional', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldCheckbox::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'radio_group' == $value['type']) && \array_key_exists('page', $value) && \array_key_exists('optional', $value) && \array_key_exists('name', $value) && \array_key_exists('radios', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldRadioButtonGroup::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && (\array_key_exists('type', $value) && 'read_only_text' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('text', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldReadOnlyText::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'signature_date' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('value', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldSignatureDate::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'signer_name' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('value', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldSignerName::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'signer_email' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('value', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldSignerEmail::class, 'json', $context);
                }
                $values[] = $value_1;
            }
            $object->setData($values);
            unset($data['data']);
        } elseif (\array_key_exists('data', $data) && null === $data['data']) {
            $object->setData(null);
            unset($data['data']);
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
        if ($data->isInitialized('meta') && null !== $data->getMeta()) {
            $dataArray['meta'] = null === $data->getMeta() ? null : new JsonObject($this->normalizer->normalize($data->getMeta(), 'json', $context));
        }
        if ($data->isInitialized('data') && null !== $data->getData()) {
            $values = [];
            foreach ($data->getData() as $value) {
                $value_1 = $value;
                if (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                }
                $values[] = $value_1;
            }
            $dataArray['data'] = $values;
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
        return [GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false];
    }
}
