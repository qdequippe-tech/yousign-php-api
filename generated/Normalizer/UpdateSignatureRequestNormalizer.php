<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestReminderSettings;
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
    class UpdateSignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return UpdateSignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateSignatureRequest::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new UpdateSignatureRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
                $object->setDeliveryMode($data['delivery_mode']);
                unset($data['delivery_mode']);
            } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
                $object->setDeliveryMode(null);
            }
            if (\array_key_exists('ordered_signers', $data) && null !== $data['ordered_signers']) {
                $object->setOrderedSigners($data['ordered_signers']);
                unset($data['ordered_signers']);
            } elseif (\array_key_exists('ordered_signers', $data) && null === $data['ordered_signers']) {
                $object->setOrderedSigners(null);
            }
            if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], UpdateSignatureRequestReminderSettings::class, 'json', $context));
                unset($data['reminder_settings']);
            } elseif (\array_key_exists('reminder_settings', $data) && null === $data['reminder_settings']) {
                $object->setReminderSettings(null);
            }
            if (\array_key_exists('timezone', $data) && null !== $data['timezone']) {
                $object->setTimezone($data['timezone']);
                unset($data['timezone']);
            } elseif (\array_key_exists('timezone', $data) && null === $data['timezone']) {
                $object->setTimezone(null);
            }
            if (\array_key_exists('email_custom_note', $data) && null !== $data['email_custom_note']) {
                $object->setEmailCustomNote($data['email_custom_note']);
                unset($data['email_custom_note']);
            } elseif (\array_key_exists('email_custom_note', $data) && null === $data['email_custom_note']) {
                $object->setEmailCustomNote(null);
            }
            if (\array_key_exists('expiration_date', $data) && null !== $data['expiration_date']) {
                $object->setExpirationDate(\DateTime::createFromFormat('Y-m-d', $data['expiration_date'])->setTime(0, 0, 0));
                unset($data['expiration_date']);
            } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
                $object->setExpirationDate(null);
            }
            if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
                $object->setExternalId($data['external_id']);
                unset($data['external_id']);
            } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
                $object->setExternalId(null);
            }
            if (\array_key_exists('branding_id', $data) && null !== $data['branding_id']) {
                $object->setBrandingId($data['branding_id']);
                unset($data['branding_id']);
            } elseif (\array_key_exists('branding_id', $data) && null === $data['branding_id']) {
                $object->setBrandingId(null);
            }
            if (\array_key_exists('custom_experience_id', $data) && null !== $data['custom_experience_id']) {
                $object->setCustomExperienceId($data['custom_experience_id']);
                unset($data['custom_experience_id']);
            } elseif (\array_key_exists('custom_experience_id', $data) && null === $data['custom_experience_id']) {
                $object->setCustomExperienceId(null);
            }
            if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
                unset($data['signers_allowed_to_decline']);
            } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('audit_trail_locale', $data) && null !== $data['audit_trail_locale']) {
                $object->setAuditTrailLocale($data['audit_trail_locale']);
                unset($data['audit_trail_locale']);
            } elseif (\array_key_exists('audit_trail_locale', $data) && null === $data['audit_trail_locale']) {
                $object->setAuditTrailLocale(null);
            }
            if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
                $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], SignatureRequestEmailNotification::class, 'json', $context));
                unset($data['email_notification']);
            } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
                $object->setEmailNotification(null);
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
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('deliveryMode') && null !== $object->getDeliveryMode()) {
                $data['delivery_mode'] = $object->getDeliveryMode();
            }
            if ($object->isInitialized('orderedSigners') && null !== $object->getOrderedSigners()) {
                $data['ordered_signers'] = $object->getOrderedSigners();
            }
            if ($object->isInitialized('reminderSettings') && null !== $object->getReminderSettings()) {
                $data['reminder_settings'] = $this->normalizer->normalize($object->getReminderSettings(), 'json', $context);
            }
            if ($object->isInitialized('timezone') && null !== $object->getTimezone()) {
                $data['timezone'] = $object->getTimezone();
            }
            if ($object->isInitialized('emailCustomNote') && null !== $object->getEmailCustomNote()) {
                $data['email_custom_note'] = $object->getEmailCustomNote();
            }
            if ($object->isInitialized('expirationDate') && null !== $object->getExpirationDate()) {
                $data['expiration_date'] = $object->getExpirationDate()?->format('Y-m-d');
            }
            if ($object->isInitialized('externalId') && null !== $object->getExternalId()) {
                $data['external_id'] = $object->getExternalId();
            }
            if ($object->isInitialized('brandingId') && null !== $object->getBrandingId()) {
                $data['branding_id'] = $object->getBrandingId();
            }
            if ($object->isInitialized('customExperienceId') && null !== $object->getCustomExperienceId()) {
                $data['custom_experience_id'] = $object->getCustomExperienceId();
            }
            if ($object->isInitialized('signersAllowedToDecline') && null !== $object->getSignersAllowedToDecline()) {
                $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('auditTrailLocale') && null !== $object->getAuditTrailLocale()) {
                $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            }
            if ($object->isInitialized('emailNotification') && null !== $object->getEmailNotification()) {
                $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
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
            return [UpdateSignatureRequest::class => false];
        }
    }
} else {
    class UpdateSignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return UpdateSignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && UpdateSignatureRequest::class === $data::class;
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
            $object = new UpdateSignatureRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('name', $data) && null !== $data['name']) {
                $object->setName($data['name']);
                unset($data['name']);
            } elseif (\array_key_exists('name', $data) && null === $data['name']) {
                $object->setName(null);
            }
            if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
                $object->setDeliveryMode($data['delivery_mode']);
                unset($data['delivery_mode']);
            } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
                $object->setDeliveryMode(null);
            }
            if (\array_key_exists('ordered_signers', $data) && null !== $data['ordered_signers']) {
                $object->setOrderedSigners($data['ordered_signers']);
                unset($data['ordered_signers']);
            } elseif (\array_key_exists('ordered_signers', $data) && null === $data['ordered_signers']) {
                $object->setOrderedSigners(null);
            }
            if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], UpdateSignatureRequestReminderSettings::class, 'json', $context));
                unset($data['reminder_settings']);
            } elseif (\array_key_exists('reminder_settings', $data) && null === $data['reminder_settings']) {
                $object->setReminderSettings(null);
            }
            if (\array_key_exists('timezone', $data) && null !== $data['timezone']) {
                $object->setTimezone($data['timezone']);
                unset($data['timezone']);
            } elseif (\array_key_exists('timezone', $data) && null === $data['timezone']) {
                $object->setTimezone(null);
            }
            if (\array_key_exists('email_custom_note', $data) && null !== $data['email_custom_note']) {
                $object->setEmailCustomNote($data['email_custom_note']);
                unset($data['email_custom_note']);
            } elseif (\array_key_exists('email_custom_note', $data) && null === $data['email_custom_note']) {
                $object->setEmailCustomNote(null);
            }
            if (\array_key_exists('expiration_date', $data) && null !== $data['expiration_date']) {
                $object->setExpirationDate(\DateTime::createFromFormat('Y-m-d', $data['expiration_date'])->setTime(0, 0, 0));
                unset($data['expiration_date']);
            } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
                $object->setExpirationDate(null);
            }
            if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
                $object->setExternalId($data['external_id']);
                unset($data['external_id']);
            } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
                $object->setExternalId(null);
            }
            if (\array_key_exists('branding_id', $data) && null !== $data['branding_id']) {
                $object->setBrandingId($data['branding_id']);
                unset($data['branding_id']);
            } elseif (\array_key_exists('branding_id', $data) && null === $data['branding_id']) {
                $object->setBrandingId(null);
            }
            if (\array_key_exists('custom_experience_id', $data) && null !== $data['custom_experience_id']) {
                $object->setCustomExperienceId($data['custom_experience_id']);
                unset($data['custom_experience_id']);
            } elseif (\array_key_exists('custom_experience_id', $data) && null === $data['custom_experience_id']) {
                $object->setCustomExperienceId(null);
            }
            if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
                unset($data['signers_allowed_to_decline']);
            } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline(null);
            }
            if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
                $object->setWorkspaceId($data['workspace_id']);
                unset($data['workspace_id']);
            } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
                $object->setWorkspaceId(null);
            }
            if (\array_key_exists('audit_trail_locale', $data) && null !== $data['audit_trail_locale']) {
                $object->setAuditTrailLocale($data['audit_trail_locale']);
                unset($data['audit_trail_locale']);
            } elseif (\array_key_exists('audit_trail_locale', $data) && null === $data['audit_trail_locale']) {
                $object->setAuditTrailLocale(null);
            }
            if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
                $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], SignatureRequestEmailNotification::class, 'json', $context));
                unset($data['email_notification']);
            } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
                $object->setEmailNotification(null);
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
            if ($object->isInitialized('name') && null !== $object->getName()) {
                $data['name'] = $object->getName();
            }
            if ($object->isInitialized('deliveryMode') && null !== $object->getDeliveryMode()) {
                $data['delivery_mode'] = $object->getDeliveryMode();
            }
            if ($object->isInitialized('orderedSigners') && null !== $object->getOrderedSigners()) {
                $data['ordered_signers'] = $object->getOrderedSigners();
            }
            if ($object->isInitialized('reminderSettings') && null !== $object->getReminderSettings()) {
                $data['reminder_settings'] = $this->normalizer->normalize($object->getReminderSettings(), 'json', $context);
            }
            if ($object->isInitialized('timezone') && null !== $object->getTimezone()) {
                $data['timezone'] = $object->getTimezone();
            }
            if ($object->isInitialized('emailCustomNote') && null !== $object->getEmailCustomNote()) {
                $data['email_custom_note'] = $object->getEmailCustomNote();
            }
            if ($object->isInitialized('expirationDate') && null !== $object->getExpirationDate()) {
                $data['expiration_date'] = $object->getExpirationDate()?->format('Y-m-d');
            }
            if ($object->isInitialized('externalId') && null !== $object->getExternalId()) {
                $data['external_id'] = $object->getExternalId();
            }
            if ($object->isInitialized('brandingId') && null !== $object->getBrandingId()) {
                $data['branding_id'] = $object->getBrandingId();
            }
            if ($object->isInitialized('customExperienceId') && null !== $object->getCustomExperienceId()) {
                $data['custom_experience_id'] = $object->getCustomExperienceId();
            }
            if ($object->isInitialized('signersAllowedToDecline') && null !== $object->getSignersAllowedToDecline()) {
                $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('auditTrailLocale') && null !== $object->getAuditTrailLocale()) {
                $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            }
            if ($object->isInitialized('emailNotification') && null !== $object->getEmailNotification()) {
                $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
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
            return [UpdateSignatureRequest::class => false];
        }
    }
}
