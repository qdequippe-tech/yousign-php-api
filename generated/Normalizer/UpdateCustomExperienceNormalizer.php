<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateCustomExperienceRedirectUrls;
use Qdequippe\Yousign\Api\Model\UpdateCustomExperience;
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
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateCustomExperience();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('landing_page_disabled', $data) && null !== $data['landing_page_disabled']) {
                $object->setLandingPageDisabled($data['landing_page_disabled']);
                unset($data['landing_page_disabled']);
            } elseif (\array_key_exists('landing_page_disabled', $data) && null === $data['landing_page_disabled']) {
                $object->setLandingPageDisabled(null);
            }
            if (\array_key_exists('side_panel_disabled', $data) && null !== $data['side_panel_disabled']) {
                $object->setSidePanelDisabled($data['side_panel_disabled']);
                unset($data['side_panel_disabled']);
            } elseif (\array_key_exists('side_panel_disabled', $data) && null === $data['side_panel_disabled']) {
                $object->setSidePanelDisabled(null);
            }
            if (\array_key_exists('background_color', $data) && null !== $data['background_color']) {
                $object->setBackgroundColor($data['background_color']);
                unset($data['background_color']);
            } elseif (\array_key_exists('background_color', $data) && null === $data['background_color']) {
                $object->setBackgroundColor(null);
            }
            if (\array_key_exists('button_color', $data) && null !== $data['button_color']) {
                $object->setButtonColor($data['button_color']);
                unset($data['button_color']);
            } elseif (\array_key_exists('button_color', $data) && null === $data['button_color']) {
                $object->setButtonColor(null);
            }
            if (\array_key_exists('text_color', $data) && null !== $data['text_color']) {
                $object->setTextColor($data['text_color']);
                unset($data['text_color']);
            } elseif (\array_key_exists('text_color', $data) && null === $data['text_color']) {
                $object->setTextColor(null);
            }
            if (\array_key_exists('text_button_color', $data) && null !== $data['text_button_color']) {
                $object->setTextButtonColor($data['text_button_color']);
                unset($data['text_button_color']);
            } elseif (\array_key_exists('text_button_color', $data) && null === $data['text_button_color']) {
                $object->setTextButtonColor(null);
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
            }
            if (\array_key_exists('email_logo_disabled', $data) && null !== $data['email_logo_disabled']) {
                $object->setEmailLogoDisabled($data['email_logo_disabled']);
                unset($data['email_logo_disabled']);
            } elseif (\array_key_exists('email_logo_disabled', $data) && null === $data['email_logo_disabled']) {
                $object->setEmailLogoDisabled(null);
            }
            if (\array_key_exists('email_header_text_disabled', $data) && null !== $data['email_header_text_disabled']) {
                $object->setEmailHeaderTextDisabled($data['email_header_text_disabled']);
                unset($data['email_header_text_disabled']);
            } elseif (\array_key_exists('email_header_text_disabled', $data) && null === $data['email_header_text_disabled']) {
                $object->setEmailHeaderTextDisabled(null);
            }
            if (\array_key_exists('email_footer_signature_disabled', $data) && null !== $data['email_footer_signature_disabled']) {
                $object->setEmailFooterSignatureDisabled($data['email_footer_signature_disabled']);
                unset($data['email_footer_signature_disabled']);
            } elseif (\array_key_exists('email_footer_signature_disabled', $data) && null === $data['email_footer_signature_disabled']) {
                $object->setEmailFooterSignatureDisabled(null);
            }
            if (\array_key_exists('email_expiration_text_disabled', $data) && null !== $data['email_expiration_text_disabled']) {
                $object->setEmailExpirationTextDisabled($data['email_expiration_text_disabled']);
                unset($data['email_expiration_text_disabled']);
            } elseif (\array_key_exists('email_expiration_text_disabled', $data) && null === $data['email_expiration_text_disabled']) {
                $object->setEmailExpirationTextDisabled(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], CreateCustomExperienceRedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('landingPageDisabled') && null !== $object->getLandingPageDisabled()) {
                $data['landing_page_disabled'] = $object->getLandingPageDisabled();
            }
            if ($object->isInitialized('sidePanelDisabled') && null !== $object->getSidePanelDisabled()) {
                $data['side_panel_disabled'] = $object->getSidePanelDisabled();
            }
            if ($object->isInitialized('backgroundColor') && null !== $object->getBackgroundColor()) {
                $data['background_color'] = $object->getBackgroundColor();
            }
            if ($object->isInitialized('buttonColor') && null !== $object->getButtonColor()) {
                $data['button_color'] = $object->getButtonColor();
            }
            if ($object->isInitialized('textColor') && null !== $object->getTextColor()) {
                $data['text_color'] = $object->getTextColor();
            }
            if ($object->isInitialized('textButtonColor') && null !== $object->getTextButtonColor()) {
                $data['text_button_color'] = $object->getTextButtonColor();
            }
            if ($object->isInitialized('disabledNotifications') && null !== $object->getDisabledNotifications()) {
                $values = [];
                foreach ($object->getDisabledNotifications() as $value) {
                    $values[] = $value;
                }
                $data['disabled_notifications'] = $values;
            }
            if ($object->isInitialized('emailLogoDisabled') && null !== $object->getEmailLogoDisabled()) {
                $data['email_logo_disabled'] = $object->getEmailLogoDisabled();
            }
            if ($object->isInitialized('emailHeaderTextDisabled') && null !== $object->getEmailHeaderTextDisabled()) {
                $data['email_header_text_disabled'] = $object->getEmailHeaderTextDisabled();
            }
            if ($object->isInitialized('emailFooterSignatureDisabled') && null !== $object->getEmailFooterSignatureDisabled()) {
                $data['email_footer_signature_disabled'] = $object->getEmailFooterSignatureDisabled();
            }
            if ($object->isInitialized('emailExpirationTextDisabled') && null !== $object->getEmailExpirationTextDisabled()) {
                $data['email_expiration_text_disabled'] = $object->getEmailExpirationTextDisabled();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UpdateCustomExperience::class => false];
        }
    }
} else {
    class UpdateCustomExperienceNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UpdateCustomExperience::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateCustomExperience::class === $data::class;
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
            $object = new UpdateCustomExperience();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('landing_page_disabled', $data) && null !== $data['landing_page_disabled']) {
                $object->setLandingPageDisabled($data['landing_page_disabled']);
                unset($data['landing_page_disabled']);
            } elseif (\array_key_exists('landing_page_disabled', $data) && null === $data['landing_page_disabled']) {
                $object->setLandingPageDisabled(null);
            }
            if (\array_key_exists('side_panel_disabled', $data) && null !== $data['side_panel_disabled']) {
                $object->setSidePanelDisabled($data['side_panel_disabled']);
                unset($data['side_panel_disabled']);
            } elseif (\array_key_exists('side_panel_disabled', $data) && null === $data['side_panel_disabled']) {
                $object->setSidePanelDisabled(null);
            }
            if (\array_key_exists('background_color', $data) && null !== $data['background_color']) {
                $object->setBackgroundColor($data['background_color']);
                unset($data['background_color']);
            } elseif (\array_key_exists('background_color', $data) && null === $data['background_color']) {
                $object->setBackgroundColor(null);
            }
            if (\array_key_exists('button_color', $data) && null !== $data['button_color']) {
                $object->setButtonColor($data['button_color']);
                unset($data['button_color']);
            } elseif (\array_key_exists('button_color', $data) && null === $data['button_color']) {
                $object->setButtonColor(null);
            }
            if (\array_key_exists('text_color', $data) && null !== $data['text_color']) {
                $object->setTextColor($data['text_color']);
                unset($data['text_color']);
            } elseif (\array_key_exists('text_color', $data) && null === $data['text_color']) {
                $object->setTextColor(null);
            }
            if (\array_key_exists('text_button_color', $data) && null !== $data['text_button_color']) {
                $object->setTextButtonColor($data['text_button_color']);
                unset($data['text_button_color']);
            } elseif (\array_key_exists('text_button_color', $data) && null === $data['text_button_color']) {
                $object->setTextButtonColor(null);
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
            }
            if (\array_key_exists('email_logo_disabled', $data) && null !== $data['email_logo_disabled']) {
                $object->setEmailLogoDisabled($data['email_logo_disabled']);
                unset($data['email_logo_disabled']);
            } elseif (\array_key_exists('email_logo_disabled', $data) && null === $data['email_logo_disabled']) {
                $object->setEmailLogoDisabled(null);
            }
            if (\array_key_exists('email_header_text_disabled', $data) && null !== $data['email_header_text_disabled']) {
                $object->setEmailHeaderTextDisabled($data['email_header_text_disabled']);
                unset($data['email_header_text_disabled']);
            } elseif (\array_key_exists('email_header_text_disabled', $data) && null === $data['email_header_text_disabled']) {
                $object->setEmailHeaderTextDisabled(null);
            }
            if (\array_key_exists('email_footer_signature_disabled', $data) && null !== $data['email_footer_signature_disabled']) {
                $object->setEmailFooterSignatureDisabled($data['email_footer_signature_disabled']);
                unset($data['email_footer_signature_disabled']);
            } elseif (\array_key_exists('email_footer_signature_disabled', $data) && null === $data['email_footer_signature_disabled']) {
                $object->setEmailFooterSignatureDisabled(null);
            }
            if (\array_key_exists('email_expiration_text_disabled', $data) && null !== $data['email_expiration_text_disabled']) {
                $object->setEmailExpirationTextDisabled($data['email_expiration_text_disabled']);
                unset($data['email_expiration_text_disabled']);
            } elseif (\array_key_exists('email_expiration_text_disabled', $data) && null === $data['email_expiration_text_disabled']) {
                $object->setEmailExpirationTextDisabled(null);
            }
            if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
                $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], CreateCustomExperienceRedirectUrls::class, 'json', $context));
                unset($data['redirect_urls']);
            } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
                $object->setRedirectUrls(null);
            }
            foreach ($data as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_1;
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
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('landingPageDisabled') && null !== $object->getLandingPageDisabled()) {
                $data['landing_page_disabled'] = $object->getLandingPageDisabled();
            }
            if ($object->isInitialized('sidePanelDisabled') && null !== $object->getSidePanelDisabled()) {
                $data['side_panel_disabled'] = $object->getSidePanelDisabled();
            }
            if ($object->isInitialized('backgroundColor') && null !== $object->getBackgroundColor()) {
                $data['background_color'] = $object->getBackgroundColor();
            }
            if ($object->isInitialized('buttonColor') && null !== $object->getButtonColor()) {
                $data['button_color'] = $object->getButtonColor();
            }
            if ($object->isInitialized('textColor') && null !== $object->getTextColor()) {
                $data['text_color'] = $object->getTextColor();
            }
            if ($object->isInitialized('textButtonColor') && null !== $object->getTextButtonColor()) {
                $data['text_button_color'] = $object->getTextButtonColor();
            }
            if ($object->isInitialized('disabledNotifications') && null !== $object->getDisabledNotifications()) {
                $values = [];
                foreach ($object->getDisabledNotifications() as $value) {
                    $values[] = $value;
                }
                $data['disabled_notifications'] = $values;
            }
            if ($object->isInitialized('emailLogoDisabled') && null !== $object->getEmailLogoDisabled()) {
                $data['email_logo_disabled'] = $object->getEmailLogoDisabled();
            }
            if ($object->isInitialized('emailHeaderTextDisabled') && null !== $object->getEmailHeaderTextDisabled()) {
                $data['email_header_text_disabled'] = $object->getEmailHeaderTextDisabled();
            }
            if ($object->isInitialized('emailFooterSignatureDisabled') && null !== $object->getEmailFooterSignatureDisabled()) {
                $data['email_footer_signature_disabled'] = $object->getEmailFooterSignatureDisabled();
            }
            if ($object->isInitialized('emailExpirationTextDisabled') && null !== $object->getEmailExpirationTextDisabled()) {
                $data['email_expiration_text_disabled'] = $object->getEmailExpirationTextDisabled();
            }
            if ($object->isInitialized('redirectUrls') && null !== $object->getRedirectUrls()) {
                $data['redirect_urls'] = $this->normalizer->normalize($object->getRedirectUrls(), 'json', $context);
            }
            foreach ($object as $key => $value_1) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_1;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [UpdateCustomExperience::class => false];
        }
    }
}
