<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestPlaceholderSignerSubstituteFromUserIdInput;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

if (!class_exists(Kernel::class) || (Kernel::MAJOR_VERSION >= 7 || Kernel::MAJOR_VERSION === 6 && Kernel::MINOR_VERSION === 4)) {
    class CreateSignatureRequestTemplatePlaceholdersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return CreateSignatureRequestTemplatePlaceholders::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateSignatureRequestTemplatePlaceholders();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values = [];
                foreach ($data['signers'] as $value) {
                    $value_1 = $value;
                    if (\is_array($value) && isset($value['label'], $value['info'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class, 'json', $context);
                    } elseif (\is_array($value) && isset($value['label'], $value['user_id'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class, 'json', $context);
                    } elseif (\is_array($value) && isset($value['label'], $value['contact_id'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class, 'json', $context);
                    }
                    $values[] = $value_1;
                }
                $object->setSigners($values);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
            }
            if (\array_key_exists('read_only_text_fields', $data) && null !== $data['read_only_text_fields']) {
                $values_1 = [];
                foreach ($data['read_only_text_fields'] as $value_2) {
                    $values_1[] = $this->denormalizer->denormalize($value_2, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class, 'json', $context);
                }
                $object->setReadOnlyTextFields($values_1);
                unset($data['read_only_text_fields']);
            } elseif (\array_key_exists('read_only_text_fields', $data) && null === $data['read_only_text_fields']) {
                $object->setReadOnlyTextFields(null);
            }
            foreach ($data as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_3;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('signers') && null !== $object->getSigners()) {
                $values = [];
                foreach ($object->getSigners() as $value) {
                    $value_1 = $value;
                    if (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    } elseif (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    } elseif (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    }
                    $values[] = $value_1;
                }
                $data['signers'] = $values;
            }
            if ($object->isInitialized('readOnlyTextFields') && null !== $object->getReadOnlyTextFields()) {
                $values_1 = [];
                foreach ($object->getReadOnlyTextFields() as $value_2) {
                    $values_1[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['read_only_text_fields'] = $values_1;
            }
            foreach ($object as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateSignatureRequestTemplatePlaceholders::class => false];
        }
    }
} else {
    class CreateSignatureRequestTemplatePlaceholdersNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return CreateSignatureRequestTemplatePlaceholders::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = [])
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateSignatureRequestTemplatePlaceholders();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values = [];
                foreach ($data['signers'] as $value) {
                    $value_1 = $value;
                    if (\is_array($value) && isset($value['label'], $value['info'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromInfoInput::class, 'json', $context);
                    } elseif (\is_array($value) && isset($value['label'], $value['user_id'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromUserIdInput::class, 'json', $context);
                    } elseif (\is_array($value) && isset($value['label'], $value['contact_id'])) {
                        $value_1 = $this->denormalizer->denormalize($value, SignatureRequestPlaceholderSignerSubstituteFromContactIdInput::class, 'json', $context);
                    }
                    $values[] = $value_1;
                }
                $object->setSigners($values);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
            }
            if (\array_key_exists('read_only_text_fields', $data) && null !== $data['read_only_text_fields']) {
                $values_1 = [];
                foreach ($data['read_only_text_fields'] as $value_2) {
                    $values_1[] = $this->denormalizer->denormalize($value_2, SignatureRequestPlaceholderReadOnlyTextFieldSubstituteInput::class, 'json', $context);
                }
                $object->setReadOnlyTextFields($values_1);
                unset($data['read_only_text_fields']);
            } elseif (\array_key_exists('read_only_text_fields', $data) && null === $data['read_only_text_fields']) {
                $object->setReadOnlyTextFields(null);
            }
            foreach ($data as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_3;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('signers') && null !== $object->getSigners()) {
                $values = [];
                foreach ($object->getSigners() as $value) {
                    $value_1 = $value;
                    if (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    } elseif (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    } elseif (\is_object($value)) {
                        $value_1 = $this->normalizer->normalize($value, 'json', $context);
                    }
                    $values[] = $value_1;
                }
                $data['signers'] = $values;
            }
            if ($object->isInitialized('readOnlyTextFields') && null !== $object->getReadOnlyTextFields()) {
                $values_1 = [];
                foreach ($object->getReadOnlyTextFields() as $value_2) {
                    $values_1[] = $this->normalizer->normalize($value_2, 'json', $context);
                }
                $data['read_only_text_fields'] = $values_1;
            }
            foreach ($object as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateSignatureRequestTemplatePlaceholders::class => false];
        }
    }
}
