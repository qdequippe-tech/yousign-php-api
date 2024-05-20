<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignerAuditTrail;
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
    class SignerAuditTrailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignerAuditTrail::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerAuditTrail::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignerAuditTrail();
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
            if (\array_key_exists('signature_request', $data) && null !== $data['signature_request']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['signature_request'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setSignatureRequest($values);
                unset($data['signature_request']);
            } elseif (\array_key_exists('signature_request', $data) && null === $data['signature_request']) {
                $object->setSignatureRequest(null);
            }
            if (\array_key_exists('sender', $data) && null !== $data['sender']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['sender'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setSender($values_1);
                unset($data['sender']);
            } elseif (\array_key_exists('sender', $data) && null === $data['sender']) {
                $object->setSender(null);
            }
            if (\array_key_exists('signer', $data) && null !== $data['signer']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['signer'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setSigner($values_2);
                unset($data['signer']);
            } elseif (\array_key_exists('signer', $data) && null === $data['signer']) {
                $object->setSigner(null);
            }
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values_3 = [];
                foreach ($data['documents'] as $value_3) {
                    $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value_3 as $key_3 => $value_4) {
                        $values_4[$key_3] = $value_4;
                    }
                    $values_3[] = $values_4;
                }
                $object->setDocuments($values_3);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('organization', $data) && null !== $data['organization']) {
                $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['organization'] as $key_4 => $value_5) {
                    $values_5[$key_4] = $value_5;
                }
                $object->setOrganization($values_5);
                unset($data['organization']);
            } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
                $object->setOrganization(null);
            }
            if (\array_key_exists('authentication', $data) && null !== $data['authentication']) {
                $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['authentication'] as $key_5 => $value_6) {
                    $values_6[$key_5] = $value_6;
                }
                $object->setAuthentication($values_6);
                unset($data['authentication']);
            } elseif (\array_key_exists('authentication', $data) && null === $data['authentication']) {
                $object->setAuthentication(null);
            }
            if (\array_key_exists('electronic_signature_level', $data) && null !== $data['electronic_signature_level']) {
                $values_7 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['electronic_signature_level'] as $key_6 => $value_7) {
                    $values_7[$key_6] = $value_7;
                }
                $object->setElectronicSignatureLevel($values_7);
                unset($data['electronic_signature_level']);
            } elseif (\array_key_exists('electronic_signature_level', $data) && null === $data['electronic_signature_level']) {
                $object->setElectronicSignatureLevel(null);
            }
            foreach ($data as $key_7 => $value_8) {
                if (preg_match('/.*/', (string) $key_7)) {
                    $object[$key_7] = $value_8;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['version'] = $object->getVersion();
            $values = [];
            foreach ($object->getSignatureRequest() as $key => $value) {
                $values[$key] = $value;
            }
            $data['signature_request'] = $values;
            $values_1 = [];
            foreach ($object->getSender() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['sender'] = $values_1;
            $values_2 = [];
            foreach ($object->getSigner() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['signer'] = $values_2;
            $values_3 = [];
            foreach ($object->getDocuments() as $value_3) {
                $values_4 = [];
                foreach ($value_3 as $key_3 => $value_4) {
                    $values_4[$key_3] = $value_4;
                }
                $values_3[] = $values_4;
            }
            $data['documents'] = $values_3;
            $values_5 = [];
            foreach ($object->getOrganization() as $key_4 => $value_5) {
                $values_5[$key_4] = $value_5;
            }
            $data['organization'] = $values_5;
            $values_6 = [];
            foreach ($object->getAuthentication() as $key_5 => $value_6) {
                $values_6[$key_5] = $value_6;
            }
            $data['authentication'] = $values_6;
            if ($object->isInitialized('electronicSignatureLevel') && null !== $object->getElectronicSignatureLevel()) {
                $values_7 = [];
                foreach ($object->getElectronicSignatureLevel() as $key_6 => $value_7) {
                    $values_7[$key_6] = $value_7;
                }
                $data['electronic_signature_level'] = $values_7;
            }
            foreach ($object as $key_7 => $value_8) {
                if (preg_match('/.*/', (string) $key_7)) {
                    $data[$key_7] = $value_8;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerAuditTrail::class => false];
        }
    }
} else {
    class SignerAuditTrailNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignerAuditTrail::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignerAuditTrail::class === $data::class;
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
            $object = new SignerAuditTrail();
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
            if (\array_key_exists('signature_request', $data) && null !== $data['signature_request']) {
                $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['signature_request'] as $key => $value) {
                    $values[$key] = $value;
                }
                $object->setSignatureRequest($values);
                unset($data['signature_request']);
            } elseif (\array_key_exists('signature_request', $data) && null === $data['signature_request']) {
                $object->setSignatureRequest(null);
            }
            if (\array_key_exists('sender', $data) && null !== $data['sender']) {
                $values_1 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['sender'] as $key_1 => $value_1) {
                    $values_1[$key_1] = $value_1;
                }
                $object->setSender($values_1);
                unset($data['sender']);
            } elseif (\array_key_exists('sender', $data) && null === $data['sender']) {
                $object->setSender(null);
            }
            if (\array_key_exists('signer', $data) && null !== $data['signer']) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['signer'] as $key_2 => $value_2) {
                    $values_2[$key_2] = $value_2;
                }
                $object->setSigner($values_2);
                unset($data['signer']);
            } elseif (\array_key_exists('signer', $data) && null === $data['signer']) {
                $object->setSigner(null);
            }
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values_3 = [];
                foreach ($data['documents'] as $value_3) {
                    $values_4 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                    foreach ($value_3 as $key_3 => $value_4) {
                        $values_4[$key_3] = $value_4;
                    }
                    $values_3[] = $values_4;
                }
                $object->setDocuments($values_3);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('organization', $data) && null !== $data['organization']) {
                $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['organization'] as $key_4 => $value_5) {
                    $values_5[$key_4] = $value_5;
                }
                $object->setOrganization($values_5);
                unset($data['organization']);
            } elseif (\array_key_exists('organization', $data) && null === $data['organization']) {
                $object->setOrganization(null);
            }
            if (\array_key_exists('authentication', $data) && null !== $data['authentication']) {
                $values_6 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['authentication'] as $key_5 => $value_6) {
                    $values_6[$key_5] = $value_6;
                }
                $object->setAuthentication($values_6);
                unset($data['authentication']);
            } elseif (\array_key_exists('authentication', $data) && null === $data['authentication']) {
                $object->setAuthentication(null);
            }
            if (\array_key_exists('electronic_signature_level', $data) && null !== $data['electronic_signature_level']) {
                $values_7 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($data['electronic_signature_level'] as $key_6 => $value_7) {
                    $values_7[$key_6] = $value_7;
                }
                $object->setElectronicSignatureLevel($values_7);
                unset($data['electronic_signature_level']);
            } elseif (\array_key_exists('electronic_signature_level', $data) && null === $data['electronic_signature_level']) {
                $object->setElectronicSignatureLevel(null);
            }
            foreach ($data as $key_7 => $value_8) {
                if (preg_match('/.*/', (string) $key_7)) {
                    $object[$key_7] = $value_8;
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
            $values = [];
            foreach ($object->getSignatureRequest() as $key => $value) {
                $values[$key] = $value;
            }
            $data['signature_request'] = $values;
            $values_1 = [];
            foreach ($object->getSender() as $key_1 => $value_1) {
                $values_1[$key_1] = $value_1;
            }
            $data['sender'] = $values_1;
            $values_2 = [];
            foreach ($object->getSigner() as $key_2 => $value_2) {
                $values_2[$key_2] = $value_2;
            }
            $data['signer'] = $values_2;
            $values_3 = [];
            foreach ($object->getDocuments() as $value_3) {
                $values_4 = [];
                foreach ($value_3 as $key_3 => $value_4) {
                    $values_4[$key_3] = $value_4;
                }
                $values_3[] = $values_4;
            }
            $data['documents'] = $values_3;
            $values_5 = [];
            foreach ($object->getOrganization() as $key_4 => $value_5) {
                $values_5[$key_4] = $value_5;
            }
            $data['organization'] = $values_5;
            $values_6 = [];
            foreach ($object->getAuthentication() as $key_5 => $value_6) {
                $values_6[$key_5] = $value_6;
            }
            $data['authentication'] = $values_6;
            if ($object->isInitialized('electronicSignatureLevel') && null !== $object->getElectronicSignatureLevel()) {
                $values_7 = [];
                foreach ($object->getElectronicSignatureLevel() as $key_6 => $value_7) {
                    $values_7[$key_6] = $value_7;
                }
                $data['electronic_signature_level'] = $values_7;
            }
            foreach ($object as $key_7 => $value_8) {
                if (preg_match('/.*/', (string) $key_7)) {
                    $data[$key_7] = $value_8;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [SignerAuditTrail::class => false];
        }
    }
}
