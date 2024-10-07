<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response;
use Qdequippe\Yousign\Api\Model\SignerConsentRequest;
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
    class GetSignatureRequestsSignatureRequestIdSignerConsentRequests200ResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('data', $data) && null !== $data['data']) {
                $values = [];
                foreach ($data['data'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, SignerConsentRequest::class, 'json', $context);
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
            if ($object->isInitialized('data') && null !== $object->getData()) {
                $values = [];
                foreach ($object->getData() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
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
            return [GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => false];
        }
    }
} else {
    class GetSignatureRequestsSignatureRequestIdSignerConsentRequests200ResponseNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class === $data::class;
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
            $object = new GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('data', $data) && null !== $data['data']) {
                $values = [];
                foreach ($data['data'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, SignerConsentRequest::class, 'json', $context);
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
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            if ($object->isInitialized('data') && null !== $object->getData()) {
                $values = [];
                foreach ($object->getData() as $value) {
                    $values[] = $this->normalizer->normalize($value, 'json', $context);
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
            return [GetSignatureRequestsSignatureRequestIdSignerConsentRequests200Response::class => false];
        }
    }
}
