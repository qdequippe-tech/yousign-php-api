<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response;
use Qdequippe\Yousign\Api\Model\Pagination;
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
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('meta', $data) && null !== $data['meta']) {
                $object->setMeta($this->denormalizer->denormalize($data['meta'], Pagination::class, 'json', $context));
                unset($data['meta']);
            } elseif (\array_key_exists('meta', $data) && null === $data['meta']) {
                $object->setMeta(null);
            }
            if (\array_key_exists('data', $data) && null !== $data['data']) {
                $values = [];
                foreach ($data['data'] as $value) {
                    $values[] = $value;
                }
                $object->setData($values);
                unset($data['data']);
            } elseif (\array_key_exists('data', $data) && null === $data['data']) {
                $object->setData(null);
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
            if ($object->isInitialized('meta') && null !== $object->getMeta()) {
                $data['meta'] = $this->normalizer->normalize($object->getMeta(), 'json', $context);
            }
            if ($object->isInitialized('data') && null !== $object->getData()) {
                $values = [];
                foreach ($object->getData() as $value) {
                    $values[] = $value;
                }
                $data['data'] = $values;
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
            return [GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false];
        }
    }
} else {
    class GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200ResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class === $data::class;
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
            $object = new GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('meta', $data) && null !== $data['meta']) {
                $object->setMeta($this->denormalizer->denormalize($data['meta'], Pagination::class, 'json', $context));
                unset($data['meta']);
            } elseif (\array_key_exists('meta', $data) && null === $data['meta']) {
                $object->setMeta(null);
            }
            if (\array_key_exists('data', $data) && null !== $data['data']) {
                $values = [];
                foreach ($data['data'] as $value) {
                    $values[] = $value;
                }
                $object->setData($values);
                unset($data['data']);
            } elseif (\array_key_exists('data', $data) && null === $data['data']) {
                $object->setData(null);
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
            if ($object->isInitialized('meta') && null !== $object->getMeta()) {
                $data['meta'] = $this->normalizer->normalize($object->getMeta(), 'json', $context);
            }
            if ($object->isInitialized('data') && null !== $object->getData()) {
                $values = [];
                foreach ($object->getData() as $value) {
                    $values[] = $value;
                }
                $data['data'] = $values;
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
            return [GetSignatureRequestsSignatureRequestIdDocumentsDocumentIdFields200Response::class => false];
        }
    }
}
