<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
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
    class SignerRedirectUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignerRedirectUrls::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\SignerRedirectUrls::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignerRedirectUrls();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('success', $data) && null !== $data['success']) {
                $object->setSuccess($data['success']);
                unset($data['success']);
            } elseif (\array_key_exists('success', $data) && null === $data['success']) {
                $object->setSuccess(null);
            }
            if (\array_key_exists('error', $data) && null !== $data['error']) {
                $object->setError($data['error']);
                unset($data['error']);
            } elseif (\array_key_exists('error', $data) && null === $data['error']) {
                $object->setError(null);
            }
            if (\array_key_exists('decline', $data) && null !== $data['decline']) {
                $object->setDecline($data['decline']);
                unset($data['decline']);
            } elseif (\array_key_exists('decline', $data) && null === $data['decline']) {
                $object->setDecline(null);
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
            $data['success'] = $object->getSuccess();
            $data['error'] = $object->getError();
            $data['decline'] = $object->getDecline();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerRedirectUrls::class => false];
        }
    }
} else {
    class SignerRedirectUrlsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignerRedirectUrls::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\SignerRedirectUrls::class === $data::class;
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
            $object = new SignerRedirectUrls();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('success', $data) && null !== $data['success']) {
                $object->setSuccess($data['success']);
                unset($data['success']);
            } elseif (\array_key_exists('success', $data) && null === $data['success']) {
                $object->setSuccess(null);
            }
            if (\array_key_exists('error', $data) && null !== $data['error']) {
                $object->setError($data['error']);
                unset($data['error']);
            } elseif (\array_key_exists('error', $data) && null === $data['error']) {
                $object->setError(null);
            }
            if (\array_key_exists('decline', $data) && null !== $data['decline']) {
                $object->setDecline($data['decline']);
                unset($data['decline']);
            } elseif (\array_key_exists('decline', $data) && null === $data['decline']) {
                $object->setDecline(null);
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
            $data['success'] = $object->getSuccess();
            $data['error'] = $object->getError();
            $data['decline'] = $object->getDecline();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerRedirectUrls::class => false];
        }
    }
}
