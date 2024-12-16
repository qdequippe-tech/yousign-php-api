<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\BankAccountVerification;
use Qdequippe\Yousign\Api\Model\BankAccountVerificationExtractedFromDocument;
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
    class BankAccountVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return BankAccountVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && BankAccountVerification::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new BankAccountVerification();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('status_codes', $data) && null !== $data['status_codes']) {
                $values = [];
                foreach ($data['status_codes'] as $value) {
                    $values[] = $value;
                }
                $object->setStatusCodes($values);
                unset($data['status_codes']);
            } elseif (\array_key_exists('status_codes', $data) && null === $data['status_codes']) {
                $object->setStatusCodes(null);
            }
            if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
                $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], BankAccountVerificationExtractedFromDocument::class, 'json', $context));
                unset($data['extracted_from_document']);
            } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
                $object->setExtractedFromDocument(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('statusCodes') && null !== $object->getStatusCodes()) {
                $values = [];
                foreach ($object->getStatusCodes() as $value) {
                    $values[] = $value;
                }
                $data['status_codes'] = $values;
            }
            if ($object->isInitialized('extractedFromDocument') && null !== $object->getExtractedFromDocument()) {
                $data['extracted_from_document'] = $this->normalizer->normalize($object->getExtractedFromDocument(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [BankAccountVerification::class => false];
        }
    }
} else {
    class BankAccountVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return BankAccountVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && BankAccountVerification::class === $data::class;
        }

        /**
         * @param mixed|null $format
         */
        public function denormalize($data, $type, $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new BankAccountVerification();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('status_codes', $data) && null !== $data['status_codes']) {
                $values = [];
                foreach ($data['status_codes'] as $value) {
                    $values[] = $value;
                }
                $object->setStatusCodes($values);
                unset($data['status_codes']);
            } elseif (\array_key_exists('status_codes', $data) && null === $data['status_codes']) {
                $object->setStatusCodes(null);
            }
            if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
                $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], BankAccountVerificationExtractedFromDocument::class, 'json', $context));
                unset($data['extracted_from_document']);
            } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
                $object->setExtractedFromDocument(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        /**
         * @param mixed|null $format
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            if ($object->isInitialized('id') && null !== $object->getId()) {
                $data['id'] = $object->getId();
            }
            if ($object->isInitialized('status') && null !== $object->getStatus()) {
                $data['status'] = $object->getStatus();
            }
            if ($object->isInitialized('statusCodes') && null !== $object->getStatusCodes()) {
                $values = [];
                foreach ($object->getStatusCodes() as $value) {
                    $values[] = $value;
                }
                $data['status_codes'] = $values;
            }
            if ($object->isInitialized('extractedFromDocument') && null !== $object->getExtractedFromDocument()) {
                $data['extracted_from_document'] = $this->normalizer->normalize($object->getExtractedFromDocument(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [BankAccountVerification::class => false];
        }
    }
}
