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

class OrganizationOutputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\OrganizationOutput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\OrganizationOutput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\OrganizationOutput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
        }
        if (\array_key_exists('url', $data) && null !== $data['url']) {
            $object->setUrl($data['url']);
        } elseif (\array_key_exists('url', $data) && null === $data['url']) {
            $object->setUrl(null);
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
        if (\array_key_exists('fSso', $data) && null !== $data['fSso']) {
            $object->setFSso($data['fSso']);
        } elseif (\array_key_exists('fSso', $data) && null === $data['fSso']) {
            $object->setFSso(null);
        }
        if (\array_key_exists('maxUsers', $data) && null !== $data['maxUsers']) {
            $object->setMaxUsers($data['maxUsers']);
        } elseif (\array_key_exists('maxUsers', $data) && null === $data['maxUsers']) {
            $object->setMaxUsers(null);
        }
        if (\array_key_exists('procedureRelatedFilesEnable', $data) && null !== $data['procedureRelatedFilesEnable']) {
            $object->setProcedureRelatedFilesEnable($data['procedureRelatedFilesEnable']);
        } elseif (\array_key_exists('procedureRelatedFilesEnable', $data) && null === $data['procedureRelatedFilesEnable']) {
            $object->setProcedureRelatedFilesEnable(null);
        }
        if (\array_key_exists('subscriptions', $data) && null !== $data['subscriptions']) {
            $values = [];
            foreach ($data['subscriptions'] as $value) {
                $values[] = $value;
            }
            $object->setSubscriptions($values);
        } elseif (\array_key_exists('subscriptions', $data) && null === $data['subscriptions']) {
            $object->setSubscriptions(null);
        }
        if (\array_key_exists('autoCollection', $data) && null !== $data['autoCollection']) {
            $object->setAutoCollection($data['autoCollection']);
        } elseif (\array_key_exists('autoCollection', $data) && null === $data['autoCollection']) {
            $object->setAutoCollection(null);
        }
        if (\array_key_exists('vatNumber', $data) && null !== $data['vatNumber']) {
            $object->setVatNumber($data['vatNumber']);
        } elseif (\array_key_exists('vatNumber', $data) && null === $data['vatNumber']) {
            $object->setVatNumber(null);
        }
        if (\array_key_exists('billingAddress', $data) && null !== $data['billingAddress']) {
            $object->setBillingAddress($this->denormalizer->denormalize($data['billingAddress'], 'Qdequippe\\Yousign\\Api\\Model\\OrganizationBillingAddress', 'json', $context));
        } elseif (\array_key_exists('billingAddress', $data) && null === $data['billingAddress']) {
            $object->setBillingAddress(null);
        }
        if (\array_key_exists('inAppSupport', $data) && null !== $data['inAppSupport']) {
            $object->setInAppSupport($data['inAppSupport']);
        } elseif (\array_key_exists('inAppSupport', $data) && null === $data['inAppSupport']) {
            $object->setInAppSupport(null);
        }
        if (\array_key_exists('inAppUpdates', $data) && null !== $data['inAppUpdates']) {
            $object->setInAppUpdates($data['inAppUpdates']);
        } elseif (\array_key_exists('inAppUpdates', $data) && null === $data['inAppUpdates']) {
            $object->setInAppUpdates(null);
        }
        if (\array_key_exists('fileTemplate', $data) && null !== $data['fileTemplate']) {
            $object->setFileTemplate($data['fileTemplate']);
        } elseif (\array_key_exists('fileTemplate', $data) && null === $data['fileTemplate']) {
            $object->setFileTemplate(null);
        }
        if (\array_key_exists('fArchive', $data) && null !== $data['fArchive']) {
            $object->setFArchive($data['fArchive']);
        } elseif (\array_key_exists('fArchive', $data) && null === $data['fArchive']) {
            $object->setFArchive(null);
        }
        if (\array_key_exists('fUserPermissions', $data) && null !== $data['fUserPermissions']) {
            $object->setFUserPermissions($data['fUserPermissions']);
        } elseif (\array_key_exists('fUserPermissions', $data) && null === $data['fUserPermissions']) {
            $object->setFUserPermissions(null);
        }
        if (\array_key_exists('fProcedureTemplate', $data) && null !== $data['fProcedureTemplate']) {
            $object->setFProcedureTemplate($data['fProcedureTemplate']);
        } elseif (\array_key_exists('fProcedureTemplate', $data) && null === $data['fProcedureTemplate']) {
            $object->setFProcedureTemplate(null);
        }
        if (\array_key_exists('fProcedureReminderAuto', $data) && null !== $data['fProcedureReminderAuto']) {
            $object->setFProcedureReminderAuto($data['fProcedureReminderAuto']);
        } elseif (\array_key_exists('fProcedureReminderAuto', $data) && null === $data['fProcedureReminderAuto']) {
            $object->setFProcedureReminderAuto(null);
        }
        if (\array_key_exists('fApi', $data) && null !== $data['fApi']) {
            $object->setFApi($data['fApi']);
        } elseif (\array_key_exists('fApi', $data) && null === $data['fApi']) {
            $object->setFApi(null);
        }
        if (\array_key_exists('fCheckdocument', $data) && null !== $data['fCheckdocument']) {
            $object->setFCheckdocument($data['fCheckdocument']);
        } elseif (\array_key_exists('fCheckdocument', $data) && null === $data['fCheckdocument']) {
            $object->setFCheckdocument(null);
        }
        if (\array_key_exists('fProcedureCreate', $data) && null !== $data['fProcedureCreate']) {
            $object->setFProcedureCreate($data['fProcedureCreate']);
        } elseif (\array_key_exists('fProcedureCreate', $data) && null === $data['fProcedureCreate']) {
            $object->setFProcedureCreate(null);
        }
        if (\array_key_exists('fSignatureUi', $data) && null !== $data['fSignatureUi']) {
            $object->setFSignatureUi($data['fSignatureUi']);
        } elseif (\array_key_exists('fSignatureUi', $data) && null === $data['fSignatureUi']) {
            $object->setFSignatureUi(null);
        }
        if (\array_key_exists('fServerStamp', $data) && null !== $data['fServerStamp']) {
            $object->setFServerStamp($data['fServerStamp']);
        } elseif (\array_key_exists('fServerStamp', $data) && null === $data['fServerStamp']) {
            $object->setFServerStamp(null);
        }
        if (\array_key_exists('fOperationLevelNone', $data) && null !== $data['fOperationLevelNone']) {
            $object->setFOperationLevelNone($data['fOperationLevelNone']);
        } elseif (\array_key_exists('fOperationLevelNone', $data) && null === $data['fOperationLevelNone']) {
            $object->setFOperationLevelNone(null);
        }
        if (\array_key_exists('fConsentProcess', $data) && null !== $data['fConsentProcess']) {
            $object->setFConsentProcess($data['fConsentProcess']);
        } elseif (\array_key_exists('fConsentProcess', $data) && null === $data['fConsentProcess']) {
            $object->setFConsentProcess(null);
        }
        if (\array_key_exists('fOperationLevelAdvanced', $data) && null !== $data['fOperationLevelAdvanced']) {
            $object->setFOperationLevelAdvanced($data['fOperationLevelAdvanced']);
        } elseif (\array_key_exists('fOperationLevelAdvanced', $data) && null === $data['fOperationLevelAdvanced']) {
            $object->setFOperationLevelAdvanced(null);
        }
        if (\array_key_exists('fOperationCustomModeEmail', $data) && null !== $data['fOperationCustomModeEmail']) {
            $object->setFOperationCustomModeEmail($data['fOperationCustomModeEmail']);
        } elseif (\array_key_exists('fOperationCustomModeEmail', $data) && null === $data['fOperationCustomModeEmail']) {
            $object->setFOperationCustomModeEmail(null);
        }
        if (\array_key_exists('fDynamicFields', $data) && null !== $data['fDynamicFields']) {
            $object->setFDynamicFields($data['fDynamicFields']);
        } elseif (\array_key_exists('fDynamicFields', $data) && null === $data['fDynamicFields']) {
            $object->setFDynamicFields(null);
        }
        if (\array_key_exists('samlIdentityProvider', $data) && null !== $data['samlIdentityProvider']) {
            $object->setSamlIdentityProvider($data['samlIdentityProvider']);
        } elseif (\array_key_exists('samlIdentityProvider', $data) && null === $data['samlIdentityProvider']) {
            $object->setSamlIdentityProvider(null);
        }
        if (\array_key_exists('passwordPolicyPattern', $data) && null !== $data['passwordPolicyPattern']) {
            $object->setPasswordPolicyPattern($data['passwordPolicyPattern']);
        } elseif (\array_key_exists('passwordPolicyPattern', $data) && null === $data['passwordPolicyPattern']) {
            $object->setPasswordPolicyPattern(null);
        }
        if (\array_key_exists('passwordPolicyDescription', $data) && null !== $data['passwordPolicyDescription']) {
            $object->setPasswordPolicyDescription($data['passwordPolicyDescription']);
        } elseif (\array_key_exists('passwordPolicyDescription', $data) && null === $data['passwordPolicyDescription']) {
            $object->setPasswordPolicyDescription(null);
        }
        if (\array_key_exists('userActivation', $data) && null !== $data['userActivation']) {
            $object->setUserActivation($data['userActivation']);
        } elseif (\array_key_exists('userActivation', $data) && null === $data['userActivation']) {
            $object->setUserActivation(null);
        }
        if (\array_key_exists('fProcedureTemplatePermissions', $data) && null !== $data['fProcedureTemplatePermissions']) {
            $object->setFProcedureTemplatePermissions($data['fProcedureTemplatePermissions']);
        } elseif (\array_key_exists('fProcedureTemplatePermissions', $data) && null === $data['fProcedureTemplatePermissions']) {
            $object->setFProcedureTemplatePermissions(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        if (null !== $object->getId()) {
            $data['id'] = $object->getId();
        }
        if (null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if (null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        if (null !== $object->getCreatedAt()) {
            $data['createdAt'] = $object->getCreatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getUpdatedAt()) {
            $data['updatedAt'] = $object->getUpdatedAt()->format('Y-m-d\\TH:i:sP');
        }
        if (null !== $object->getFSso()) {
            $data['fSso'] = $object->getFSso();
        }
        if (null !== $object->getMaxUsers()) {
            $data['maxUsers'] = $object->getMaxUsers();
        }
        if (null !== $object->getProcedureRelatedFilesEnable()) {
            $data['procedureRelatedFilesEnable'] = $object->getProcedureRelatedFilesEnable();
        }
        if (null !== $object->getSubscriptions()) {
            $values = [];
            foreach ($object->getSubscriptions() as $value) {
                $values[] = $value;
            }
            $data['subscriptions'] = $values;
        }
        if (null !== $object->getAutoCollection()) {
            $data['autoCollection'] = $object->getAutoCollection();
        }
        if (null !== $object->getVatNumber()) {
            $data['vatNumber'] = $object->getVatNumber();
        }
        if (null !== $object->getBillingAddress()) {
            $data['billingAddress'] = $this->normalizer->normalize($object->getBillingAddress(), 'json', $context);
        }
        if (null !== $object->getInAppSupport()) {
            $data['inAppSupport'] = $object->getInAppSupport();
        }
        if (null !== $object->getInAppUpdates()) {
            $data['inAppUpdates'] = $object->getInAppUpdates();
        }
        if (null !== $object->getFileTemplate()) {
            $data['fileTemplate'] = $object->getFileTemplate();
        }
        if (null !== $object->getFArchive()) {
            $data['fArchive'] = $object->getFArchive();
        }
        if (null !== $object->getFUserPermissions()) {
            $data['fUserPermissions'] = $object->getFUserPermissions();
        }
        if (null !== $object->getFProcedureTemplate()) {
            $data['fProcedureTemplate'] = $object->getFProcedureTemplate();
        }
        if (null !== $object->getFProcedureReminderAuto()) {
            $data['fProcedureReminderAuto'] = $object->getFProcedureReminderAuto();
        }
        if (null !== $object->getFApi()) {
            $data['fApi'] = $object->getFApi();
        }
        if (null !== $object->getFCheckdocument()) {
            $data['fCheckdocument'] = $object->getFCheckdocument();
        }
        if (null !== $object->getFProcedureCreate()) {
            $data['fProcedureCreate'] = $object->getFProcedureCreate();
        }
        if (null !== $object->getFSignatureUi()) {
            $data['fSignatureUi'] = $object->getFSignatureUi();
        }
        if (null !== $object->getFServerStamp()) {
            $data['fServerStamp'] = $object->getFServerStamp();
        }
        if (null !== $object->getFOperationLevelNone()) {
            $data['fOperationLevelNone'] = $object->getFOperationLevelNone();
        }
        if (null !== $object->getFConsentProcess()) {
            $data['fConsentProcess'] = $object->getFConsentProcess();
        }
        if (null !== $object->getFOperationLevelAdvanced()) {
            $data['fOperationLevelAdvanced'] = $object->getFOperationLevelAdvanced();
        }
        if (null !== $object->getFOperationCustomModeEmail()) {
            $data['fOperationCustomModeEmail'] = $object->getFOperationCustomModeEmail();
        }
        if (null !== $object->getFDynamicFields()) {
            $data['fDynamicFields'] = $object->getFDynamicFields();
        }
        if (null !== $object->getSamlIdentityProvider()) {
            $data['samlIdentityProvider'] = $object->getSamlIdentityProvider();
        }
        if (null !== $object->getPasswordPolicyPattern()) {
            $data['passwordPolicyPattern'] = $object->getPasswordPolicyPattern();
        }
        if (null !== $object->getPasswordPolicyDescription()) {
            $data['passwordPolicyDescription'] = $object->getPasswordPolicyDescription();
        }
        if (null !== $object->getUserActivation()) {
            $data['userActivation'] = $object->getUserActivation();
        }
        if (null !== $object->getFProcedureTemplatePermissions()) {
            $data['fProcedureTemplatePermissions'] = $object->getFProcedureTemplatePermissions();
        }

        return $data;
    }
}
