<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification;
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
    class ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ConsumptionAppQualifiedElectronicSignatureIdentificationMode();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('identity_verification', $data) && null !== $data['identity_verification']) {
                $object->setIdentityVerification($this->denormalizer->denormalize($data['identity_verification'], ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class, 'json', $context));
                unset($data['identity_verification']);
            } elseif (\array_key_exists('identity_verification', $data) && null === $data['identity_verification']) {
                $object->setIdentityVerification(null);
            }
            if (\array_key_exists('saved_identity', $data) && null !== $data['saved_identity']) {
                $object->setSavedIdentity($data['saved_identity']);
                unset($data['saved_identity']);
            } elseif (\array_key_exists('saved_identity', $data) && null === $data['saved_identity']) {
                $object->setSavedIdentity(null);
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
            $data['identity_verification'] = $this->normalizer->normalize($object->getIdentityVerification(), 'json', $context);
            $data['saved_identity'] = $object->getSavedIdentity();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false];
        }
    }
} else {
    class ConsumptionAppQualifiedElectronicSignatureIdentificationModeNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class === $data::class;
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
            $object = new ConsumptionAppQualifiedElectronicSignatureIdentificationMode();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('identity_verification', $data) && null !== $data['identity_verification']) {
                $object->setIdentityVerification($this->denormalizer->denormalize($data['identity_verification'], ConsumptionAppQualifiedElectronicSignatureIdentificationModeIdentityVerification::class, 'json', $context));
                unset($data['identity_verification']);
            } elseif (\array_key_exists('identity_verification', $data) && null === $data['identity_verification']) {
                $object->setIdentityVerification(null);
            }
            if (\array_key_exists('saved_identity', $data) && null !== $data['saved_identity']) {
                $object->setSavedIdentity($data['saved_identity']);
                unset($data['saved_identity']);
            } elseif (\array_key_exists('saved_identity', $data) && null === $data['saved_identity']) {
                $object->setSavedIdentity(null);
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
            $data['identity_verification'] = $this->normalizer->normalize($object->getIdentityVerification(), 'json', $context);
            $data['saved_identity'] = $object->getSavedIdentity();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class => false];
        }
    }
}
