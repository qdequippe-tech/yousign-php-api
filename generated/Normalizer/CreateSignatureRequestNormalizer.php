<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequest;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestReminderSettings;
use Qdequippe\Yousign\Api\Model\CreateSignatureRequestTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
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
    class CreateSignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return CreateSignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateSignatureRequest::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new CreateSignatureRequest();
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
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], CreateSignatureRequestReminderSettings::class, 'json', $context));
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
            if (\array_key_exists('template_id', $data) && null !== $data['template_id']) {
                $object->setTemplateId($data['template_id']);
                unset($data['template_id']);
            } elseif (\array_key_exists('template_id', $data) && null === $data['template_id']) {
                $object->setTemplateId(null);
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
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values = [];
                foreach ($data['documents'] as $value) {
                    $values[] = $value;
                }
                $object->setDocuments($values);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values_1 = [];
                foreach ($data['signers'] as $value_1) {
                    $value_2 = $value_1;
                    if (\is_array($value_1) && isset($value_1['info']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromInfoInput::class, 'json', $context);
                    } elseif (\is_array($value_1) && isset($value_1['user_id']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromUserIdInput::class, 'json', $context);
                    } elseif (\is_array($value_1) && isset($value_1['contact_id']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromContactIdInput::class, 'json', $context);
                    }
                    $values_1[] = $value_2;
                }
                $object->setSigners($values_1);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
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
            if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
                unset($data['signers_allowed_to_decline']);
            } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline(null);
            }
            if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
                $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], SignatureRequestEmailNotification::class, 'json', $context));
                unset($data['email_notification']);
            } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
                $object->setEmailNotification(null);
            }
            if (\array_key_exists('template_placeholders', $data) && null !== $data['template_placeholders']) {
                $object->setTemplatePlaceholders($this->denormalizer->denormalize($data['template_placeholders'], CreateSignatureRequestTemplatePlaceholders::class, 'json', $context));
                unset($data['template_placeholders']);
            } elseif (\array_key_exists('template_placeholders', $data) && null === $data['template_placeholders']) {
                $object->setTemplatePlaceholders(null);
            }
            foreach ($data as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_3;
                }
            }

            return $object;
        }

        public function normalize(mixed $object, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
        {
            $data = [];
            $data['name'] = $object->getName();
            $data['delivery_mode'] = $object->getDeliveryMode();
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
                $data['expiration_date'] = $object->getExpirationDate()->format('Y-m-d');
            }
            if ($object->isInitialized('templateId') && null !== $object->getTemplateId()) {
                $data['template_id'] = $object->getTemplateId();
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
            if ($object->isInitialized('documents') && null !== $object->getDocuments()) {
                $values = [];
                foreach ($object->getDocuments() as $value) {
                    $values[] = $value;
                }
                $data['documents'] = $values;
            }
            if ($object->isInitialized('signers') && null !== $object->getSigners()) {
                $values_1 = [];
                foreach ($object->getSigners() as $value_1) {
                    $value_2 = $value_1;
                    if (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    } elseif (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    } elseif (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    }
                    $values_1[] = $value_2;
                }
                $data['signers'] = $values_1;
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('auditTrailLocale') && null !== $object->getAuditTrailLocale()) {
                $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            }
            if ($object->isInitialized('signersAllowedToDecline') && null !== $object->getSignersAllowedToDecline()) {
                $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            }
            if ($object->isInitialized('emailNotification') && null !== $object->getEmailNotification()) {
                $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
            }
            if ($object->isInitialized('templatePlaceholders') && null !== $object->getTemplatePlaceholders()) {
                $data['template_placeholders'] = $this->normalizer->normalize($object->getTemplatePlaceholders(), 'json', $context);
            }
            foreach ($object as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateSignatureRequest::class => false];
        }
    }
} else {
    class CreateSignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return CreateSignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && Qdequippe\Yousign\Api\Model\CreateSignatureRequest::class === $data::class;
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
            $object = new CreateSignatureRequest();
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
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], CreateSignatureRequestReminderSettings::class, 'json', $context));
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
            if (\array_key_exists('template_id', $data) && null !== $data['template_id']) {
                $object->setTemplateId($data['template_id']);
                unset($data['template_id']);
            } elseif (\array_key_exists('template_id', $data) && null === $data['template_id']) {
                $object->setTemplateId(null);
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
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values = [];
                foreach ($data['documents'] as $value) {
                    $values[] = $value;
                }
                $object->setDocuments($values);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values_1 = [];
                foreach ($data['signers'] as $value_1) {
                    $value_2 = $value_1;
                    if (\is_array($value_1) && isset($value_1['info']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromInfoInput::class, 'json', $context);
                    } elseif (\is_array($value_1) && isset($value_1['user_id']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromUserIdInput::class, 'json', $context);
                    } elseif (\is_array($value_1) && isset($value_1['contact_id']) && (isset($value_1['signature_level']) && ('electronic_signature' == $value_1['signature_level'] || 'advanced_electronic_signature' == $value_1['signature_level'] || 'electronic_signature_with_qualified_certificate' == $value_1['signature_level'] || 'qualified_electronic_signature' == $value_1['signature_level'] || 'qualified_electronic_signature_mode_1' == $value_1['signature_level']))) {
                        $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromContactIdInput::class, 'json', $context);
                    }
                    $values_1[] = $value_2;
                }
                $object->setSigners($values_1);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
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
            if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
                unset($data['signers_allowed_to_decline']);
            } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
                $object->setSignersAllowedToDecline(null);
            }
            if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
                $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], SignatureRequestEmailNotification::class, 'json', $context));
                unset($data['email_notification']);
            } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
                $object->setEmailNotification(null);
            }
            if (\array_key_exists('template_placeholders', $data) && null !== $data['template_placeholders']) {
                $object->setTemplatePlaceholders($this->denormalizer->denormalize($data['template_placeholders'], CreateSignatureRequestTemplatePlaceholders::class, 'json', $context));
                unset($data['template_placeholders']);
            } elseif (\array_key_exists('template_placeholders', $data) && null === $data['template_placeholders']) {
                $object->setTemplatePlaceholders(null);
            }
            foreach ($data as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $object[$key] = $value_3;
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
            $data['name'] = $object->getName();
            $data['delivery_mode'] = $object->getDeliveryMode();
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
                $data['expiration_date'] = $object->getExpirationDate()->format('Y-m-d');
            }
            if ($object->isInitialized('templateId') && null !== $object->getTemplateId()) {
                $data['template_id'] = $object->getTemplateId();
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
            if ($object->isInitialized('documents') && null !== $object->getDocuments()) {
                $values = [];
                foreach ($object->getDocuments() as $value) {
                    $values[] = $value;
                }
                $data['documents'] = $values;
            }
            if ($object->isInitialized('signers') && null !== $object->getSigners()) {
                $values_1 = [];
                foreach ($object->getSigners() as $value_1) {
                    $value_2 = $value_1;
                    if (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    } elseif (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    } elseif (\is_object($value_1)) {
                        $value_2 = $this->normalizer->normalize($value_1, 'json', $context);
                    }
                    $values_1[] = $value_2;
                }
                $data['signers'] = $values_1;
            }
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            if ($object->isInitialized('auditTrailLocale') && null !== $object->getAuditTrailLocale()) {
                $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            }
            if ($object->isInitialized('signersAllowedToDecline') && null !== $object->getSignersAllowedToDecline()) {
                $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            }
            if ($object->isInitialized('emailNotification') && null !== $object->getEmailNotification()) {
                $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
            }
            if ($object->isInitialized('templatePlaceholders') && null !== $object->getTemplatePlaceholders()) {
                $data['template_placeholders'] = $this->normalizer->normalize($object->getTemplatePlaceholders(), 'json', $context);
            }
            foreach ($object as $key => $value_3) {
                if (preg_match('/.*/', (string) $key)) {
                    $data[$key] = $value_3;
                }
            }

            return $data;
        }

        public function getSupportedTypes(?string $format = null): array
        {
            return [CreateSignatureRequest::class => false];
        }
    }
}
