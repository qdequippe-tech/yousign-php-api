<?php

declare(strict_types=1);

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class CheckDocumentIdentitiesOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentIdentitiesOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentIdentitiesOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\CheckDocumentIdentitiesOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
        }
        if (\array_key_exists('createdAt', $data) && null !== $data['createdAt']) {
            $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['createdAt']));
        } elseif (\array_key_exists('createdAt', $data) && null === $data['createdAt']) {
            $object->setCreatedAt(null);
        }
        if (\array_key_exists('updatedAt', $data) && null !== $data['updatedAt']) {
            $object->setUpdatedAt(\DateTime::createFromFormat('Y-m-d\\TH:i:sP', $data['updatedAt']));
        } elseif (\array_key_exists('updatedAt', $data) && null === $data['updatedAt']) {
            $object->setUpdatedAt(null);
        }
        if (\array_key_exists('firstNames', $data) && null !== $data['firstNames']) {
            $values = [];
            foreach ($data['firstNames'] as $value) {
                $values[] = $value;
            }
            $object->setFirstNames($values);
        } elseif (\array_key_exists('firstNames', $data) && null === $data['firstNames']) {
            $object->setFirstNames(null);
        }
        if (\array_key_exists('birthName', $data) && null !== $data['birthName']) {
            $object->setBirthName($data['birthName']);
        } elseif (\array_key_exists('birthName', $data) && null === $data['birthName']) {
            $object->setBirthName(null);
        }
        if (\array_key_exists('birthDate', $data) && null !== $data['birthDate']) {
            $object->setBirthDate(\DateTime::createFromFormat('Y-m-d', $data['birthDate'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('birthDate', $data) && null === $data['birthDate']) {
            $object->setBirthDate(null);
        }
        if (\array_key_exists('workspace', $data) && null !== $data['workspace']) {
            $object->setWorkspace($data['workspace']);
        } elseif (\array_key_exists('workspace', $data) && null === $data['workspace']) {
            $object->setWorkspace(null);
        }
        if (\array_key_exists('creator', $data) && null !== $data['creator']) {
            $object->setCreator($data['creator']);
        } elseif (\array_key_exists('creator', $data) && null === $data['creator']) {
            $object->setCreator(null);
        }
        if (\array_key_exists('documentType', $data) && null !== $data['documentType']) {
            $object->setDocumentType($data['documentType']);
        } elseif (\array_key_exists('documentType', $data) && null === $data['documentType']) {
            $object->setDocumentType(null);
        }
        if (\array_key_exists('extractedFirstNames', $data) && null !== $data['extractedFirstNames']) {
            $values_1 = [];
            foreach ($data['extractedFirstNames'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setExtractedFirstNames($values_1);
        } elseif (\array_key_exists('extractedFirstNames', $data) && null === $data['extractedFirstNames']) {
            $object->setExtractedFirstNames(null);
        }
        if (\array_key_exists('extractedBirthName', $data) && null !== $data['extractedBirthName']) {
            $object->setExtractedBirthName($data['extractedBirthName']);
        } elseif (\array_key_exists('extractedBirthName', $data) && null === $data['extractedBirthName']) {
            $object->setExtractedBirthName(null);
        }
        if (\array_key_exists('extractedBirthDate', $data) && null !== $data['extractedBirthDate']) {
            $object->setExtractedBirthDate(\DateTime::createFromFormat('Y-m-d', $data['extractedBirthDate'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('extractedBirthDate', $data) && null === $data['extractedBirthDate']) {
            $object->setExtractedBirthDate(null);
        }
        if (\array_key_exists('extractedGender', $data) && null !== $data['extractedGender']) {
            $object->setExtractedGender($data['extractedGender']);
        } elseif (\array_key_exists('extractedGender', $data) && null === $data['extractedGender']) {
            $object->setExtractedGender(null);
        }
        if (\array_key_exists('extractedIssuanceDate', $data) && null !== $data['extractedIssuanceDate']) {
            $object->setExtractedIssuanceDate(\DateTime::createFromFormat('Y-m-d', $data['extractedIssuanceDate'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('extractedIssuanceDate', $data) && null === $data['extractedIssuanceDate']) {
            $object->setExtractedIssuanceDate(null);
        }
        if (\array_key_exists('extractedExpirationDate', $data) && null !== $data['extractedExpirationDate']) {
            $object->setExtractedExpirationDate(\DateTime::createFromFormat('Y-m-d', $data['extractedExpirationDate'])->setTime(0, 0, 0));
        } elseif (\array_key_exists('extractedExpirationDate', $data) && null === $data['extractedExpirationDate']) {
            $object->setExtractedExpirationDate(null);
        }
        if (\array_key_exists('extractedMrz', $data) && null !== $data['extractedMrz']) {
            $values_2 = [];
            foreach ($data['extractedMrz'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setExtractedMrz($values_2);
        } elseif (\array_key_exists('extractedMrz', $data) && null === $data['extractedMrz']) {
            $object->setExtractedMrz(null);
        }
        if (\array_key_exists('firstNameValid', $data) && null !== $data['firstNameValid']) {
            $object->setFirstNameValid($data['firstNameValid']);
        } elseif (\array_key_exists('firstNameValid', $data) && null === $data['firstNameValid']) {
            $object->setFirstNameValid(null);
        }
        if (\array_key_exists('birthNameValid', $data) && null !== $data['birthNameValid']) {
            $object->setBirthNameValid($data['birthNameValid']);
        } elseif (\array_key_exists('birthNameValid', $data) && null === $data['birthNameValid']) {
            $object->setBirthNameValid(null);
        }
        if (\array_key_exists('mrzValid', $data) && null !== $data['mrzValid']) {
            $object->setMrzValid($data['mrzValid']);
        } elseif (\array_key_exists('mrzValid', $data) && null === $data['mrzValid']) {
            $object->setMrzValid(null);
        }
        if (\array_key_exists('expired', $data) && null !== $data['expired']) {
            $object->setExpired($data['expired']);
        } elseif (\array_key_exists('expired', $data) && null === $data['expired']) {
            $object->setExpired(null);
        }
        if (\array_key_exists('valid', $data) && null !== $data['valid']) {
            $object->setValid($data['valid']);
        } elseif (\array_key_exists('valid', $data) && null === $data['valid']) {
            $object->setValid(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getCreatedAt()) {
            $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUpdatedAt()) {
            $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getFirstNames()) {
            $values = [];
            foreach ($object->getFirstNames() as $value) {
                $values[] = $value;
            }
            $data['firstNames'] = $values;
        }
        if (null !== $object->getBirthName()) {
            $data['birthName'] = $object->getBirthName();
        }
        if (null !== $object->getBirthDate()) {
            $data['birthDate'] = $object->getBirthDate()->format('Y-m-d');
        }
        if (null !== $object->getWorkspace()) {
            $data['workspace'] = $object->getWorkspace();
        }
        if (null !== $object->getCreator()) {
            $data['creator'] = $object->getCreator();
        }
        if (null !== $object->getDocumentType()) {
            $data['documentType'] = $object->getDocumentType();
        }
        if (null !== $object->getExtractedFirstNames()) {
            $values_1 = [];
            foreach ($object->getExtractedFirstNames() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['extractedFirstNames'] = $values_1;
        }
        if (null !== $object->getExtractedBirthName()) {
            $data['extractedBirthName'] = $object->getExtractedBirthName();
        }
        if (null !== $object->getExtractedBirthDate()) {
            $data['extractedBirthDate'] = $object->getExtractedBirthDate()->format('Y-m-d');
        }
        if (null !== $object->getExtractedGender()) {
            $data['extractedGender'] = $object->getExtractedGender();
        }
        if (null !== $object->getExtractedIssuanceDate()) {
            $data['extractedIssuanceDate'] = $object->getExtractedIssuanceDate()->format('Y-m-d');
        }
        if (null !== $object->getExtractedExpirationDate()) {
            $data['extractedExpirationDate'] = $object->getExtractedExpirationDate()->format('Y-m-d');
        }
        if (null !== $object->getExtractedMrz()) {
            $values_2 = [];
            foreach ($object->getExtractedMrz() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['extractedMrz'] = $values_2;
        }
        if (null !== $object->getFirstNameValid()) {
            $data['firstNameValid'] = $object->getFirstNameValid();
        }
        if (null !== $object->getBirthNameValid()) {
            $data['birthNameValid'] = $object->getBirthNameValid();
        }
        if (null !== $object->getMrzValid()) {
            $data['mrzValid'] = $object->getMrzValid();
        }
        if (null !== $object->getExpired()) {
            $data['expired'] = $object->getExpired();
        }
        if (null !== $object->getValid()) {
            $data['valid'] = $object->getValid();
        }

        return $data;
    }
}
