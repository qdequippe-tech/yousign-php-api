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
                $object->setIban($data['iban']);
                unset($data['iban']);
            } elseif (\array_key_exists('iban', $data) && null === $data['iban']) {
                $object->setIban(null);
            }
            if (\array_key_exists('bic', $data) && null !== $data['bic']) {
                $object->setBic($data['bic']);
                unset($data['bic']);
            } elseif (\array_key_exists('bic', $data) && null === $data['bic']) {
                $object->setBic(null);
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
            if ($object->isInitialized('iban') && null !== $object->getIban()) {
                $data['iban'] = $object->getIban();
            }
            if ($object->isInitialized('bic') && null !== $object->getBic()) {
                $data['bic'] = $object->getBic();
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
        public function denormalize($data, $type, $format = null, array $context = []): mixed
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
                $object->setIban($data['iban']);
                unset($data['iban']);
            } elseif (\array_key_exists('iban', $data) && null === $data['iban']) {
                $object->setIban(null);
            }
            if (\array_key_exists('bic', $data) && null !== $data['bic']) {
                $object->setBic($data['bic']);
                unset($data['bic']);
            } elseif (\array_key_exists('bic', $data) && null === $data['bic']) {
                $object->setBic(null);
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
            if ($object->isInitialized('iban') && null !== $object->getIban()) {
                $data['iban'] = $object->getIban();
            }
            if ($object->isInitialized('bic') && null !== $object->getBic()) {
                $data['bic'] = $object->getBic();
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
            return [BankAccountVerificationExtractedFromDocument::class => false];
        }
    }
}
