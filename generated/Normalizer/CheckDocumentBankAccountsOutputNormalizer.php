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

class CheckDocumentBankAccountsOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentBankAccountsOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\CheckDocumentBankAccountsOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\CheckDocumentBankAccountsOutput();
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
        if (\array_key_exists('firstName', $data) && null !== $data['firstName']) {
            $object->setFirstName($data['firstName']);
        } elseif (\array_key_exists('firstName', $data) && null === $data['firstName']) {
            $object->setFirstName(null);
        }
        if (\array_key_exists('birthName', $data) && null !== $data['birthName']) {
            $object->setBirthName($data['birthName']);
        } elseif (\array_key_exists('birthName', $data) && null === $data['birthName']) {
            $object->setBirthName(null);
        }
        if (\array_key_exists('lastName', $data) && null !== $data['lastName']) {
            $object->setLastName($data['lastName']);
        } elseif (\array_key_exists('lastName', $data) && null === $data['lastName']) {
            $object->setLastName(null);
        }
        if (\array_key_exists('iban', $data) && null !== $data['iban']) {
            $object->setIban($data['iban']);
        } elseif (\array_key_exists('iban', $data) && null === $data['iban']) {
            $object->setIban(null);
        }
        if (\array_key_exists('companyName', $data) && null !== $data['companyName']) {
            $object->setCompanyName($data['companyName']);
        } elseif (\array_key_exists('companyName', $data) && null === $data['companyName']) {
            $object->setCompanyName(null);
        }
        if (\array_key_exists('documentType', $data) && null !== $data['documentType']) {
            $object->setDocumentType($data['documentType']);
        } elseif (\array_key_exists('documentType', $data) && null === $data['documentType']) {
            $object->setDocumentType(null);
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
        if (\array_key_exists('extractedIban', $data) && null !== $data['extractedIban']) {
            $object->setExtractedIban($data['extractedIban']);
        } elseif (\array_key_exists('extractedIban', $data) && null === $data['extractedIban']) {
            $object->setExtractedIban(null);
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
        if (\array_key_exists('lastNameValid', $data) && null !== $data['lastNameValid']) {
            $object->setLastNameValid($data['lastNameValid']);
        } elseif (\array_key_exists('lastNameValid', $data) && null === $data['lastNameValid']) {
            $object->setLastNameValid(null);
        }
        if (\array_key_exists('companyNameValid', $data) && null !== $data['companyNameValid']) {
            $object->setCompanyNameValid($data['companyNameValid']);
        } elseif (\array_key_exists('companyNameValid', $data) && null === $data['companyNameValid']) {
            $object->setCompanyNameValid(null);
        }
        if (\array_key_exists('ibanValid', $data) && null !== $data['ibanValid']) {
            $object->setIbanValid($data['ibanValid']);
        } elseif (\array_key_exists('ibanValid', $data) && null === $data['ibanValid']) {
            $object->setIbanValid(null);
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
        if (null !== $object->getFirstName()) {
            $data['firstName'] = $object->getFirstName();
        }
        if (null !== $object->getBirthName()) {
            $data['birthName'] = $object->getBirthName();
        }
        if (null !== $object->getLastName()) {
            $data['lastName'] = $object->getLastName();
        }
        if (null !== $object->getIban()) {
            $data['iban'] = $object->getIban();
        }
        if (null !== $object->getCompanyName()) {
            $data['companyName'] = $object->getCompanyName();
        }
        if (null !== $object->getDocumentType()) {
            $data['documentType'] = $object->getDocumentType();
        }
        if (null !== $object->getWorkspace()) {
            $data['workspace'] = $object->getWorkspace();
        }
        if (null !== $object->getCreator()) {
            $data['creator'] = $object->getCreator();
        }
        if (null !== $object->getExtractedIban()) {
            $data['extractedIban'] = $object->getExtractedIban();
        }
        if (null !== $object->getFirstNameValid()) {
            $data['firstNameValid'] = $object->getFirstNameValid();
        }
        if (null !== $object->getBirthNameValid()) {
            $data['birthNameValid'] = $object->getBirthNameValid();
        }
        if (null !== $object->getLastNameValid()) {
            $data['lastNameValid'] = $object->getLastNameValid();
        }
        if (null !== $object->getCompanyNameValid()) {
            $data['companyNameValid'] = $object->getCompanyNameValid();
        }
        if (null !== $object->getIbanValid()) {
            $data['ibanValid'] = $object->getIbanValid();
        }

        return $data;
    }
}
