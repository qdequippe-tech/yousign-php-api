<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\Approver;
use Qdequippe\Yousign\Api\Model\ApproverInfo;
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
    class ApproverNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return Approver::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Approver::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new Approver();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], ApproverInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('approval_link', $data) && null !== $data['approval_link']) {
                $object->setApprovalLink($data['approval_link']);
                unset($data['approval_link']);
            } elseif (\array_key_exists('approval_link', $data) && null === $data['approval_link']) {
                $object->setApprovalLink(null);
            }
            if (\array_key_exists('approval_link_expiration_date', $data) && null !== $data['approval_link_expiration_date']) {
                $object->setApprovalLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['approval_link_expiration_date']));
                unset($data['approval_link_expiration_date']);
            } elseif (\array_key_exists('approval_link_expiration_date', $data) && null === $data['approval_link_expiration_date']) {
                $object->setApprovalLinkExpirationDate(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            if ($object->isInitialized('approvalLink') && null !== $object->getApprovalLink()) {
                $data['approval_link'] = $object->getApprovalLink();
            }
            if ($object->isInitialized('approvalLinkExpirationDate') && null !== $object->getApprovalLinkExpirationDate()) {
                $data['approval_link_expiration_date'] = $object->getApprovalLinkExpirationDate()->format('Y-m-d\TH:i:sP');
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
            return [Approver::class => false];
        }
    }
} else {
    class ApproverNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return Approver::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Approver::class === $data::class;
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
            $object = new Approver();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
            }
            if (\array_key_exists('info', $data) && null !== $data['info']) {
                $object->setInfo($this->denormalizer->denormalize($data['info'], ApproverInfo::class, 'json', $context));
                unset($data['info']);
            } elseif (\array_key_exists('info', $data) && null === $data['info']) {
                $object->setInfo(null);
            }
            if (\array_key_exists('approval_link', $data) && null !== $data['approval_link']) {
                $object->setApprovalLink($data['approval_link']);
                unset($data['approval_link']);
            } elseif (\array_key_exists('approval_link', $data) && null === $data['approval_link']) {
                $object->setApprovalLink(null);
            }
            if (\array_key_exists('approval_link_expiration_date', $data) && null !== $data['approval_link_expiration_date']) {
                $object->setApprovalLinkExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['approval_link_expiration_date']));
                unset($data['approval_link_expiration_date']);
            } elseif (\array_key_exists('approval_link_expiration_date', $data) && null === $data['approval_link_expiration_date']) {
                $object->setApprovalLinkExpirationDate(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['info'] = $this->normalizer->normalize($object->getInfo(), 'json', $context);
            if ($object->isInitialized('approvalLink') && null !== $object->getApprovalLink()) {
                $data['approval_link'] = $object->getApprovalLink();
            }
            if ($object->isInitialized('approvalLinkExpirationDate') && null !== $object->getApprovalLinkExpirationDate()) {
                $data['approval_link_expiration_date'] = $object->getApprovalLinkExpirationDate()->format('Y-m-d\TH:i:sP');
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
            return [Approver::class => false];
        }
    }
}
