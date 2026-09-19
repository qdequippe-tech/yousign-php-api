<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceEmbeddedPreparationNavigationBar;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateCustomExperienceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateCustomExperience::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateCustomExperience::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateCustomExperience();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('landing_page_disabled', $data) && \is_int($data['landing_page_disabled'])) {
            $data['landing_page_disabled'] = (bool) $data['landing_page_disabled'];
        }
        if (\array_key_exists('side_panel_disabled', $data) && \is_int($data['side_panel_disabled'])) {
            $data['side_panel_disabled'] = (bool) $data['side_panel_disabled'];
        }
        if (\array_key_exists('email_logo_disabled', $data) && \is_int($data['email_logo_disabled'])) {
            $data['email_logo_disabled'] = (bool) $data['email_logo_disabled'];
        }
        if (\array_key_exists('email_header_text_disabled', $data) && \is_int($data['email_header_text_disabled'])) {
            $data['email_header_text_disabled'] = (bool) $data['email_header_text_disabled'];
        }
        if (\array_key_exists('email_footer_signature_disabled', $data) && \is_int($data['email_footer_signature_disabled'])) {
            $data['email_footer_signature_disabled'] = (bool) $data['email_footer_signature_disabled'];
        }
        if (\array_key_exists('email_expiration_text_disabled', $data) && \is_int($data['email_expiration_text_disabled'])) {
            $data['email_expiration_text_disabled'] = (bool) $data['email_expiration_text_disabled'];
        }
        if (\array_key_exists('recipients_activity_disabled', $data) && \is_int($data['recipients_activity_disabled'])) {
            $data['recipients_activity_disabled'] = (bool) $data['recipients_activity_disabled'];
        }
        if (\array_key_exists('download_documents_disabled', $data) && \is_int($data['download_documents_disabled'])) {
            $data['download_documents_disabled'] = (bool) $data['download_documents_disabled'];
        }
        if (\array_key_exists('document_navigation_disabled', $data) && \is_int($data['document_navigation_disabled'])) {
            $data['document_navigation_disabled'] = (bool) $data['document_navigation_disabled'];
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('landing_page_disabled', $data) && null !== $data['landing_page_disabled']) {
            $object->setLandingPageDisabled($data['landing_page_disabled']);
            unset($data['landing_page_disabled']);
        } elseif (\array_key_exists('landing_page_disabled', $data) && null === $data['landing_page_disabled']) {
            $object->setLandingPageDisabled(null);
            unset($data['landing_page_disabled']);
        }
        if (\array_key_exists('side_panel_disabled', $data) && null !== $data['side_panel_disabled']) {
            $object->setSidePanelDisabled($data['side_panel_disabled']);
            unset($data['side_panel_disabled']);
        } elseif (\array_key_exists('side_panel_disabled', $data) && null === $data['side_panel_disabled']) {
            $object->setSidePanelDisabled(null);
            unset($data['side_panel_disabled']);
        }
        if (\array_key_exists('background_color', $data) && null !== $data['background_color']) {
            $object->setBackgroundColor($data['background_color']);
            unset($data['background_color']);
        } elseif (\array_key_exists('background_color', $data) && null === $data['background_color']) {
            $object->setBackgroundColor(null);
            unset($data['background_color']);
        }
        if (\array_key_exists('button_color', $data) && null !== $data['button_color']) {
            $object->setButtonColor($data['button_color']);
            unset($data['button_color']);
        } elseif (\array_key_exists('button_color', $data) && null === $data['button_color']) {
            $object->setButtonColor(null);
            unset($data['button_color']);
        }
        if (\array_key_exists('text_color', $data) && null !== $data['text_color']) {
            $object->setTextColor($data['text_color']);
            unset($data['text_color']);
        } elseif (\array_key_exists('text_color', $data) && null === $data['text_color']) {
            $object->setTextColor(null);
            unset($data['text_color']);
        }
        if (\array_key_exists('text_button_color', $data) && null !== $data['text_button_color']) {
            $object->setTextButtonColor($data['text_button_color']);
            unset($data['text_button_color']);
        } elseif (\array_key_exists('text_button_color', $data) && null === $data['text_button_color']) {
            $object->setTextButtonColor(null);
            unset($data['text_button_color']);
        }
        if (\array_key_exists('disabled_notifications', $data) && null !== $data['disabled_notifications']) {
            $values = [];
            foreach ($data['disabled_notifications'] as $value) {
                $values[] = $value;
            }
            $object->setDisabledNotifications($values);
            unset($data['disabled_notifications']);
        } elseif (\array_key_exists('disabled_notifications', $data) && null === $data['disabled_notifications']) {
            $object->setDisabledNotifications(null);
            unset($data['disabled_notifications']);
        }
        if (\array_key_exists('email_logo_disabled', $data) && null !== $data['email_logo_disabled']) {
            $object->setEmailLogoDisabled($data['email_logo_disabled']);
            unset($data['email_logo_disabled']);
        } elseif (\array_key_exists('email_logo_disabled', $data) && null === $data['email_logo_disabled']) {
            $object->setEmailLogoDisabled(null);
            unset($data['email_logo_disabled']);
        }
        if (\array_key_exists('email_header_text_disabled', $data) && null !== $data['email_header_text_disabled']) {
            $object->setEmailHeaderTextDisabled($data['email_header_text_disabled']);
            unset($data['email_header_text_disabled']);
        } elseif (\array_key_exists('email_header_text_disabled', $data) && null === $data['email_header_text_disabled']) {
            $object->setEmailHeaderTextDisabled(null);
            unset($data['email_header_text_disabled']);
        }
        if (\array_key_exists('email_footer_signature_disabled', $data) && null !== $data['email_footer_signature_disabled']) {
            $object->setEmailFooterSignatureDisabled($data['email_footer_signature_disabled']);
            unset($data['email_footer_signature_disabled']);
        } elseif (\array_key_exists('email_footer_signature_disabled', $data) && null === $data['email_footer_signature_disabled']) {
            $object->setEmailFooterSignatureDisabled(null);
            unset($data['email_footer_signature_disabled']);
        }
        if (\array_key_exists('email_expiration_text_disabled', $data) && null !== $data['email_expiration_text_disabled']) {
            $object->setEmailExpirationTextDisabled($data['email_expiration_text_disabled']);
            unset($data['email_expiration_text_disabled']);
        } elseif (\array_key_exists('email_expiration_text_disabled', $data) && null === $data['email_expiration_text_disabled']) {
            $object->setEmailExpirationTextDisabled(null);
            unset($data['email_expiration_text_disabled']);
        }
        if (\array_key_exists('recipients_activity_disabled', $data) && null !== $data['recipients_activity_disabled']) {
            $object->setRecipientsActivityDisabled($data['recipients_activity_disabled']);
            unset($data['recipients_activity_disabled']);
        } elseif (\array_key_exists('recipients_activity_disabled', $data) && null === $data['recipients_activity_disabled']) {
            $object->setRecipientsActivityDisabled(null);
            unset($data['recipients_activity_disabled']);
        }
        if (\array_key_exists('download_documents_disabled', $data) && null !== $data['download_documents_disabled']) {
            $object->setDownloadDocumentsDisabled($data['download_documents_disabled']);
            unset($data['download_documents_disabled']);
        } elseif (\array_key_exists('download_documents_disabled', $data) && null === $data['download_documents_disabled']) {
            $object->setDownloadDocumentsDisabled(null);
            unset($data['download_documents_disabled']);
        }
        if (\array_key_exists('document_navigation_disabled', $data) && null !== $data['document_navigation_disabled']) {
            $object->setDocumentNavigationDisabled($data['document_navigation_disabled']);
            unset($data['document_navigation_disabled']);
        } elseif (\array_key_exists('document_navigation_disabled', $data) && null === $data['document_navigation_disabled']) {
            $object->setDocumentNavigationDisabled(null);
            unset($data['document_navigation_disabled']);
        }
        if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
            $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], UpdateCustomExperienceRedirectUrls::class, 'json', $context));
            unset($data['redirect_urls']);
        } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
            $object->setRedirectUrls(null);
            unset($data['redirect_urls']);
        }
        if (\array_key_exists('embedded_preparation_navigation_bar', $data) && null !== $data['embedded_preparation_navigation_bar']) {
            $object->setEmbeddedPreparationNavigationBar($this->denormalizer->denormalize($data['embedded_preparation_navigation_bar'], UpdateCustomExperienceEmbeddedPreparationNavigationBar::class, 'json', $context));
            unset($data['embedded_preparation_navigation_bar']);
        } elseif (\array_key_exists('embedded_preparation_navigation_bar', $data) && null === $data['embedded_preparation_navigation_bar']) {
            $object->setEmbeddedPreparationNavigationBar(null);
            unset($data['embedded_preparation_navigation_bar']);
        }
        if (\array_key_exists('logo_layout', $data) && null !== $data['logo_layout']) {
            $object->setLogoLayout($data['logo_layout']);
            unset($data['logo_layout']);
        } elseif (\array_key_exists('logo_layout', $data) && null === $data['logo_layout']) {
            $object->setLogoLayout(null);
            unset($data['logo_layout']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        foreach ($data as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_1;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('name') && null !== $data->getName()) {
            $dataArray['name'] = $data->getName();
        }
        if ($data->isInitialized('landingPageDisabled') && null !== $data->getLandingPageDisabled()) {
            $dataArray['landing_page_disabled'] = $data->getLandingPageDisabled();
        }
        if ($data->isInitialized('sidePanelDisabled') && null !== $data->getSidePanelDisabled()) {
            $dataArray['side_panel_disabled'] = $data->getSidePanelDisabled();
        }
        if ($data->isInitialized('backgroundColor') && null !== $data->getBackgroundColor()) {
            $dataArray['background_color'] = $data->getBackgroundColor();
        }
        if ($data->isInitialized('buttonColor') && null !== $data->getButtonColor()) {
            $dataArray['button_color'] = $data->getButtonColor();
        }
        if ($data->isInitialized('textColor') && null !== $data->getTextColor()) {
            $dataArray['text_color'] = $data->getTextColor();
        }
        if ($data->isInitialized('textButtonColor') && null !== $data->getTextButtonColor()) {
            $dataArray['text_button_color'] = $data->getTextButtonColor();
        }
        if ($data->isInitialized('disabledNotifications') && null !== $data->getDisabledNotifications()) {
            $values = [];
            foreach ($data->getDisabledNotifications() as $value) {
                $values[] = $value;
            }
            $dataArray['disabled_notifications'] = $values;
        }
        if ($data->isInitialized('emailLogoDisabled') && null !== $data->getEmailLogoDisabled()) {
            $dataArray['email_logo_disabled'] = $data->getEmailLogoDisabled();
        }
        if ($data->isInitialized('emailHeaderTextDisabled') && null !== $data->getEmailHeaderTextDisabled()) {
            $dataArray['email_header_text_disabled'] = $data->getEmailHeaderTextDisabled();
        }
        if ($data->isInitialized('emailFooterSignatureDisabled') && null !== $data->getEmailFooterSignatureDisabled()) {
            $dataArray['email_footer_signature_disabled'] = $data->getEmailFooterSignatureDisabled();
        }
        if ($data->isInitialized('emailExpirationTextDisabled') && null !== $data->getEmailExpirationTextDisabled()) {
            $dataArray['email_expiration_text_disabled'] = $data->getEmailExpirationTextDisabled();
        }
        if ($data->isInitialized('recipientsActivityDisabled') && null !== $data->getRecipientsActivityDisabled()) {
            $dataArray['recipients_activity_disabled'] = $data->getRecipientsActivityDisabled();
        }
        if ($data->isInitialized('downloadDocumentsDisabled') && null !== $data->getDownloadDocumentsDisabled()) {
            $dataArray['download_documents_disabled'] = $data->getDownloadDocumentsDisabled();
        }
        if ($data->isInitialized('documentNavigationDisabled') && null !== $data->getDocumentNavigationDisabled()) {
            $dataArray['document_navigation_disabled'] = $data->getDocumentNavigationDisabled();
        }
        if ($data->isInitialized('redirectUrls') && null !== $data->getRedirectUrls()) {
            $dataArray['redirect_urls'] = null === $data->getRedirectUrls() ? null : new JsonObject($this->normalizer->normalize($data->getRedirectUrls(), 'json', $context));
        }
        if ($data->isInitialized('embeddedPreparationNavigationBar') && null !== $data->getEmbeddedPreparationNavigationBar()) {
            $dataArray['embedded_preparation_navigation_bar'] = null === $data->getEmbeddedPreparationNavigationBar() ? null : new JsonObject($this->normalizer->normalize($data->getEmbeddedPreparationNavigationBar(), 'json', $context));
        }
        if ($data->isInitialized('logoLayout') && null !== $data->getLogoLayout()) {
            $dataArray['logo_layout'] = $data->getLogoLayout();
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_1) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_1;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateCustomExperience::class => false];
    }
}
