<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSignatureRequestFromScratchTemplatePlaceholdersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NewSignatureRequestFromScratchTemplatePlaceholders::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NewSignatureRequestFromScratchTemplatePlaceholders::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NewSignatureRequestFromScratchTemplatePlaceholders();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('signers', $data) && null !== $data['signers']) {
            $values = [];
            foreach ($data['signers'] as $value) {
                $value_1 = $value;
                if (\is_array($value) && \array_key_exists('label', $value) && \array_key_exists('info', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('label', $value) && \array_key_exists('user_id', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('label', $value) && \array_key_exists('contact_id', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class, 'json', $context);
                }
                $values[] = $value_1;
            }
            $object->setSigners($values);
        } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
            $object->setSigners(null);
        }
        if (\array_key_exists('read_only_text_fields', $data) && null !== $data['read_only_text_fields']) {
            $values_1 = [];
            foreach ($data['read_only_text_fields'] as $value_2) {
                $values_1[] = $this->denormalizer->denormalize($value_2, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class, 'json', $context);
            }
            $object->setReadOnlyTextFields($values_1);
        } elseif (\array_key_exists('read_only_text_fields', $data) && null === $data['read_only_text_fields']) {
            $object->setReadOnlyTextFields(null);
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('signers') && null !== $data->getSigners()) {
            $values = [];
            foreach ($data->getSigners() as $value) {
                $value_1 = $value;
                if (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                } elseif (\is_object($value)) {
                    $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
                }
                $values[] = $value_1;
            }
            $dataArray['signers'] = $values;
        }
        if ($data->isInitialized('readOnlyTextFields') && null !== $data->getReadOnlyTextFields()) {
            $values_1 = [];
            foreach ($data->getReadOnlyTextFields() as $value_2) {
                $values_1[] = null === $value_2 ? null : new JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['read_only_text_fields'] = $values_1;
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [NewSignatureRequestFromScratchTemplatePlaceholders::class => false];
    }
}
