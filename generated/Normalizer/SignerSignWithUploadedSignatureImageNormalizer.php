<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerSignWithUploadedSignatureImage;
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
    class SignerSignWithUploadedSignatureImageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignerSignWithUploadedSignatureImage::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerSignWithUploadedSignatureImage::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignerSignWithUploadedSignatureImage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('otp', $data) && null !== $data['otp']) {
                $object->setOtp($data['otp']);
                unset($data['otp']);
            } elseif (\array_key_exists('otp', $data) && null === $data['otp']) {
                $object->setOtp(null);
            }
            if (\array_key_exists('ip_address', $data) && null !== $data['ip_address']) {
                $object->setIpAddress($data['ip_address']);
                unset($data['ip_address']);
            } elseif (\array_key_exists('ip_address', $data) && null === $data['ip_address']) {
                $object->setIpAddress(null);
            }
            if (\array_key_exists('consent_given_at', $data) && null !== $data['consent_given_at']) {
                $object->setConsentGivenAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['consent_given_at']));
                unset($data['consent_given_at']);
            } elseif (\array_key_exists('consent_given_at', $data) && null === $data['consent_given_at']) {
                $object->setConsentGivenAt(null);
            }
            if (\array_key_exists('signature_image', $data) && null !== $data['signature_image']) {
                $object->setSignatureImage($data['signature_image']);
                unset($data['signature_image']);
            } elseif (\array_key_exists('signature_image', $data) && null === $data['signature_image']) {
                $object->setSignatureImage(null);
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
            if ($object->isInitialized('otp') && null !== $object->getOtp()) {
                $data['otp'] = $object->getOtp();
            }
            $data['ip_address'] = $object->getIpAddress();
            $data['consent_given_at'] = $object->getConsentGivenAt()?->format('Y-m-d\TH:i:sP');
            $data['signature_image'] = $object->getSignatureImage();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerSignWithUploadedSignatureImage::class => false];
        }
    }
} else {
    class SignerSignWithUploadedSignatureImageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignerSignWithUploadedSignatureImage::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerSignWithUploadedSignatureImage::class === $data::class;
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
            $object = new SignerSignWithUploadedSignatureImage();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('otp', $data) && null !== $data['otp']) {
                $object->setOtp($data['otp']);
                unset($data['otp']);
            } elseif (\array_key_exists('otp', $data) && null === $data['otp']) {
                $object->setOtp(null);
            }
            if (\array_key_exists('ip_address', $data) && null !== $data['ip_address']) {
                $object->setIpAddress($data['ip_address']);
                unset($data['ip_address']);
            } elseif (\array_key_exists('ip_address', $data) && null === $data['ip_address']) {
                $object->setIpAddress(null);
            }
            if (\array_key_exists('consent_given_at', $data) && null !== $data['consent_given_at']) {
                $object->setConsentGivenAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['consent_given_at']));
                unset($data['consent_given_at']);
            } elseif (\array_key_exists('consent_given_at', $data) && null === $data['consent_given_at']) {
                $object->setConsentGivenAt(null);
            }
            if (\array_key_exists('signature_image', $data) && null !== $data['signature_image']) {
                $object->setSignatureImage($data['signature_image']);
                unset($data['signature_image']);
            } elseif (\array_key_exists('signature_image', $data) && null === $data['signature_image']) {
                $object->setSignatureImage(null);
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
            if ($object->isInitialized('otp') && null !== $object->getOtp()) {
                $data['otp'] = $object->getOtp();
            }
            $data['ip_address'] = $object->getIpAddress();
            $data['consent_given_at'] = $object->getConsentGivenAt()?->format('Y-m-d\TH:i:sP');
            $data['signature_image'] = $object->getSignatureImage();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerSignWithUploadedSignatureImage::class => false];
        }
    }
}
