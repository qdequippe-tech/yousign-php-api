<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\IdDocumentVerificationExtractedFromDocument;
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
    class IdDocumentVerificationExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return IdDocumentVerificationExtractedFromDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && IdDocumentVerificationExtractedFromDocument::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new IdDocumentVerificationExtractedFromDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('birth_name', $data) && null !== $data['birth_name']) {
                $object->setBirthName($data['birth_name']);
                unset($data['birth_name']);
            } elseif (\array_key_exists('birth_name', $data) && null === $data['birth_name']) {
                $object->setBirthName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('birth_date', $data) && null !== $data['birth_date']) {
                $object->setBirthDate(\DateTime::createFromFormat('Y-m-d', $data['birth_date'])->setTime(0, 0, 0));
                unset($data['birth_date']);
            } elseif (\array_key_exists('birth_date', $data) && null === $data['birth_date']) {
                $object->setBirthDate(null);
            }
            if (\array_key_exists('birth_place', $data) && null !== $data['birth_place']) {
                $object->setBirthPlace($data['birth_place']);
                unset($data['birth_place']);
            } elseif (\array_key_exists('birth_place', $data) && null === $data['birth_place']) {
                $object->setBirthPlace(null);
            }
            if (\array_key_exists('gender', $data) && null !== $data['gender']) {
                $object->setGender($data['gender']);
                unset($data['gender']);
            } elseif (\array_key_exists('gender', $data) && null === $data['gender']) {
                $object->setGender(null);
            }
            if (\array_key_exists('postal_address', $data) && null !== $data['postal_address']) {
                $object->setPostalAddress($data['postal_address']);
                unset($data['postal_address']);
            } elseif (\array_key_exists('postal_address', $data) && null === $data['postal_address']) {
                $object->setPostalAddress(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('document_issuing_country', $data) && null !== $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry($data['document_issuing_country']);
                unset($data['document_issuing_country']);
            } elseif (\array_key_exists('document_issuing_country', $data) && null === $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry(null);
            }
            if (\array_key_exists('document_issuing_date', $data) && null !== $data['document_issuing_date']) {
                $object->setDocumentIssuingDate(\DateTime::createFromFormat('Y-m-d', $data['document_issuing_date'])->setTime(0, 0, 0));
                unset($data['document_issuing_date']);
            } elseif (\array_key_exists('document_issuing_date', $data) && null === $data['document_issuing_date']) {
                $object->setDocumentIssuingDate(null);
            }
            if (\array_key_exists('document_expiration_date', $data) && null !== $data['document_expiration_date']) {
                $object->setDocumentExpirationDate(\DateTime::createFromFormat('Y-m-d', $data['document_expiration_date'])->setTime(0, 0, 0));
                unset($data['document_expiration_date']);
            } elseif (\array_key_exists('document_expiration_date', $data) && null === $data['document_expiration_date']) {
                $object->setDocumentExpirationDate(null);
            }
            if (\array_key_exists('document_number', $data) && null !== $data['document_number']) {
                $object->setDocumentNumber($data['document_number']);
                unset($data['document_number']);
            } elseif (\array_key_exists('document_number', $data) && null === $data['document_number']) {
                $object->setDocumentNumber(null);
            }
            if (\array_key_exists('mrz', $data) && null !== $data['mrz']) {
                $object->setMrz($this->denormalizer->denormalize($data['mrz'], IdDocumentVerificationExtractedFromDocumentMrz::class, 'json', $context));
                unset($data['mrz']);
            } elseif (\array_key_exists('mrz', $data) && null === $data['mrz']) {
                $object->setMrz(null);
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
            $data['first_name'] = $object->getFirstName();
            $data['birth_name'] = $object->getBirthName();
            $data['last_name'] = $object->getLastName();
            $data['birth_date'] = $object->getBirthDate()->format('Y-m-d');
            $data['birth_place'] = $object->getBirthPlace();
            $data['gender'] = $object->getGender();
            $data['postal_address'] = $object->getPostalAddress();
            $data['document_type'] = $object->getDocumentType();
            $data['document_issuing_country'] = $object->getDocumentIssuingCountry();
            $data['document_issuing_date'] = $object->getDocumentIssuingDate()->format('Y-m-d');
            $data['document_expiration_date'] = $object->getDocumentExpirationDate()->format('Y-m-d');
            $data['document_number'] = $object->getDocumentNumber();
            $data['mrz'] = $this->normalizer->normalize($object->getMrz(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [IdDocumentVerificationExtractedFromDocument::class => false];
        }
    }
} else {
    class IdDocumentVerificationExtractedFromDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return IdDocumentVerificationExtractedFromDocument::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && IdDocumentVerificationExtractedFromDocument::class === $data::class;
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
            $object = new IdDocumentVerificationExtractedFromDocument();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('first_name', $data) && null !== $data['first_name']) {
                $object->setFirstName($data['first_name']);
                unset($data['first_name']);
            } elseif (\array_key_exists('first_name', $data) && null === $data['first_name']) {
                $object->setFirstName(null);
            }
            if (\array_key_exists('birth_name', $data) && null !== $data['birth_name']) {
                $object->setBirthName($data['birth_name']);
                unset($data['birth_name']);
            } elseif (\array_key_exists('birth_name', $data) && null === $data['birth_name']) {
                $object->setBirthName(null);
            }
            if (\array_key_exists('last_name', $data) && null !== $data['last_name']) {
                $object->setLastName($data['last_name']);
                unset($data['last_name']);
            } elseif (\array_key_exists('last_name', $data) && null === $data['last_name']) {
                $object->setLastName(null);
            }
            if (\array_key_exists('birth_date', $data) && null !== $data['birth_date']) {
                $object->setBirthDate(\DateTime::createFromFormat('Y-m-d', $data['birth_date'])->setTime(0, 0, 0));
                unset($data['birth_date']);
            } elseif (\array_key_exists('birth_date', $data) && null === $data['birth_date']) {
                $object->setBirthDate(null);
            }
            if (\array_key_exists('birth_place', $data) && null !== $data['birth_place']) {
                $object->setBirthPlace($data['birth_place']);
                unset($data['birth_place']);
            } elseif (\array_key_exists('birth_place', $data) && null === $data['birth_place']) {
                $object->setBirthPlace(null);
            }
            if (\array_key_exists('gender', $data) && null !== $data['gender']) {
                $object->setGender($data['gender']);
                unset($data['gender']);
            } elseif (\array_key_exists('gender', $data) && null === $data['gender']) {
                $object->setGender(null);
            }
            if (\array_key_exists('postal_address', $data) && null !== $data['postal_address']) {
                $object->setPostalAddress($data['postal_address']);
                unset($data['postal_address']);
            } elseif (\array_key_exists('postal_address', $data) && null === $data['postal_address']) {
                $object->setPostalAddress(null);
            }
            if (\array_key_exists('document_type', $data) && null !== $data['document_type']) {
                $object->setDocumentType($data['document_type']);
                unset($data['document_type']);
            } elseif (\array_key_exists('document_type', $data) && null === $data['document_type']) {
                $object->setDocumentType(null);
            }
            if (\array_key_exists('document_issuing_country', $data) && null !== $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry($data['document_issuing_country']);
                unset($data['document_issuing_country']);
            } elseif (\array_key_exists('document_issuing_country', $data) && null === $data['document_issuing_country']) {
                $object->setDocumentIssuingCountry(null);
            }
            if (\array_key_exists('document_issuing_date', $data) && null !== $data['document_issuing_date']) {
                $object->setDocumentIssuingDate(\DateTime::createFromFormat('Y-m-d', $data['document_issuing_date'])->setTime(0, 0, 0));
                unset($data['document_issuing_date']);
            } elseif (\array_key_exists('document_issuing_date', $data) && null === $data['document_issuing_date']) {
                $object->setDocumentIssuingDate(null);
            }
            if (\array_key_exists('document_expiration_date', $data) && null !== $data['document_expiration_date']) {
                $object->setDocumentExpirationDate(\DateTime::createFromFormat('Y-m-d', $data['document_expiration_date'])->setTime(0, 0, 0));
                unset($data['document_expiration_date']);
            } elseif (\array_key_exists('document_expiration_date', $data) && null === $data['document_expiration_date']) {
                $object->setDocumentExpirationDate(null);
            }
            if (\array_key_exists('document_number', $data) && null !== $data['document_number']) {
                $object->setDocumentNumber($data['document_number']);
                unset($data['document_number']);
            } elseif (\array_key_exists('document_number', $data) && null === $data['document_number']) {
                $object->setDocumentNumber(null);
            }
            if (\array_key_exists('mrz', $data) && null !== $data['mrz']) {
                $object->setMrz($this->denormalizer->denormalize($data['mrz'], IdDocumentVerificationExtractedFromDocumentMrz::class, 'json', $context));
                unset($data['mrz']);
            } elseif (\array_key_exists('mrz', $data) && null === $data['mrz']) {
                $object->setMrz(null);
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
            $data['first_name'] = $object->getFirstName();
            $data['birth_name'] = $object->getBirthName();
            $data['last_name'] = $object->getLastName();
            $data['birth_date'] = $object->getBirthDate()->format('Y-m-d');
            $data['birth_place'] = $object->getBirthPlace();
            $data['gender'] = $object->getGender();
            $data['postal_address'] = $object->getPostalAddress();
            $data['document_type'] = $object->getDocumentType();
            $data['document_issuing_country'] = $object->getDocumentIssuingCountry();
            $data['document_issuing_date'] = $object->getDocumentIssuingDate()->format('Y-m-d');
            $data['document_expiration_date'] = $object->getDocumentExpirationDate()->format('Y-m-d');
            $data['document_number'] = $object->getDocumentNumber();
            $data['mrz'] = $this->normalizer->normalize($object->getMrz(), 'json', $context);
            foreach ($object as $key => $value) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [IdDocumentVerificationExtractedFromDocument::class => false];
        }
    }
}
