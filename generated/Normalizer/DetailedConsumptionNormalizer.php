<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\DetailedConsumption;
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
    class DetailedConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return DetailedConsumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && DetailedConsumption::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new DetailedConsumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('source', $data) && null !== $data['source']) {
                $object->setSource($data['source']);
                unset($data['source']);
            } elseif (\array_key_exists('source', $data) && null === $data['source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('type', $data) && null !== $data['type']) {
                $object->setType($data['type']);
                unset($data['type']);
            } elseif (\array_key_exists('type', $data) && null === $data['type']) {
                $object->setType(null);
            }
            if (\array_key_exists('level', $data) && null !== $data['level']) {
                $object->setLevel($data['level']);
                unset($data['level']);
            } elseif (\array_key_exists('level', $data) && null === $data['level']) {
                $object->setLevel(null);
            }
            if (\array_key_exists('identification_mode', $data) && null !== $data['identification_mode']) {
                $object->setIdentificationMode($data['identification_mode']);
                unset($data['identification_mode']);
            } elseif (\array_key_exists('identification_mode', $data) && null === $data['identification_mode']) {
                $object->setIdentificationMode(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('value', $data) && null !== $data['value']) {
                $object->setValue($data['value']);
                unset($data['value']);
            } elseif (\array_key_exists('value', $data) && null === $data['value']) {
                $object->setValue(null);
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
            $data['source'] = $object->getSource();
            $data['type'] = $object->getType();
            if ($object->isInitialized('level') && null !== $object->getLevel()) {
                $data['level'] = $object->getLevel();
            }
            if ($object->isInitialized('identificationMode') && null !== $object->getIdentificationMode()) {
                $data['identification_mode'] = $object->getIdentificationMode();
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            $data['value'] = $object->getValue();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [DetailedConsumption::class => false];
        }
    }
} else {
    class DetailedConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return DetailedConsumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && DetailedConsumption::class === $data::class;
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
            $object = new DetailedConsumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('source', $data) && null !== $data['source']) {
                $object->setSource($data['source']);
                unset($data['source']);
            } elseif (\array_key_exists('source', $data) && null === $data['source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('type', $data) && null !== $data['type']) {
                $object->setType($data['type']);
                unset($data['type']);
            } elseif (\array_key_exists('type', $data) && null === $data['type']) {
                $object->setType(null);
            }
            if (\array_key_exists('level', $data) && null !== $data['level']) {
                $object->setLevel($data['level']);
                unset($data['level']);
            } elseif (\array_key_exists('level', $data) && null === $data['level']) {
                $object->setLevel(null);
            }
            if (\array_key_exists('identification_mode', $data) && null !== $data['identification_mode']) {
                $object->setIdentificationMode($data['identification_mode']);
                unset($data['identification_mode']);
            } elseif (\array_key_exists('identification_mode', $data) && null === $data['identification_mode']) {
                $object->setIdentificationMode(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('value', $data) && null !== $data['value']) {
                $object->setValue($data['value']);
                unset($data['value']);
            } elseif (\array_key_exists('value', $data) && null === $data['value']) {
                $object->setValue(null);
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
            $data['source'] = $object->getSource();
            $data['type'] = $object->getType();
            if ($object->isInitialized('level') && null !== $object->getLevel()) {
                $data['level'] = $object->getLevel();
            }
            if ($object->isInitialized('identificationMode') && null !== $object->getIdentificationMode()) {
                $data['identification_mode'] = $object->getIdentificationMode();
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            $data['value'] = $object->getValue();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [DetailedConsumption::class => false];
        }
    }
}
