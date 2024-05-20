<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerCustomText;
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
    class SignerCustomTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignerCustomText::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerCustomText::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignerCustomText();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('request_subject', $data) && null !== $data['request_subject']) {
                $object->setRequestSubject($data['request_subject']);
                unset($data['request_subject']);
            } elseif (\array_key_exists('request_subject', $data) && null === $data['request_subject']) {
                $object->setRequestSubject(null);
            }
            if (\array_key_exists('request_body', $data) && null !== $data['request_body']) {
                $object->setRequestBody($data['request_body']);
                unset($data['request_body']);
            } elseif (\array_key_exists('request_body', $data) && null === $data['request_body']) {
                $object->setRequestBody(null);
            }
            if (\array_key_exists('reminder_subject', $data) && null !== $data['reminder_subject']) {
                $object->setReminderSubject($data['reminder_subject']);
                unset($data['reminder_subject']);
            } elseif (\array_key_exists('reminder_subject', $data) && null === $data['reminder_subject']) {
                $object->setReminderSubject(null);
            }
            if (\array_key_exists('reminder_body', $data) && null !== $data['reminder_body']) {
                $object->setReminderBody($data['reminder_body']);
                unset($data['reminder_body']);
            } elseif (\array_key_exists('reminder_body', $data) && null === $data['reminder_body']) {
                $object->setReminderBody(null);
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
            $data['request_subject'] = $object->getRequestSubject();
            $data['request_body'] = $object->getRequestBody();
            $data['reminder_subject'] = $object->getReminderSubject();
            $data['reminder_body'] = $object->getReminderBody();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerCustomText::class => false];
        }
    }
} else {
    class SignerCustomTextNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignerCustomText::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerCustomText::class === $data::class;
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
            $object = new SignerCustomText();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('request_subject', $data) && null !== $data['request_subject']) {
                $object->setRequestSubject($data['request_subject']);
                unset($data['request_subject']);
            } elseif (\array_key_exists('request_subject', $data) && null === $data['request_subject']) {
                $object->setRequestSubject(null);
            }
            if (\array_key_exists('request_body', $data) && null !== $data['request_body']) {
                $object->setRequestBody($data['request_body']);
                unset($data['request_body']);
            } elseif (\array_key_exists('request_body', $data) && null === $data['request_body']) {
                $object->setRequestBody(null);
            }
            if (\array_key_exists('reminder_subject', $data) && null !== $data['reminder_subject']) {
                $object->setReminderSubject($data['reminder_subject']);
                unset($data['reminder_subject']);
            } elseif (\array_key_exists('reminder_subject', $data) && null === $data['reminder_subject']) {
                $object->setReminderSubject(null);
            }
            if (\array_key_exists('reminder_body', $data) && null !== $data['reminder_body']) {
                $object->setReminderBody($data['reminder_body']);
                unset($data['reminder_body']);
            } elseif (\array_key_exists('reminder_body', $data) && null === $data['reminder_body']) {
                $object->setReminderBody(null);
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
            $data['request_subject'] = $object->getRequestSubject();
            $data['request_body'] = $object->getRequestBody();
            $data['reminder_subject'] = $object->getReminderSubject();
            $data['reminder_body'] = $object->getReminderBody();
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerCustomText::class => false];
        }
    }
}
