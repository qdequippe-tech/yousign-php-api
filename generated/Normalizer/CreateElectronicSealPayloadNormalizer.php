<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload;
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
    class CreateElectronicSealPayloadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return CreateElectronicSealPayload::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateElectronicSealPayload();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
                $object->setDocumentId($data['document_id']);
                unset($data['document_id']);
            } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
                $object->setDocumentId(null);
            }
            if (\array_key_exists('image_id', $data) && null !== $data['image_id']) {
                $object->setImageId($data['image_id']);
                unset($data['image_id']);
            } elseif (\array_key_exists('image_id', $data) && null === $data['image_id']) {
                $object->setImageId(null);
            }
            if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
                $object->setExternalId($data['external_id']);
                unset($data['external_id']);
            } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
                $object->setExternalId(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setFields($values);
                unset($data['fields']);
            } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
                $object->setFields(null);
            }
            if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
                $object->setSignatureLevel($data['signature_level']);
                unset($data['signature_level']);
            } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
                $object->setSignatureLevel(null);
            }
            if (\array_key_exists('certificate_id', $data) && null !== $data['certificate_id']) {
                $object->setCertificateId($data['certificate_id']);
                unset($data['certificate_id']);
            } elseif (\array_key_exists('certificate_id', $data) && null === $data['certificate_id']) {
                $object->setCertificateId(null);
            }
            foreach ($data as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['document_id'] = $object->getDocumentId();
            if ($object->isInitialized('imageId') && null !== $object->getImageId()) {
                $data['image_id'] = $object->getImageId();
            }
            if ($object->isInitialized('externalId') && null !== $object->getExternalId()) {
                $data['external_id'] = $object->getExternalId();
            }
            $values = [];
            foreach ($object->getFields() as $value) {
                $values_1 = [];
                foreach ($value as $key => $value_1) {
                    $values_1[$key] = $value_1;
                }
                $values[] = $values_1;
            }
            $data['fields'] = $values;
            if ($object->isInitialized('signatureLevel') && null !== $object->getSignatureLevel()) {
                $data['signature_level'] = $object->getSignatureLevel();
            }
            if ($object->isInitialized('certificateId') && null !== $object->getCertificateId()) {
                $data['certificate_id'] = $object->getCertificateId();
            }
            foreach ($object as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateElectronicSealPayload::class => false];
        }
    }
} else {
    class CreateElectronicSealPayloadNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return CreateElectronicSealPayload::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateElectronicSealPayload::class === $data::class;
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
            $object = new CreateElectronicSealPayload();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('document_id', $data) && null !== $data['document_id']) {
                $object->setDocumentId($data['document_id']);
                unset($data['document_id']);
            } elseif (\array_key_exists('document_id', $data) && null === $data['document_id']) {
                $object->setDocumentId(null);
            }
            if (\array_key_exists('image_id', $data) && null !== $data['image_id']) {
                $object->setImageId($data['image_id']);
                unset($data['image_id']);
            } elseif (\array_key_exists('image_id', $data) && null === $data['image_id']) {
                $object->setImageId(null);
            }
            if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
                $object->setExternalId($data['external_id']);
                unset($data['external_id']);
            } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
                $object->setExternalId(null);
            }
            if (\array_key_exists('fields', $data) && null !== $data['fields']) {
                $values = [];
                foreach ($data['fields'] as $value) {
                    $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value as $key => $value_1) {
                        $values_1[$key] = $value_1;
                    }
                    $values[] = $values_1;
                }
                $object->setFields($values);
                unset($data['fields']);
            } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
                $object->setFields(null);
            }
            if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
                $object->setSignatureLevel($data['signature_level']);
                unset($data['signature_level']);
            } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
                $object->setSignatureLevel(null);
            }
            if (\array_key_exists('certificate_id', $data) && null !== $data['certificate_id']) {
                $object->setCertificateId($data['certificate_id']);
                unset($data['certificate_id']);
            } elseif (\array_key_exists('certificate_id', $data) && null === $data['certificate_id']) {
                $object->setCertificateId(null);
            }
            foreach ($data as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $object[$key_1] = $value_2;
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
            $data['document_id'] = $object->getDocumentId();
            if ($object->isInitialized('imageId') && null !== $object->getImageId()) {
                $data['image_id'] = $object->getImageId();
            }
            if ($object->isInitialized('externalId') && null !== $object->getExternalId()) {
                $data['external_id'] = $object->getExternalId();
            }
            $values = [];
            foreach ($object->getFields() as $value) {
                $values_1 = [];
                foreach ($value as $key => $value_1) {
                    $values_1[$key] = $value_1;
                }
                $values[] = $values_1;
            }
            $data['fields'] = $values;
            if ($object->isInitialized('signatureLevel') && null !== $object->getSignatureLevel()) {
                $data['signature_level'] = $object->getSignatureLevel();
            }
            if ($object->isInitialized('certificateId') && null !== $object->getCertificateId()) {
                $data['certificate_id'] = $object->getCertificateId();
            }
            foreach ($object as $key_1 => $value_2) {
                if (preg_match('/.*/', (string) $key_1)) {
                    $data[$key_1] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateElectronicSealPayload::class => false];
        }
    }
}
