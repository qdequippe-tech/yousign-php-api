<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Consumption;
use Qdequippe\Yousign\Api\Model\ConsumptionApi;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
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
    class ConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Consumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Consumption::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Consumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('app', $data) && null !== $data['app']) {
                $object->setApp($this->denormalizer->denormalize($data['app'], ConsumptionApp::class, 'json', $context));
                unset($data['app']);
            } elseif (\array_key_exists('app', $data) && null === $data['app']) {
                $object->setApp(null);
            }
            if (\array_key_exists('api', $data) && null !== $data['api']) {
                $object->setApi($this->denormalizer->denormalize($data['api'], ConsumptionApi::class, 'json', $context));
                unset($data['api']);
            } elseif (\array_key_exists('api', $data) && null === $data['api']) {
                $object->setApi(null);
            }
            if (\array_key_exists('connector', $data) && null !== $data['connector']) {
                $object->setConnector($this->denormalizer->denormalize($data['connector'], ConsumptionApp::class, 'json', $context));
                unset($data['connector']);
            } elseif (\array_key_exists('connector', $data) && null === $data['connector']) {
                $object->setConnector(null);
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
            $data['app'] = $this->normalizer->normalize($object->getApp(), 'json', $context);
            $data['api'] = $this->normalizer->normalize($object->getApi(), 'json', $context);
            $data['connector'] = $this->normalizer->normalize($object->getConnector(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Consumption::class => false];
        }
    }
} else {
    class ConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Consumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Consumption::class === $data::class;
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
            $object = new Consumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('app', $data) && null !== $data['app']) {
                $object->setApp($this->denormalizer->denormalize($data['app'], ConsumptionApp::class, 'json', $context));
                unset($data['app']);
            } elseif (\array_key_exists('app', $data) && null === $data['app']) {
                $object->setApp(null);
            }
            if (\array_key_exists('api', $data) && null !== $data['api']) {
                $object->setApi($this->denormalizer->denormalize($data['api'], ConsumptionApi::class, 'json', $context));
                unset($data['api']);
            } elseif (\array_key_exists('api', $data) && null === $data['api']) {
                $object->setApi(null);
            }
            if (\array_key_exists('connector', $data) && null !== $data['connector']) {
                $object->setConnector($this->denormalizer->denormalize($data['connector'], ConsumptionApp::class, 'json', $context));
                unset($data['connector']);
            } elseif (\array_key_exists('connector', $data) && null === $data['connector']) {
                $object->setConnector(null);
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
         *
         * @return array|string|int|float|bool|\ArrayObject|null
         */
        public function normalize($object, $format = null, array $context = [])
        {
            $data = [];
            $data['app'] = $this->normalizer->normalize($object->getApp(), 'json', $context);
            $data['api'] = $this->normalizer->normalize($object->getApi(), 'json', $context);
            $data['connector'] = $this->normalizer->normalize($object->getConnector(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [Consumption::class => false];
        }
    }
}
