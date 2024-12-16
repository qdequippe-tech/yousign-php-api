<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerification;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationDeclared;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationDocument;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationVerified;
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
    class VideoIdentityVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return VideoIdentityVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && VideoIdentityVerification::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new VideoIdentityVerification();
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
            if (\array_key_exists('verified', $data) && null !== $data['verified']) {
                $object->setVerified($this->denormalizer->denormalize($data['verified'], VideoIdentityVerificationVerified::class, 'json', $context));
                unset($data['verified']);
            } elseif (\array_key_exists('verified', $data) && null === $data['verified']) {
                $object->setVerified(null);
            }
            if (\array_key_exists('declared', $data) && null !== $data['declared']) {
                $object->setDeclared($this->denormalizer->denormalize($data['declared'], VideoIdentityVerificationDeclared::class, 'json', $context));
                unset($data['declared']);
            } elseif (\array_key_exists('declared', $data) && null === $data['declared']) {
                $object->setDeclared(null);
            }
            if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
                $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], VideoIdentityVerificationDocument::class, 'json', $context));
                unset($data['extracted_from_document']);
            } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
                $object->setExtractedFromDocument(null);
            }
            if (\array_key_exists('verification_url', $data) && null !== $data['verification_url']) {
                $object->setVerificationUrl($data['verification_url']);
                unset($data['verification_url']);
            } elseif (\array_key_exists('verification_url', $data) && null === $data['verification_url']) {
                $object->setVerificationUrl(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $values = [];
            foreach ($object->getStatusCodes() as $value) {
                $values[] = $value;
            }
            $data['status_codes'] = $values;
            $data['verified'] = $this->normalizer->normalize($object->getVerified(), 'json', $context);
            $data['declared'] = $this->normalizer->normalize($object->getDeclared(), 'json', $context);
            $data['extracted_from_document'] = $this->normalizer->normalize($object->getExtractedFromDocument(), 'json', $context);
            $data['verification_url'] = $object->getVerificationUrl();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [VideoIdentityVerification::class => false];
        }
    }
} else {
    class VideoIdentityVerificationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return VideoIdentityVerification::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && VideoIdentityVerification::class === $data::class;
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
            $object = new VideoIdentityVerification();
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
            if (\array_key_exists('verified', $data) && null !== $data['verified']) {
                $object->setVerified($this->denormalizer->denormalize($data['verified'], VideoIdentityVerificationVerified::class, 'json', $context));
                unset($data['verified']);
            } elseif (\array_key_exists('verified', $data) && null === $data['verified']) {
                $object->setVerified(null);
            }
            if (\array_key_exists('declared', $data) && null !== $data['declared']) {
                $object->setDeclared($this->denormalizer->denormalize($data['declared'], VideoIdentityVerificationDeclared::class, 'json', $context));
                unset($data['declared']);
            } elseif (\array_key_exists('declared', $data) && null === $data['declared']) {
                $object->setDeclared(null);
            }
            if (\array_key_exists('extracted_from_document', $data) && null !== $data['extracted_from_document']) {
                $object->setExtractedFromDocument($this->denormalizer->denormalize($data['extracted_from_document'], VideoIdentityVerificationDocument::class, 'json', $context));
                unset($data['extracted_from_document']);
            } elseif (\array_key_exists('extracted_from_document', $data) && null === $data['extracted_from_document']) {
                $object->setExtractedFromDocument(null);
            }
            if (\array_key_exists('verification_url', $data) && null !== $data['verification_url']) {
                $object->setVerificationUrl($data['verification_url']);
                unset($data['verification_url']);
            } elseif (\array_key_exists('verification_url', $data) && null === $data['verification_url']) {
                $object->setVerificationUrl(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $values = [];
            foreach ($object->getStatusCodes() as $value) {
                $values[] = $value;
            }
            $data['status_codes'] = $values;
            $data['verified'] = $this->normalizer->normalize($object->getVerified(), 'json', $context);
            $data['declared'] = $this->normalizer->normalize($object->getDeclared(), 'json', $context);
            $data['extracted_from_document'] = $this->normalizer->normalize($object->getExtractedFromDocument(), 'json', $context);
            $data['verification_url'] = $object->getVerificationUrl();
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [VideoIdentityVerification::class => false];
        }
    }
}
