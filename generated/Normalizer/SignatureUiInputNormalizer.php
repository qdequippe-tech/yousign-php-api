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

class SignatureUiInputNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiInput' === $type;
    }

    public function supportsNormalization($data, $format = null)
    {
        return \is_object($data) && 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiInput' === \get_class($data);
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \Qdequippe\Yousign\Api\Model\SignatureUiInput();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
        }
        if (\array_key_exists('description', $data) && null !== $data['description']) {
            $object->setDescription($data['description']);
        } elseif (\array_key_exists('description', $data) && null === $data['description']) {
            $object->setDescription(null);
        }
        if (\array_key_exists('enableHeaderBar', $data) && null !== $data['enableHeaderBar']) {
            $object->setEnableHeaderBar($data['enableHeaderBar']);
        } elseif (\array_key_exists('enableHeaderBar', $data) && null === $data['enableHeaderBar']) {
            $object->setEnableHeaderBar(null);
        }
        if (\array_key_exists('enableHeaderBarSignAs', $data) && null !== $data['enableHeaderBarSignAs']) {
            $object->setEnableHeaderBarSignAs($data['enableHeaderBarSignAs']);
        } elseif (\array_key_exists('enableHeaderBarSignAs', $data) && null === $data['enableHeaderBarSignAs']) {
            $object->setEnableHeaderBarSignAs(null);
        }
        if (\array_key_exists('enableSidebar', $data) && null !== $data['enableSidebar']) {
            $object->setEnableSidebar($data['enableSidebar']);
        } elseif (\array_key_exists('enableSidebar', $data) && null === $data['enableSidebar']) {
            $object->setEnableSidebar(null);
        }
        if (\array_key_exists('enableMemberList', $data) && null !== $data['enableMemberList']) {
            $object->setEnableMemberList($data['enableMemberList']);
        } elseif (\array_key_exists('enableMemberList', $data) && null === $data['enableMemberList']) {
            $object->setEnableMemberList(null);
        }
        if (\array_key_exists('enableDocumentList', $data) && null !== $data['enableDocumentList']) {
            $object->setEnableDocumentList($data['enableDocumentList']);
        } elseif (\array_key_exists('enableDocumentList', $data) && null === $data['enableDocumentList']) {
            $object->setEnableDocumentList(null);
        }
        if (\array_key_exists('enableDocumentDownload', $data) && null !== $data['enableDocumentDownload']) {
            $object->setEnableDocumentDownload($data['enableDocumentDownload']);
        } elseif (\array_key_exists('enableDocumentDownload', $data) && null === $data['enableDocumentDownload']) {
            $object->setEnableDocumentDownload(null);
        }
        if (\array_key_exists('enableActivities', $data) && null !== $data['enableActivities']) {
            $object->setEnableActivities($data['enableActivities']);
        } elseif (\array_key_exists('enableActivities', $data) && null === $data['enableActivities']) {
            $object->setEnableActivities(null);
        }
        if (\array_key_exists('authenticationPopup', $data) && null !== $data['authenticationPopup']) {
            $object->setAuthenticationPopup($data['authenticationPopup']);
        } elseif (\array_key_exists('authenticationPopup', $data) && null === $data['authenticationPopup']) {
            $object->setAuthenticationPopup(null);
        }
        if (\array_key_exists('defaultZoom', $data) && null !== $data['defaultZoom']) {
            $object->setDefaultZoom($data['defaultZoom']);
        } elseif (\array_key_exists('defaultZoom', $data) && null === $data['defaultZoom']) {
            $object->setDefaultZoom(null);
        }
        if (\array_key_exists('logo', $data) && null !== $data['logo']) {
            $object->setLogo($data['logo']);
        } elseif (\array_key_exists('logo', $data) && null === $data['logo']) {
            $object->setLogo(null);
        }
        if (\array_key_exists('signImageTypesAvailable', $data) && null !== $data['signImageTypesAvailable']) {
            $values = [];
            foreach ($data['signImageTypesAvailable'] as $value) {
                $values[] = $value;
            }
            $object->setSignImageTypesAvailable($values);
        } elseif (\array_key_exists('signImageTypesAvailable', $data) && null === $data['signImageTypesAvailable']) {
            $object->setSignImageTypesAvailable(null);
        }
        if (\array_key_exists('defaultLanguage', $data) && null !== $data['defaultLanguage']) {
            $object->setDefaultLanguage($data['defaultLanguage']);
        } elseif (\array_key_exists('defaultLanguage', $data) && null === $data['defaultLanguage']) {
            $object->setDefaultLanguage(null);
        }
        if (\array_key_exists('languages', $data) && null !== $data['languages']) {
            $values_1 = [];
            foreach ($data['languages'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setLanguages($values_1);
        } elseif (\array_key_exists('languages', $data) && null === $data['languages']) {
            $object->setLanguages(null);
        }
        if (\array_key_exists('labels', $data) && null !== $data['labels']) {
            $values_2 = [];
            foreach ($data['labels'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiLabelInputIncluded', 'json', $context);
            }
            $object->setLabels($values_2);
        } elseif (\array_key_exists('labels', $data) && null === $data['labels']) {
            $object->setLabels(null);
        }
        if (\array_key_exists('fonts', $data) && null !== $data['fonts']) {
            $values_3 = [];
            foreach ($data['fonts'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setFonts($values_3);
        } elseif (\array_key_exists('fonts', $data) && null === $data['fonts']) {
            $object->setFonts(null);
        }
        if (\array_key_exists('style', $data) && null !== $data['style']) {
            $object->setStyle($data['style']);
        } elseif (\array_key_exists('style', $data) && null === $data['style']) {
            $object->setStyle(null);
        }
        if (\array_key_exists('redirectCancel', $data) && null !== $data['redirectCancel']) {
            $object->setRedirectCancel($this->denormalizer->denormalize($data['redirectCancel'], 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiInputRedirectCancel', 'json', $context));
        } elseif (\array_key_exists('redirectCancel', $data) && null === $data['redirectCancel']) {
            $object->setRedirectCancel(null);
        }
        if (\array_key_exists('redirectError', $data) && null !== $data['redirectError']) {
            $object->setRedirectError($this->denormalizer->denormalize($data['redirectError'], 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiInputRedirectError', 'json', $context));
        } elseif (\array_key_exists('redirectError', $data) && null === $data['redirectError']) {
            $object->setRedirectError(null);
        }
        if (\array_key_exists('redirectSuccess', $data) && null !== $data['redirectSuccess']) {
            $object->setRedirectSuccess($this->denormalizer->denormalize($data['redirectSuccess'], 'Qdequippe\\Yousign\\Api\\Model\\SignatureUiInputRedirectSuccess', 'json', $context));
        } elseif (\array_key_exists('redirectSuccess', $data) && null === $data['redirectSuccess']) {
            $object->setRedirectSuccess(null);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = [];
        $data['name'] = $object->getName();
        if (null !== $object->getDescription()) {
            $data['description'] = $object->getDescription();
        }
        if (null !== $object->getEnableHeaderBar()) {
            $data['enableHeaderBar'] = $object->getEnableHeaderBar();
        }
        if (null !== $object->getEnableHeaderBarSignAs()) {
            $data['enableHeaderBarSignAs'] = $object->getEnableHeaderBarSignAs();
        }
        if (null !== $object->getEnableSidebar()) {
            $data['enableSidebar'] = $object->getEnableSidebar();
        }
        if (null !== $object->getEnableMemberList()) {
            $data['enableMemberList'] = $object->getEnableMemberList();
        }
        if (null !== $object->getEnableDocumentList()) {
            $data['enableDocumentList'] = $object->getEnableDocumentList();
        }
        if (null !== $object->getEnableDocumentDownload()) {
            $data['enableDocumentDownload'] = $object->getEnableDocumentDownload();
        }
        if (null !== $object->getEnableActivities()) {
            $data['enableActivities'] = $object->getEnableActivities();
        }
        if (null !== $object->getAuthenticationPopup()) {
            $data['authenticationPopup'] = $object->getAuthenticationPopup();
        }
        if (null !== $object->getDefaultZoom()) {
            $data['defaultZoom'] = $object->getDefaultZoom();
        }
        if (null !== $object->getLogo()) {
            $data['logo'] = $object->getLogo();
        }
        if (null !== $object->getSignImageTypesAvailable()) {
            $values = [];
            foreach ($object->getSignImageTypesAvailable() as $value) {
                $values[] = $value;
            }
            $data['signImageTypesAvailable'] = $values;
        }
        if (null !== $object->getDefaultLanguage()) {
            $data['defaultLanguage'] = $object->getDefaultLanguage();
        }
        if (null !== $object->getLanguages()) {
            $values_1 = [];
            foreach ($object->getLanguages() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['languages'] = $values_1;
        }
        if (null !== $object->getLabels()) {
            $values_2 = [];
            foreach ($object->getLabels() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['labels'] = $values_2;
        }
        if (null !== $object->getFonts()) {
            $values_3 = [];
            foreach ($object->getFonts() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['fonts'] = $values_3;
        }
        if (null !== $object->getStyle()) {
            $data['style'] = $object->getStyle();
        }
        if (null !== $object->getRedirectCancel()) {
            $data['redirectCancel'] = $this->normalizer->normalize($object->getRedirectCancel(), 'json', $context);
        }
        if (null !== $object->getRedirectError()) {
            $data['redirectError'] = $this->normalizer->normalize($object->getRedirectError(), 'json', $context);
        }
        if (null !== $object->getRedirectSuccess()) {
            $data['redirectSuccess'] = $this->normalizer->normalize($object->getRedirectSuccess(), 'json', $context);
        }

        return $data;
    }
}
