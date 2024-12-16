<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdDocumentVerificationExtractedFromDocumentMrz;
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
    class IdDocumentVerificationExtractedFromDocumentMrzNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return IdDocumentVerificationExtractedFromDocumentMrz::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && IdDocumentVerificationExtractedFromDocumentMrz::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new IdDocumentVerificationExtractedFromDocumentMrz();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('line1', $data) && null !== $data['line1']) {
                $object->setLine1($data['line1']);
                unset($data['line1']);
            } elseif (\array_key_exists('line1', $data) && null === $data['line1']) {
                $object->setLine1(null);
            }
            if (\array_key_exists('line2', $data) && null !== $data['line2']) {
                $object->setLine2($data['line2']);
                unset($data['line2']);
            } elseif (\array_key_exists('line2', $data) && null === $data['line2']) {
                $object->setLine2(null);
            }
            if (\array_key_exists('line3', $data) && null !== $data['line3']) {
                $object->setLine3($data['line3']);
                unset($data['line3']);
            } elseif (\array_key_exists('line3', $data) && null === $data['line3']) {
                $object->setLine3(null);
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
            $data['line1'] = $object->getLine1();
            $data['line2'] = $object->getLine2();
            $data['line3'] = $object->getLine3();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [IdDocumentVerificationExtractedFromDocumentMrz::class => false];
        }
    }
} else {
    class IdDocumentVerificationExtractedFromDocumentMrzNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return IdDocumentVerificationExtractedFromDocumentMrz::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && IdDocumentVerificationExtractedFromDocumentMrz::class === $data::class;
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
            $object = new IdDocumentVerificationExtractedFromDocumentMrz();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('line1', $data) && null !== $data['line1']) {
                $object->setLine1($data['line1']);
                unset($data['line1']);
            } elseif (\array_key_exists('line1', $data) && null === $data['line1']) {
                $object->setLine1(null);
            }
            if (\array_key_exists('line2', $data) && null !== $data['line2']) {
                $object->setLine2($data['line2']);
                unset($data['line2']);
            } elseif (\array_key_exists('line2', $data) && null === $data['line2']) {
                $object->setLine2(null);
            }
            if (\array_key_exists('line3', $data) && null !== $data['line3']) {
                $object->setLine3($data['line3']);
                unset($data['line3']);
            } elseif (\array_key_exists('line3', $data) && null === $data['line3']) {
                $object->setLine3(null);
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
            $data['line1'] = $object->getLine1();
            $data['line2'] = $object->getLine2();
            $data['line3'] = $object->getLine3();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [IdDocumentVerificationExtractedFromDocumentMrz::class => false];
        }
    }
}
