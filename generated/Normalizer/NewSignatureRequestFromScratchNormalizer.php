<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratch;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchReminderSettings;
use Qdequippe\Yousign\Api\Model\NewSignatureRequestFromScratchTemplatePlaceholders;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmbeddedPreparation;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromContactIdInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromInfoInput;
use Qdequippe\Yousign\Api\Model\SignatureRequestSignerFromUserIdInput;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\InvalidDateException;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class NewSignatureRequestFromScratchNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NewSignatureRequestFromScratch::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && NewSignatureRequestFromScratch::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new NewSignatureRequestFromScratch();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('ordered_signers', $data) && \is_int($data['ordered_signers'])) {
            $data['ordered_signers'] = (bool) $data['ordered_signers'];
        }
        if (\array_key_exists('ordered_approvers', $data) && \is_int($data['ordered_approvers'])) {
            $data['ordered_approvers'] = (bool) $data['ordered_approvers'];
        }
        if (\array_key_exists('custom_recipient_order', $data) && \is_int($data['custom_recipient_order'])) {
            $data['custom_recipient_order'] = (bool) $data['custom_recipient_order'];
        }
        if (\array_key_exists('signers_allowed_to_decline', $data) && \is_int($data['signers_allowed_to_decline'])) {
            $data['signers_allowed_to_decline'] = (bool) $data['signers_allowed_to_decline'];
        }
        if (\array_key_exists('name', $data) && null !== $data['name']) {
            $object->setName($data['name']);
            unset($data['name']);
        } elseif (\array_key_exists('name', $data) && null === $data['name']) {
            $object->setName(null);
            unset($data['name']);
        }
        if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
            $object->setDeliveryMode($data['delivery_mode']);
            unset($data['delivery_mode']);
        } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
            $object->setDeliveryMode(null);
            unset($data['delivery_mode']);
        }
        if (\array_key_exists('ordered_signers', $data) && null !== $data['ordered_signers']) {
            $object->setOrderedSigners($data['ordered_signers']);
            unset($data['ordered_signers']);
        } elseif (\array_key_exists('ordered_signers', $data) && null === $data['ordered_signers']) {
            $object->setOrderedSigners(null);
            unset($data['ordered_signers']);
        }
        if (\array_key_exists('ordered_approvers', $data) && null !== $data['ordered_approvers']) {
            $object->setOrderedApprovers($data['ordered_approvers']);
            unset($data['ordered_approvers']);
        } elseif (\array_key_exists('ordered_approvers', $data) && null === $data['ordered_approvers']) {
            $object->setOrderedApprovers(null);
            unset($data['ordered_approvers']);
        }
        if (\array_key_exists('custom_recipient_order', $data) && null !== $data['custom_recipient_order']) {
            $object->setCustomRecipientOrder($data['custom_recipient_order']);
            unset($data['custom_recipient_order']);
        } elseif (\array_key_exists('custom_recipient_order', $data) && null === $data['custom_recipient_order']) {
            $object->setCustomRecipientOrder(null);
            unset($data['custom_recipient_order']);
        }
        if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
            $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], NewSignatureRequestFromScratchReminderSettings::class, 'json', $context));
            unset($data['reminder_settings']);
        } elseif (\array_key_exists('reminder_settings', $data) && null === $data['reminder_settings']) {
            $object->setReminderSettings(null);
            unset($data['reminder_settings']);
        }
        if (\array_key_exists('timezone', $data) && null !== $data['timezone']) {
            $object->setTimezone($data['timezone']);
            unset($data['timezone']);
        } elseif (\array_key_exists('timezone', $data) && null === $data['timezone']) {
            $object->setTimezone(null);
            unset($data['timezone']);
        }
        if (\array_key_exists('email_custom_note', $data) && null !== $data['email_custom_note']) {
            $object->setEmailCustomNote($data['email_custom_note']);
            unset($data['email_custom_note']);
        } elseif (\array_key_exists('email_custom_note', $data) && null === $data['email_custom_note']) {
            $object->setEmailCustomNote(null);
            unset($data['email_custom_note']);
        }
        if (\array_key_exists('expiration_date', $data) && null !== $data['expiration_date']) {
            $date = \DateTime::createFromFormat('Y-m-d', $data['expiration_date']);
            if (false === $date) {
                throw new InvalidDateException($data['expiration_date'], 'Y-m-d');
            }
            $object->setExpirationDate($date->setTime(0, 0, 0));
            unset($data['expiration_date']);
        } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
            $object->setExpirationDate(null);
            unset($data['expiration_date']);
        }
        if (\array_key_exists('template_id', $data) && null !== $data['template_id']) {
            $object->setTemplateId($data['template_id']);
            unset($data['template_id']);
        } elseif (\array_key_exists('template_id', $data) && null === $data['template_id']) {
            $object->setTemplateId(null);
            unset($data['template_id']);
        }
        if (\array_key_exists('external_id', $data) && null !== $data['external_id']) {
            $object->setExternalId($data['external_id']);
            unset($data['external_id']);
        } elseif (\array_key_exists('external_id', $data) && null === $data['external_id']) {
            $object->setExternalId(null);
            unset($data['external_id']);
        }
        if (\array_key_exists('branding_id', $data) && null !== $data['branding_id']) {
            $object->setBrandingId($data['branding_id']);
            unset($data['branding_id']);
        } elseif (\array_key_exists('branding_id', $data) && null === $data['branding_id']) {
            $object->setBrandingId(null);
            unset($data['branding_id']);
        }
        if (\array_key_exists('custom_experience_id', $data) && null !== $data['custom_experience_id']) {
            $object->setCustomExperienceId($data['custom_experience_id']);
            unset($data['custom_experience_id']);
        } elseif (\array_key_exists('custom_experience_id', $data) && null === $data['custom_experience_id']) {
            $object->setCustomExperienceId(null);
            unset($data['custom_experience_id']);
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
            unset($data['documents']);
        }
        if (\array_key_exists('signers', $data) && null !== $data['signers']) {
            $values_1 = [];
            foreach ($data['signers'] as $value_1) {
                $value_2 = $value_1;
                if (\is_array($value_1) && \array_key_exists('info', $value_1) && (\array_key_exists('signature_level', $value_1) && \in_array($value_1['signature_level'], ['electronic_signature', 'advanced_electronic_signature', 'qualified_electronic_signature']))) {
                    $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromInfoInput::class, 'json', $context);
                } elseif (\is_array($value_1) && \array_key_exists('user_id', $value_1) && (\array_key_exists('signature_level', $value_1) && \in_array($value_1['signature_level'], ['electronic_signature', 'advanced_electronic_signature', 'qualified_electronic_signature']))) {
                    $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromUserIdInput::class, 'json', $context);
                } elseif (\is_array($value_1) && \array_key_exists('contact_id', $value_1) && (\array_key_exists('signature_level', $value_1) && \in_array($value_1['signature_level'], ['electronic_signature', 'advanced_electronic_signature', 'qualified_electronic_signature']))) {
                    $value_2 = $this->denormalizer->denormalize($value_1, SignatureRequestSignerFromContactIdInput::class, 'json', $context);
                }
                $values_1[] = $value_2;
            }
            $object->setSigners($values_1);
            unset($data['signers']);
        } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
            $object->setSigners(null);
            unset($data['signers']);
        }
        if (\array_key_exists('workspace_id', $data) && null !== $data['workspace_id']) {
            $object->setWorkspaceId($data['workspace_id']);
            unset($data['workspace_id']);
        } elseif (\array_key_exists('workspace_id', $data) && null === $data['workspace_id']) {
            $object->setWorkspaceId(null);
            unset($data['workspace_id']);
        }
        if (\array_key_exists('audit_trail_locale', $data) && null !== $data['audit_trail_locale']) {
            $object->setAuditTrailLocale($data['audit_trail_locale']);
            unset($data['audit_trail_locale']);
        } elseif (\array_key_exists('audit_trail_locale', $data) && null === $data['audit_trail_locale']) {
            $object->setAuditTrailLocale(null);
            unset($data['audit_trail_locale']);
        }
        if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
            $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
            unset($data['signers_allowed_to_decline']);
        } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
            $object->setSignersAllowedToDecline(null);
            unset($data['signers_allowed_to_decline']);
        }
        if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
            $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], SignatureRequestEmailNotification::class, 'json', $context));
            unset($data['email_notification']);
        } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
            $object->setEmailNotification(null);
            unset($data['email_notification']);
        }
        if (\array_key_exists('embedded_preparation', $data) && null !== $data['embedded_preparation']) {
            $object->setEmbeddedPreparation($this->denormalizer->denormalize($data['embedded_preparation'], SignatureRequestEmbeddedPreparation::class, 'json', $context));
            unset($data['embedded_preparation']);
        } elseif (\array_key_exists('embedded_preparation', $data) && null === $data['embedded_preparation']) {
            $object->setEmbeddedPreparation(null);
            unset($data['embedded_preparation']);
        }
        if (\array_key_exists('template_placeholders', $data) && null !== $data['template_placeholders']) {
            $object->setTemplatePlaceholders($this->denormalizer->denormalize($data['template_placeholders'], NewSignatureRequestFromScratchTemplatePlaceholders::class, 'json', $context));
            unset($data['template_placeholders']);
        } elseif (\array_key_exists('template_placeholders', $data) && null === $data['template_placeholders']) {
            $object->setTemplatePlaceholders(null);
            unset($data['template_placeholders']);
        }
        if (\array_key_exists('archiving', $data) && null !== $data['archiving']) {
            $object->setArchiving($data['archiving']);
            unset($data['archiving']);
        } elseif (\array_key_exists('archiving', $data) && null === $data['archiving']) {
            $object->setArchiving(null);
            unset($data['archiving']);
        }
        if (\array_key_exists('labels', $data) && null !== $data['labels']) {
            $values_2 = [];
            foreach ($data['labels'] as $value_3) {
                $values_2[] = $value_3;
            }
            $object->setLabels($values_2);
            unset($data['labels']);
        } elseif (\array_key_exists('labels', $data) && null === $data['labels']) {
            $object->setLabels(null);
            unset($data['labels']);
        }
        if (\array_key_exists('workflow_session_id', $data) && null !== $data['workflow_session_id']) {
            $object->setWorkflowSessionId($data['workflow_session_id']);
            unset($data['workflow_session_id']);
        } elseif (\array_key_exists('workflow_session_id', $data) && null === $data['workflow_session_id']) {
            $object->setWorkflowSessionId(null);
            unset($data['workflow_session_id']);
        }
        if (\array_key_exists('previous_attempt_id', $data) && null !== $data['previous_attempt_id']) {
            $object->setPreviousAttemptId($data['previous_attempt_id']);
            unset($data['previous_attempt_id']);
        } elseif (\array_key_exists('previous_attempt_id', $data) && null === $data['previous_attempt_id']) {
            $object->setPreviousAttemptId(null);
            unset($data['previous_attempt_id']);
        }
        foreach ($data as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_4;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        $dataArray['name'] = $data->getName();
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        if ($data->isInitialized('orderedSigners') && null !== $data->getOrderedSigners()) {
            $dataArray['ordered_signers'] = $data->getOrderedSigners();
        }
        if ($data->isInitialized('orderedApprovers') && null !== $data->getOrderedApprovers()) {
            $dataArray['ordered_approvers'] = $data->getOrderedApprovers();
        }
        if ($data->isInitialized('customRecipientOrder') && null !== $data->getCustomRecipientOrder()) {
            $dataArray['custom_recipient_order'] = $data->getCustomRecipientOrder();
        }
        if ($data->isInitialized('reminderSettings') && null !== $data->getReminderSettings()) {
            $dataArray['reminder_settings'] = null === $data->getReminderSettings() ? null : new JsonObject($this->normalizer->normalize($data->getReminderSettings(), 'json', $context));
        }
        if ($data->isInitialized('timezone') && null !== $data->getTimezone()) {
            $dataArray['timezone'] = $data->getTimezone();
        }
        if ($data->isInitialized('emailCustomNote') && null !== $data->getEmailCustomNote()) {
            $dataArray['email_custom_note'] = $data->getEmailCustomNote();
        }
        if ($data->isInitialized('expirationDate') && null !== $data->getExpirationDate()) {
            $dataArray['expiration_date'] = $data->getExpirationDate()->format('Y-m-d');
        }
        if ($data->isInitialized('templateId') && null !== $data->getTemplateId()) {
            $dataArray['template_id'] = $data->getTemplateId();
        }
        if ($data->isInitialized('externalId') && null !== $data->getExternalId()) {
            $dataArray['external_id'] = $data->getExternalId();
        }
        if ($data->isInitialized('brandingId') && null !== $data->getBrandingId()) {
            $dataArray['branding_id'] = $data->getBrandingId();
        }
        if ($data->isInitialized('customExperienceId') && null !== $data->getCustomExperienceId()) {
            $dataArray['custom_experience_id'] = $data->getCustomExperienceId();
        }
        if ($data->isInitialized('documents') && null !== $data->getDocuments()) {
            $values = [];
            foreach ($data->getDocuments() as $value) {
                $values[] = $value;
            }
            $dataArray['documents'] = $values;
        }
        if ($data->isInitialized('signers') && null !== $data->getSigners()) {
            $values_1 = [];
            foreach ($data->getSigners() as $value_1) {
                $value_2 = $value_1;
                if (\is_object($value_1)) {
                    $value_2 = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
                } elseif (\is_object($value_1)) {
                    $value_2 = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
                } elseif (\is_object($value_1)) {
                    $value_2 = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
                }
                $values_1[] = $value_2;
            }
            $dataArray['signers'] = $values_1;
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        if ($data->isInitialized('auditTrailLocale') && null !== $data->getAuditTrailLocale()) {
            $dataArray['audit_trail_locale'] = $data->getAuditTrailLocale();
        }
        if ($data->isInitialized('signersAllowedToDecline') && null !== $data->getSignersAllowedToDecline()) {
            $dataArray['signers_allowed_to_decline'] = $data->getSignersAllowedToDecline();
        }
        if ($data->isInitialized('emailNotification') && null !== $data->getEmailNotification()) {
            $dataArray['email_notification'] = null === $data->getEmailNotification() ? null : new JsonObject($this->normalizer->normalize($data->getEmailNotification(), 'json', $context));
        }
        if ($data->isInitialized('embeddedPreparation') && null !== $data->getEmbeddedPreparation()) {
            $dataArray['embedded_preparation'] = null === $data->getEmbeddedPreparation() ? null : new JsonObject($this->normalizer->normalize($data->getEmbeddedPreparation(), 'json', $context));
        }
        if ($data->isInitialized('templatePlaceholders') && null !== $data->getTemplatePlaceholders()) {
            $dataArray['template_placeholders'] = null === $data->getTemplatePlaceholders() ? null : new JsonObject($this->normalizer->normalize($data->getTemplatePlaceholders(), 'json', $context));
        }
        if ($data->isInitialized('archiving') && null !== $data->getArchiving()) {
            $dataArray['archiving'] = $data->getArchiving();
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_2 = [];
            foreach ($data->getLabels() as $value_3) {
                $values_2[] = $value_3;
            }
            $dataArray['labels'] = $values_2;
        }
        if ($data->isInitialized('workflowSessionId') && null !== $data->getWorkflowSessionId()) {
            $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        }
        if ($data->isInitialized('previousAttemptId') && null !== $data->getPreviousAttemptId()) {
            $dataArray['previous_attempt_id'] = $data->getPreviousAttemptId();
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [NewSignatureRequestFromScratch::class => false];
    }
}
