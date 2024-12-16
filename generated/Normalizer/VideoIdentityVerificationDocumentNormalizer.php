<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\VideoIdentityVerificationDocument;
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
    class VideoIdentityVerificationDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return VideoIdentityVerificationDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && VideoIdentityVerificationDocument::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new VideoIdentityVerificationDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('full_name', $data) && null !== $data['full_name']) {
                $object->setFullName($data['full_name']);
                unset($data['full_name']);
            } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
                $object->setFullName(null);
            }
            if (\array_key_exists('birth_at', $data) && null !== $data['birth_at']) {
                $object->setBirthAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['birth_at']));
                unset($data['birth_at']);
            } elseif (\array_key_exists('birth_at', $data) && null === $data['birth_at']) {
                $object->setBirthAt(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('document_issuing_country', $data) && null !== $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry($data['document_issuing_country']);
                unset($data['document_issuing_country']);
            } elseif (\array_key_exists('document_issuing_country', $data) && null === $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry(null);
            }
            if (\array_key_exists('front_image_url', $data) && null !== $data['front_image_url']) {
                $object->setFrontImageUrl($data['front_image_url']);
                unset($data['front_image_url']);
            } elseif (\array_key_exists('front_image_url', $data) && null === $data['front_image_url']) {
                $object->setFrontImageUrl(null);
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
            if ($object->isInitialized('fullName') && null !== $object->getFullName()) {
                $data['full_name'] = $object->getFullName();
            }
            if ($object->isInitialized('birthAt') && null !== $object->getBirthAt()) {
                $data['birth_at'] = $object->getBirthAt()->format('Y-m-d\TH:i:sP');
            }
            if ($object->isInitialized('documentType') && null !== $object->getDocumentType()) {
                $data['document_type'] = $object->getDocumentType();
            }
            if ($object->isInitialized('documentIssuingCountry') && null !== $object->getDocumentIssuingCountry()) {
                $data['document_issuing_country'] = $object->getDocumentIssuingCountry();
            }
            if ($object->isInitialized('frontImageUrl') && null !== $object->getFrontImageUrl()) {
                $data['front_image_url'] = $object->getFrontImageUrl();
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
            return [VideoIdentityVerificationDocument::class => false];
        }
    }
} else {
    class VideoIdentityVerificationDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return VideoIdentityVerificationDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && VideoIdentityVerificationDocument::class === $data::class;
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
            $object = new VideoIdentityVerificationDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('full_name', $data) && null !== $data['full_name']) {
                $object->setFullName($data['full_name']);
                unset($data['full_name']);
            } elseif (\array_key_exists('full_name', $data) && null === $data['full_name']) {
                $object->setFullName(null);
            }
            if (\array_key_exists('birth_at', $data) && null !== $data['birth_at']) {
                $object->setBirthAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['birth_at']));
                unset($data['birth_at']);
            } elseif (\array_key_exists('birth_at', $data) && null === $data['birth_at']) {
                $object->setBirthAt(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('document_issuing_country', $data) && null !== $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry($data['document_issuing_country']);
                unset($data['document_issuing_country']);
            } elseif (\array_key_exists('document_issuing_country', $data) && null === $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry(null);
            }
            if (\array_key_exists('front_image_url', $data) && null !== $data['front_image_url']) {
                $object->setFrontImageUrl($data['front_image_url']);
                unset($data['front_image_url']);
            } elseif (\array_key_exists('front_image_url', $data) && null === $data['front_image_url']) {
                $object->setFrontImageUrl(null);
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
            if ($object->isInitialized('fullName') && null !== $object->getFullName()) {
                $data['full_name'] = $object->getFullName();
            }
            if ($object->isInitialized('birthAt') && null !== $object->getBirthAt()) {
                $data['birth_at'] = $object->getBirthAt()->format('Y-m-d\TH:i:sP');
            }
            if ($object->isInitialized('documentType') && null !== $object->getDocumentType()) {
                $data['document_type'] = $object->getDocumentType();
            }
            if ($object->isInitialized('documentIssuingCountry') && null !== $object->getDocumentIssuingCountry()) {
                $data['document_issuing_country'] = $object->getDocumentIssuingCountry();
            }
            if ($object->isInitialized('frontImageUrl') && null !== $object->getFrontImageUrl()) {
                $data['front_image_url'] = $object->getFrontImageUrl();
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
            return [VideoIdentityVerificationDocument::class => false];
        }
    }
}
