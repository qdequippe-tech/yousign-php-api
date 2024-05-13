<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ConsumptionApp;
use Qdequippe\Yousign\Api\Model\ConsumptionAppQualifiedElectronicSignatureIdentificationMode;
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
    class ConsumptionAppNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return ConsumptionApp::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ConsumptionApp::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ConsumptionApp();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('electronic_signature', $data) && null !== $data['electronic_signature']) {
                $object->setElectronicSignature($data['electronic_signature']);
                unset($data['electronic_signature']);
            } elseif (\array_key_exists('electronic_signature', $data) && null === $data['electronic_signature']) {
                $object->setElectronicSignature(null);
            }
            if (\array_key_exists('advanced_electronic_signature', $data) && null !== $data['advanced_electronic_signature']) {
                $object->setAdvancedElectronicSignature($data['advanced_electronic_signature']);
                unset($data['advanced_electronic_signature']);
            } elseif (\array_key_exists('advanced_electronic_signature', $data) && null === $data['advanced_electronic_signature']) {
                $object->setAdvancedElectronicSignature(null);
            }
            if (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null !== $data['advanced_electronic_signature_with_qualified_certificate']) {
                $object->setAdvancedElectronicSignatureWithQualifiedCertificate($data['advanced_electronic_signature_with_qualified_certificate']);
                unset($data['advanced_electronic_signature_with_qualified_certificate']);
            } elseif (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null === $data['advanced_electronic_signature_with_qualified_certificate']) {
                $object->setAdvancedElectronicSignatureWithQualifiedCertificate(null);
            }
            if (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null !== $data['qualified_electronic_signature_identification_mode']) {
                $object->setQualifiedElectronicSignatureIdentificationMode($this->denormalizer->denormalize($data['qualified_electronic_signature_identification_mode'], ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class, 'json', $context));
                unset($data['qualified_electronic_signature_identification_mode']);
            } elseif (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null === $data['qualified_electronic_signature_identification_mode']) {
                $object->setQualifiedElectronicSignatureIdentificationMode(null);
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
            $data['electronic_signature'] = $object->getElectronicSignature();
            $data['advanced_electronic_signature'] = $object->getAdvancedElectronicSignature();
            $data['advanced_electronic_signature_with_qualified_certificate'] = $object->getAdvancedElectronicSignatureWithQualifiedCertificate();
            $data['qualified_electronic_signature_identification_mode'] = $this->normalizer->normalize($object->getQualifiedElectronicSignatureIdentificationMode(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ConsumptionApp::class => false];
        }
    }
} else {
    class ConsumptionAppNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return ConsumptionApp::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && ConsumptionApp::class === $data::class;
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
            $object = new ConsumptionApp();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('electronic_signature', $data) && null !== $data['electronic_signature']) {
                $object->setElectronicSignature($data['electronic_signature']);
                unset($data['electronic_signature']);
            } elseif (\array_key_exists('electronic_signature', $data) && null === $data['electronic_signature']) {
                $object->setElectronicSignature(null);
            }
            if (\array_key_exists('advanced_electronic_signature', $data) && null !== $data['advanced_electronic_signature']) {
                $object->setAdvancedElectronicSignature($data['advanced_electronic_signature']);
                unset($data['advanced_electronic_signature']);
            } elseif (\array_key_exists('advanced_electronic_signature', $data) && null === $data['advanced_electronic_signature']) {
                $object->setAdvancedElectronicSignature(null);
            }
            if (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null !== $data['advanced_electronic_signature_with_qualified_certificate']) {
                $object->setAdvancedElectronicSignatureWithQualifiedCertificate($data['advanced_electronic_signature_with_qualified_certificate']);
                unset($data['advanced_electronic_signature_with_qualified_certificate']);
            } elseif (\array_key_exists('advanced_electronic_signature_with_qualified_certificate', $data) && null === $data['advanced_electronic_signature_with_qualified_certificate']) {
                $object->setAdvancedElectronicSignatureWithQualifiedCertificate(null);
            }
            if (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null !== $data['qualified_electronic_signature_identification_mode']) {
                $object->setQualifiedElectronicSignatureIdentificationMode($this->denormalizer->denormalize($data['qualified_electronic_signature_identification_mode'], ConsumptionAppQualifiedElectronicSignatureIdentificationMode::class, 'json', $context));
                unset($data['qualified_electronic_signature_identification_mode']);
            } elseif (\array_key_exists('qualified_electronic_signature_identification_mode', $data) && null === $data['qualified_electronic_signature_identification_mode']) {
                $object->setQualifiedElectronicSignatureIdentificationMode(null);
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
            $data['electronic_signature'] = $object->getElectronicSignature();
            $data['advanced_electronic_signature'] = $object->getAdvancedElectronicSignature();
            $data['advanced_electronic_signature_with_qualified_certificate'] = $object->getAdvancedElectronicSignatureWithQualifiedCertificate();
            $data['qualified_electronic_signature_identification_mode'] = $this->normalizer->normalize($object->getQualifiedElectronicSignatureIdentificationMode(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ConsumptionApp::class => false];
        }
    }
}
