<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\ApproverToNotify;
use Qdequippe\Yousign\Api\Model\EmbeddedSignerWithSignatureLink;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivated;
use Qdequippe\Yousign\Api\Model\SignatureRequestActivatedDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestLabel;
use Qdequippe\Yousign\Api\Model\SignatureRequestRejectionInformation;
use Qdequippe\Yousign\Api\Model\SignatureRequestReminderSettings;
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

class SignatureRequestActivatedNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SignatureRequestActivated::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && SignatureRequestActivated::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new SignatureRequestActivated();
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
        if (\array_key_exists('custom_recipient_order', $data) && \is_int($data['custom_recipient_order'])) {
            $data['custom_recipient_order'] = (bool) $data['custom_recipient_order'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
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
        if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']);
            if (false === $date) {
                throw new InvalidDateException($data['created_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCreatedAt($date);
            unset($data['created_at']);
        } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
            $object->setCreatedAt(null);
            unset($data['created_at']);
        }
        if (\array_key_exists('activated_at', $data) && null !== $data['activated_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['activated_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['activated_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setActivatedAt($date_1);
            unset($data['activated_at']);
        } elseif (\array_key_exists('activated_at', $data) && null === $data['activated_at']) {
            $object->setActivatedAt(null);
            unset($data['activated_at']);
        }
        if (\array_key_exists('completed_at', $data) && null !== $data['completed_at']) {
            $date_2 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['completed_at']);
            if (false === $date_2) {
                throw new InvalidDateException($data['completed_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setCompletedAt($date_2);
            unset($data['completed_at']);
        } elseif (\array_key_exists('completed_at', $data) && null === $data['completed_at']) {
            $object->setCompletedAt(null);
            unset($data['completed_at']);
        }
        if (\array_key_exists('approved_at', $data) && null !== $data['approved_at']) {
            $date_3 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['approved_at']);
            if (false === $date_3) {
                throw new InvalidDateException($data['approved_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setApprovedAt($date_3);
            unset($data['approved_at']);
        } elseif (\array_key_exists('approved_at', $data) && null === $data['approved_at']) {
            $object->setApprovedAt(null);
            unset($data['approved_at']);
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
            $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], SignatureRequestReminderSettings::class, 'json', $context));
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
            $date_4 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expiration_date']);
            if (false === $date_4) {
                throw new InvalidDateException($data['expiration_date'], 'Y-m-d\TH:i:sP');
            }
            $object->setExpirationDate($date_4);
            unset($data['expiration_date']);
        } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
            $object->setExpirationDate(null);
            unset($data['expiration_date']);
        }
        if (\array_key_exists('signers', $data) && null !== $data['signers']) {
            $values = [];
            foreach ($data['signers'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, EmbeddedSignerWithSignatureLink::class, 'json', $context);
            }
            $object->setSigners($values);
            unset($data['signers']);
        } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
            $object->setSigners(null);
            unset($data['signers']);
        }
        if (\array_key_exists('approvers', $data) && null !== $data['approvers']) {
            $values_1 = [];
            foreach ($data['approvers'] as $value_1) {
                $values_1[] = $this->denormalizer->denormalize($value_1, ApproverToNotify::class, 'json', $context);
            }
            $object->setApprovers($values_1);
            unset($data['approvers']);
        } elseif (\array_key_exists('approvers', $data) && null === $data['approvers']) {
            $object->setApprovers(null);
            unset($data['approvers']);
        }
        if (\array_key_exists('labels', $data) && null !== $data['labels']) {
            $values_2 = [];
            foreach ($data['labels'] as $value_2) {
                $values_2[] = $this->denormalizer->denormalize($value_2, SignatureRequestLabel::class, 'json', $context);
            }
            $object->setLabels($values_2);
            unset($data['labels']);
        } elseif (\array_key_exists('labels', $data) && null === $data['labels']) {
            $object->setLabels(null);
            unset($data['labels']);
        }
        if (\array_key_exists('documents', $data) && null !== $data['documents']) {
            $values_3 = [];
            foreach ($data['documents'] as $value_3) {
                $values_3[] = $this->denormalizer->denormalize($value_3, SignatureRequestActivatedDocumentsInner::class, 'json', $context);
            }
            $object->setDocuments($values_3);
            unset($data['documents']);
        } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
            $object->setDocuments(null);
            unset($data['documents']);
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
        if (\array_key_exists('rejection_information', $data) && null !== $data['rejection_information']) {
            $object->setRejectionInformation($this->denormalizer->denormalize($data['rejection_information'], SignatureRequestRejectionInformation::class, 'json', $context));
            unset($data['rejection_information']);
        } elseif (\array_key_exists('rejection_information', $data) && null === $data['rejection_information']) {
            $object->setRejectionInformation(null);
            unset($data['rejection_information']);
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
        if (\array_key_exists('custom_recipient_order', $data) && null !== $data['custom_recipient_order']) {
            $object->setCustomRecipientOrder($data['custom_recipient_order']);
            unset($data['custom_recipient_order']);
        } elseif (\array_key_exists('custom_recipient_order', $data) && null === $data['custom_recipient_order']) {
            $object->setCustomRecipientOrder(null);
            unset($data['custom_recipient_order']);
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
        $dataArray['id'] = $data->getId();
        $dataArray['status'] = $data->getStatus();
        $dataArray['name'] = $data->getName();
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['created_at'] = $data->getCreatedAt()->format('Y-m-d\TH:i:sP');
        $dataArray['ordered_signers'] = $data->getOrderedSigners();
        $dataArray['ordered_approvers'] = $data->getOrderedApprovers();
        $dataArray['reminder_settings'] = null === $data->getReminderSettings() ? null : new JsonObject($this->normalizer->normalize($data->getReminderSettings(), 'json', $context));
        $dataArray['timezone'] = $data->getTimezone();
        $dataArray['email_custom_note'] = $data->getEmailCustomNote();
        $dataArray['expiration_date'] = $data->getExpirationDate()->format('Y-m-d\TH:i:sP');
        $values = [];
        foreach ($data->getSigners() as $value) {
            $values[] = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
        }
        $dataArray['signers'] = $values;
        if ($data->isInitialized('approvers') && null !== $data->getApprovers()) {
            $values_1 = [];
            foreach ($data->getApprovers() as $value_1) {
                $values_1[] = null === $value_1 ? null : new JsonObject($this->normalizer->normalize($value_1, 'json', $context));
            }
            $dataArray['approvers'] = $values_1;
        }
        if ($data->isInitialized('labels') && null !== $data->getLabels()) {
            $values_2 = [];
            foreach ($data->getLabels() as $value_2) {
                $values_2[] = null === $value_2 ? null : new JsonObject($this->normalizer->normalize($value_2, 'json', $context));
            }
            $dataArray['labels'] = $values_2;
        }
        $values_3 = [];
        foreach ($data->getDocuments() as $value_3) {
            $values_3[] = null === $value_3 ? null : new JsonObject($this->normalizer->normalize($value_3, 'json', $context));
        }
        $dataArray['documents'] = $values_3;
        $dataArray['external_id'] = $data->getExternalId();
        $dataArray['branding_id'] = $data->getBrandingId();
        $dataArray['custom_experience_id'] = $data->getCustomExperienceId();
        $dataArray['audit_trail_locale'] = $data->getAuditTrailLocale();
        $dataArray['signers_allowed_to_decline'] = $data->getSignersAllowedToDecline();
        $dataArray['workflow_session_id'] = $data->getWorkflowSessionId();
        $dataArray['previous_attempt_id'] = $data->getPreviousAttemptId();
        $dataArray['custom_recipient_order'] = $data->getCustomRecipientOrder();
        foreach ($data->additionalPropertyEntries() as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [SignatureRequestActivated::class => false];
    }
}
