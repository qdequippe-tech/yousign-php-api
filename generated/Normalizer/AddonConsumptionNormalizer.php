<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\AddonConsumption;
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
    class AddonConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return AddonConsumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && AddonConsumption::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new AddonConsumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('start_at', $data) && null !== $data['start_at']) {
                $object->setStartAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['start_at']));
                unset($data['start_at']);
            } elseif (\array_key_exists('start_at', $data) && null === $data['start_at']) {
                $object->setStartAt(null);
            }
            if (\array_key_exists('end_at', $data) && null !== $data['end_at']) {
                $object->setEndAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['end_at']));
                unset($data['end_at']);
            } elseif (\array_key_exists('end_at', $data) && null === $data['end_at']) {
                $object->setEndAt(null);
            }
            if (\array_key_exists('quota', $data) && null !== $data['quota']) {
                $object->setQuota($data['quota']);
                unset($data['quota']);
            } elseif (\array_key_exists('quota', $data) && null === $data['quota']) {
                $object->setQuota(null);
            }
            if (\array_key_exists('consumed', $data) && null !== $data['consumed']) {
                $object->setConsumed($data['consumed']);
                unset($data['consumed']);
            } elseif (\array_key_exists('consumed', $data) && null === $data['consumed']) {
                $object->setConsumed(null);
            }
            if (\array_key_exists('provisioned', $data) && null !== $data['provisioned']) {
                $object->setProvisioned($data['provisioned']);
                unset($data['provisioned']);
            } elseif (\array_key_exists('provisioned', $data) && null === $data['provisioned']) {
                $object->setProvisioned(null);
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
            $data['name'] = $object->getName();
            $data['start_at'] = $object->getStartAt()?->format('Y-m-d\TH:i:sP');
            $data['end_at'] = $object->getEndAt()?->format('Y-m-d\TH:i:sP');
            $data['quota'] = $object->getQuota();
            $data['consumed'] = $object->getConsumed();
            if ($object->isInitialized('provisioned') && null !== $object->getProvisioned()) {
                $data['provisioned'] = $object->getProvisioned();
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
            return [AddonConsumption::class => false];
        }
    }
} else {
    class AddonConsumptionNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return AddonConsumption::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && AddonConsumption::class === $data::class;
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
            $object = new AddonConsumption();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('start_at', $data) && null !== $data['start_at']) {
                $object->setStartAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['start_at']));
                unset($data['start_at']);
            } elseif (\array_key_exists('start_at', $data) && null === $data['start_at']) {
                $object->setStartAt(null);
            }
            if (\array_key_exists('end_at', $data) && null !== $data['end_at']) {
                $object->setEndAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['end_at']));
                unset($data['end_at']);
            } elseif (\array_key_exists('end_at', $data) && null === $data['end_at']) {
                $object->setEndAt(null);
            }
            if (\array_key_exists('quota', $data) && null !== $data['quota']) {
                $object->setQuota($data['quota']);
                unset($data['quota']);
            } elseif (\array_key_exists('quota', $data) && null === $data['quota']) {
                $object->setQuota(null);
            }
            if (\array_key_exists('consumed', $data) && null !== $data['consumed']) {
                $object->setConsumed($data['consumed']);
                unset($data['consumed']);
            } elseif (\array_key_exists('consumed', $data) && null === $data['consumed']) {
                $object->setConsumed(null);
            }
            if (\array_key_exists('provisioned', $data) && null !== $data['provisioned']) {
                $object->setProvisioned($data['provisioned']);
                unset($data['provisioned']);
            } elseif (\array_key_exists('provisioned', $data) && null === $data['provisioned']) {
                $object->setProvisioned(null);
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
            $data['name'] = $object->getName();
            $data['start_at'] = $object->getStartAt()?->format('Y-m-d\TH:i:sP');
            $data['end_at'] = $object->getEndAt()?->format('Y-m-d\TH:i:sP');
            $data['quota'] = $object->getQuota();
            $data['consumed'] = $object->getConsumed();
            if ($object->isInitialized('provisioned') && null !== $object->getProvisioned()) {
                $data['provisioned'] = $object->getProvisioned();
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
            return [AddonConsumption::class => false];
        }
    }
}
