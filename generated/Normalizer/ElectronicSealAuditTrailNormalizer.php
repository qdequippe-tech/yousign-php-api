<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail;
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
    class ElectronicSealAuditTrailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return ElectronicSealAuditTrail::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new ElectronicSealAuditTrail();
            if (\array_key_exists('version', $data) && \is_int($data['version'])) {
                $data['version'] = (float) $data['version'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('version', $data) && null !== $data['version']) {
                $object->setVersion($data['version']);
                unset($data['version']);
            } elseif (\array_key_exists('version', $data) && null === $data['version']) {
                $object->setVersion(null);
            }
            if (\array_key_exists('classification', $data) && null !== $data['classification']) {
                $object->setClassification($data['classification']);
                unset($data['classification']);
            } elseif (\array_key_exists('classification', $data) && null === $data['classification']) {
                $object->setClassification(null);
            }
            if (\array_key_exists('organization', $data) && null !== $data['organization']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['organization'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setOrganization($values);
                unset($data['organization']);
            } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
                $object->setOrganization(null);
            }
            if (\array_key_exists('seal', $data) && null !== $data['seal']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['seal'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setSeal($values_1);
                unset($data['seal']);
            } elseif (\array_key_exists('seal', $data) && null === $data['seal']) {
                $object->setSeal(null);
            }
            if (\array_key_exists('document', $data) && null !== $data['document']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['document'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setDocument($values_2);
                unset($data['document']);
            } elseif (\array_key_exists('document', $data) && null === $data['document']) {
                $object->setDocument(null);
            }
            foreach ($data as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $object[$key_3] = $value_3;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['version'] = $object->getVersion();
            $data['classification'] = $object->getClassification();
            $values = [];
            foreach ($object->getOrganization() as $key => $value) {
                $values[$key] = $value;
            }
            $data['organization'] = $values;
            $values_1 = [];
            foreach ($object->getSeal() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['seal'] = $values_1;
            $values_2 = [];
            foreach ($object->getDocument() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['document'] = $values_2;
            foreach ($object as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $data[$key_3] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ElectronicSealAuditTrail::class => false];
        }
    }
} else {
    class ElectronicSealAuditTrailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return ElectronicSealAuditTrail::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\ElectronicSealAuditTrail::class === $data::class;
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
            $object = new ElectronicSealAuditTrail();
            if (\array_key_exists('version', $data) && \is_int($data['version'])) {
                $data['version'] = (float) $data['version'];
            }
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('version', $data) && null !== $data['version']) {
                $object->setVersion($data['version']);
                unset($data['version']);
            } elseif (\array_key_exists('version', $data) && null === $data['version']) {
                $object->setVersion(null);
            }
            if (\array_key_exists('classification', $data) && null !== $data['classification']) {
                $object->setClassification($data['classification']);
                unset($data['classification']);
            } elseif (\array_key_exists('classification', $data) && null === $data['classification']) {
                $object->setClassification(null);
            }
            if (\array_key_exists('organization', $data) && null !== $data['organization']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['organization'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setOrganization($values);
                unset($data['organization']);
            } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
                $object->setOrganization(null);
            }
            if (\array_key_exists('seal', $data) && null !== $data['seal']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['seal'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setSeal($values_1);
                unset($data['seal']);
            } elseif (\array_key_exists('seal', $data) && null === $data['seal']) {
                $object->setSeal(null);
            }
            if (\array_key_exists('document', $data) && null !== $data['document']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['document'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setDocument($values_2);
                unset($data['document']);
            } elseif (\array_key_exists('document', $data) && null === $data['document']) {
                $object->setDocument(null);
            }
            foreach ($data as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $object[$key_3] = $value_3;
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
            $data['version'] = $object->getVersion();
            $data['classification'] = $object->getClassification();
            $values = [];
            foreach ($object->getOrganization() as $key => $value) {
                $values[$key] = $value;
            }
            $data['organization'] = $values;
            $values_1 = [];
            foreach ($object->getSeal() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['seal'] = $values_1;
            $values_2 = [];
            foreach ($object->getDocument() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['document'] = $values_2;
            foreach ($object as $key_3 => $value_3) {
                if (preg_match('/.*/', (string) $key_3)) {
                    $data[$key_3] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [ElectronicSealAuditTrail::class => false];
        }
    }
}
