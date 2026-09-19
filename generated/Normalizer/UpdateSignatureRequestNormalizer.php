<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmbeddedPreparation;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequest;
use Qdequippe\Yousign\Api\Model\UpdateSignatureRequestReminderSettings;
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
        $object = new UpdateSignatureRequest();
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
        if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
            $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], UpdateSignatureRequestReminderSettings::class, 'json', $context));
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
        if (\array_key_exists('signers_allowed_to_decline', $data) && null !== $data['signers_allowed_to_decline']) {
            $object->setSignersAllowedToDecline($data['signers_allowed_to_decline']);
            unset($data['signers_allowed_to_decline']);
        } elseif (\array_key_exists('signers_allowed_to_decline', $data) && null === $data['signers_allowed_to_decline']) {
            $object->setSignersAllowedToDecline(null);
            unset($data['signers_allowed_to_decline']);
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
        if (\array_key_exists('labels', $data) && null !== $data['labels']) {
            $values = [];
            foreach ($data['labels'] as $value) {
                $values[] = $value;
            }
            $object->setLabels($values);
            unset($data['labels']);
        } elseif (\array_key_exists('labels', $data) && null === $data['labels']) {
            $object->setLabels(null);
            unset($data['labels']);
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
        if ($data->isInitialized('deliveryMode') && null !== $data->getDeliveryMode()) {
            $dataArray['delivery_mode'] = $data->getDeliveryMode();
        }
        if ($data->isInitialized('orderedSigners') && null !== $data->getOrderedSigners()) {
            $dataArray['ordered_signers'] = $data->getOrderedSigners();
        }
        if ($data->isInitialized('orderedApprovers') && null !== $data->getOrderedApprovers()) {
            $dataArray['ordered_approvers'] = $data->getOrderedApprovers();
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
        if ($data->isInitialized('externalId') && null !== $data->getExternalId()) {
            $dataArray['external_id'] = $data->getExternalId();
        }
        if ($data->isInitialized('brandingId') && null !== $data->getBrandingId()) {
            $dataArray['branding_id'] = $data->getBrandingId();
        }
        if ($data->isInitialized('customExperienceId') && null !== $data->getCustomExperienceId()) {
            $dataArray['custom_experience_id'] = $data->getCustomExperienceId();
        }
        if ($data->isInitialized('signersAllowedToDecline') && null !== $data->getSignersAllowedToDecline()) {
            $dataArray['signers_allowed_to_decline'] = $data->getSignersAllowedToDecline();
        }
        if ($data->isInitialized('workspaceId') && null !== $data->getWorkspaceId()) {
            $dataArray['workspace_id'] = $data->getWorkspaceId();
        }
        if ($data->isInitialized('auditTrailLocale') && null !== $data->getAuditTrailLocale()) {
            $dataArray['audit_trail_locale'] = $data->getAuditTrailLocale();
        }
        if ($data->isInitialized('emailNotification') && null !== $data->getEmailNotification()) {
            $dataArray['email_notification'] = null === $data->getEmailNotification() ? null : new JsonObject($this->normalizer->normalize($data->getEmailNotification(), 'json', $context));
        }
        if ($data->isInitialized('embeddedPreparation') && null !== $data->getEmbeddedPreparation()) {
            $dataArray['embedded_preparation'] = null === $data->getEmbeddedPreparation() ? null : new JsonObject($this->normalizer->normalize($data->getEmbeddedPreparation(), 'json', $context));
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values = [];
            foreach ($data->getLabels() as $value) {
                $values[] = $value;
            }
            $dataArray['labels'] = $values;
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
        return [UpdateSignatureRequest::class => false];
    }
}
