<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\BankAccountVerificationExtractedFromDocument;
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
    class BankAccountVerificationExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return BankAccountVerificationExtractedFromDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && BankAccountVerificationExtractedFromDocument::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new BankAccountVerificationExtractedFromDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('iban', $data) && null !== $data['iban']) {
                $value = $data['iban'];
                if (\is_string($data['iban'])) {
                    $value = $data['iban'];
                } elseif (\is_string($data['iban'])) {
                    $value = $data['iban'];
                }
                $object->setIban($value);
                unset($data['iban']);
            } elseif (\array_key_exists('iban', $data) && null === $data['iban']) {
                $object->setIban(null);
            }
            if (\array_key_exists('bic', $data) && null !== $data['bic']) {
                $value_1 = $data['bic'];
                if (\is_string($data['bic'])) {
                    $value_1 = $data['bic'];
                } elseif (\is_string($data['bic'])) {
                    $value_1 = $data['bic'];
                }
                $object->setBic($value_1);
                unset($data['bic']);
            } elseif (\array_key_exists('bic', $data) && null === $data['bic']) {
                $object->setBic(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('iban') && null !== $object->getIban()) {
                $value = $object->getIban();
                if (\is_string($object->getIban())) {
                    $value = $object->getIban();
                } elseif (\is_string($object->getIban())) {
                    $value = $object->getIban();
                }
                $data['iban'] = $value;
            }
            if ($object->isInitialized('bic') && null !== $object->getBic()) {
                $value_1 = $object->getBic();
                if (\is_string($object->getBic())) {
                    $value_1 = $object->getBic();
                } elseif (\is_string($object->getBic())) {
                    $value_1 = $object->getBic();
                }
                $data['bic'] = $value_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [BankAccountVerificationExtractedFromDocument::class => false];
        }
    }
} else {
    class BankAccountVerificationExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return BankAccountVerificationExtractedFromDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && BankAccountVerificationExtractedFromDocument::class === $data::class;
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
            $object = new BankAccountVerificationExtractedFromDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('iban', $data) && null !== $data['iban']) {
                $value = $data['iban'];
                if (\is_string($data['iban'])) {
                    $value = $data['iban'];
                } elseif (\is_string($data['iban'])) {
                    $value = $data['iban'];
                }
                $object->setIban($value);
                unset($data['iban']);
            } elseif (\array_key_exists('iban', $data) && null === $data['iban']) {
                $object->setIban(null);
            }
            if (\array_key_exists('bic', $data) && null !== $data['bic']) {
                $value_1 = $data['bic'];
                if (\is_string($data['bic'])) {
                    $value_1 = $data['bic'];
                } elseif (\is_string($data['bic'])) {
                    $value_1 = $data['bic'];
                }
                $object->setBic($value_1);
                unset($data['bic']);
            } elseif (\array_key_exists('bic', $data) && null === $data['bic']) {
                $object->setBic(null);
            }
            foreach ($data as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_2;
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
            if ($object->isInitialized('iban') && null !== $object->getIban()) {
                $value = $object->getIban();
                if (\is_string($object->getIban())) {
                    $value = $object->getIban();
                } elseif (\is_string($object->getIban())) {
                    $value = $object->getIban();
                }
                $data['iban'] = $value;
            }
            if ($object->isInitialized('bic') && null !== $object->getBic()) {
                $value_1 = $object->getBic();
                if (\is_string($object->getBic())) {
                    $value_1 = $object->getBic();
                } elseif (\is_string($object->getBic())) {
                    $value_1 = $object->getBic();
                }
                $data['bic'] = $value_1;
            }
            foreach ($object as $key => $value_2) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_2;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [BankAccountVerificationExtractedFromDocument::class => false];
        }
    }
}
