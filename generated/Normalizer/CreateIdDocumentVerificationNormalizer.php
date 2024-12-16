<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateIdDocumentVerification;
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
    class CreateIdDocumentVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return CreateIdDocumentVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && CreateIdDocumentVerification::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateIdDocumentVerification();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('file', $data) && null !== $data['file']) {
                $object->setFile($data['file']);
                unset($data['file']);
            } elseif (\array_key_exists('file', $data) && null === $data['file']) {
                $object->setFile(null);
            }
            if (\array_key_exists('additional_file', $data) && null !== $data['additional_file']) {
                $object->setAdditionalFile($data['additional_file']);
                unset($data['additional_file']);
            } elseif (\array_key_exists('additional_file', $data) && null === $data['additional_file']) {
                $object->setAdditionalFile(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['first_name'] = $object->getFirstName();
            $data['last_name'] = $object->getLastName();
            if ($object->isInitialized('documentType') && null !== $object->getDocumentType()) {
                $data['document_type'] = $object->getDocumentType();
            }
            $data['file'] = $object->getFile();
            if ($object->isInitialized('additionalFile') && null !== $object->getAdditionalFile()) {
                $data['additional_file'] = $object->getAdditionalFile();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateIdDocumentVerification::class => false];
        }
    }
} else {
    class CreateIdDocumentVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return CreateIdDocumentVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && CreateIdDocumentVerification::class === $data::class;
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
            $object = new CreateIdDocumentVerification();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('file', $data) && null !== $data['file']) {
                $object->setFile($data['file']);
                unset($data['file']);
            } elseif (\array_key_exists('file', $data) && null === $data['file']) {
                $object->setFile(null);
            }
            if (\array_key_exists('additional_file', $data) && null !== $data['additional_file']) {
                $object->setAdditionalFile($data['additional_file']);
                unset($data['additional_file']);
            } elseif (\array_key_exists('additional_file', $data) && null === $data['additional_file']) {
                $object->setAdditionalFile(null);
            }
            foreach ($data as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value;
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
            $data['first_name'] = $object->getFirstName();
            $data['last_name'] = $object->getLastName();
            if ($object->isInitialized('documentType') && null !== $object->getDocumentType()) {
                $data['document_type'] = $object->getDocumentType();
            }
            $data['file'] = $object->getFile();
            if ($object->isInitialized('additionalFile') && null !== $object->getAdditionalFile()) {
                $data['additional_file'] = $object->getAdditionalFile();
            }
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateIdDocumentVerification::class => false];
        }
    }
}
