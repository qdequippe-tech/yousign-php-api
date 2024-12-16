<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\SignatureRequest;
use Qdequippe\Yousign\Api\Model\SignatureRequestDeclineInformation;
use Qdequippe\Yousign\Api\Model\SignatureRequestEmailNotification;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListApproversInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListDocumentsInner;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListReminderSettings;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSender;
use Qdequippe\Yousign\Api\Model\SignatureRequestInListSignersInner;
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
    class SignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignatureRequest::class === $data::class;
        }

        public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
        {
            if (isset($data['$ref'])) {
                return new Reference($data['$ref'], $context['document-origin']);
            }
            if (isset($data['$recursiveRef'])) {
                return new Reference($data['$recursiveRef'], $context['document-origin']);
            }
            $object = new SignatureRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
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
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('ordered_signers', $data) && null !== $data['ordered_signers']) {
                $object->setOrderedSigners($data['ordered_signers']);
                unset($data['ordered_signers']);
            } elseif (\array_key_exists('ordered_signers', $data) && null === $data['ordered_signers']) {
                $object->setOrderedSigners(null);
            }
            if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], SignatureRequestInListReminderSettings::class, 'json', $context));
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
                $object->setExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expiration_date']));
                unset($data['expiration_date']);
            } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
                $object->setExpirationDate(null);
            }
            if (\array_key_exists('source', $data) && null !== $data['source']) {
                $object->setSource($data['source']);
                unset($data['source']);
            } elseif (\array_key_exists('source', $data) && null === $data['source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values = [];
                foreach ($data['signers'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, SignatureRequestInListSignersInner::class, 'json', $context);
                }
                $object->setSigners($values);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
            }
            if (\array_key_exists('approvers', $data) && null !== $data['approvers']) {
                $values_1 = [];
                foreach ($data['approvers'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, SignatureRequestInListApproversInner::class, 'json', $context);
                }
                $object->setApprovers($values_1);
                unset($data['approvers']);
            } elseif (\array_key_exists('approvers', $data) && null === $data['approvers']) {
                $object->setApprovers(null);
            }
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values_2 = [];
                foreach ($data['documents'] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, SignatureRequestInListDocumentsInner::class, 'json', $context);
                }
                $object->setDocuments($values_2);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('sender', $data) && null !== $data['sender']) {
                $object->setSender($this->denormalizer->denormalize($data['sender'], SignatureRequestInListSender::class, 'json', $context));
                unset($data['sender']);
            } elseif (\array_key_exists('sender', $data) && null === $data['sender']) {
                $object->setSender(null);
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
            if (\array_key_exists('bulk_send_batch_id', $data) && null !== $data['bulk_send_batch_id']) {
                $object->setBulkSendBatchId($data['bulk_send_batch_id']);
                unset($data['bulk_send_batch_id']);
            } elseif (\array_key_exists('bulk_send_batch_id', $data) && null === $data['bulk_send_batch_id']) {
                $object->setBulkSendBatchId(null);
            }
            if (\array_key_exists('decline_information', $data) && null !== $data['decline_information']) {
                $object->setDeclineInformation($this->denormalizer->denormalize($data['decline_information'], SignatureRequestDeclineInformation::class, 'json', $context));
                unset($data['decline_information']);
            } elseif (\array_key_exists('decline_information', $data) && null === $data['decline_information']) {
                $object->setDeclineInformation(null);
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
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['name'] = $object->getName();
            $data['delivery_mode'] = $object->getDeliveryMode();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['ordered_signers'] = $object->getOrderedSigners();
            $data['reminder_settings'] = $this->normalizer->normalize($object->getReminderSettings(), 'json', $context);
            $data['timezone'] = $object->getTimezone();
            $data['email_custom_note'] = $object->getEmailCustomNote();
            $data['expiration_date'] = $object->getExpirationDate()?->format('Y-m-d\TH:i:sP');
            $data['source'] = $object->getSource();
            $values = [];
            foreach ($object->getSigners() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['signers'] = $values;
            if ($object->isInitialized('approvers') && null !== $object->getApprovers()) {
                $values_1 = [];
                foreach ($object->getApprovers() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['approvers'] = $values_1;
            }
            $values_2 = [];
            foreach ($object->getDocuments() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['documents'] = $values_2;
            $data['sender'] = $this->normalizer->normalize($object->getSender(), 'json', $context);
            $data['external_id'] = $object->getExternalId();
            $data['branding_id'] = $object->getBrandingId();
            $data['custom_experience_id'] = $object->getCustomExperienceId();
            $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
            $data['bulk_send_batch_id'] = $object->getBulkSendBatchId();
            if ($object->isInitialized('declineInformation') && null !== $object->getDeclineInformation()) {
                $data['decline_information'] = $this->normalizer->normalize($object->getDeclineInformation(), 'json', $context);
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
            return [SignatureRequest::class => false];
        }
    }
} else {
    class SignatureRequestNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
    {
        use CheckArray;
        use DenormalizerAwareTrait;
        use NormalizerAwareTrait;
        use ValidatorTrait;

        public function supportsDenormalization($data, $type, ?string $format = null, array $context = []): bool
        {
            return SignatureRequest::class === $type;
        }

        public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
        {
            return \is_object($data) && SignatureRequest::class === $data::class;
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
            $object = new SignatureRequest();
            if (null === $data || false === \is_array($data)) {
                return $object;
            }
            if (\array_key_exists('id', $data) && null !== $data['id']) {
                $object->setId($data['id']);
                unset($data['id']);
            } elseif (\array_key_exists('id', $data) && null === $data['id']) {
                $object->setId(null);
            }
            if (\array_key_exists('status', $data) && null !== $data['status']) {
                $object->setStatus($data['status']);
                unset($data['status']);
            } elseif (\array_key_exists('status', $data) && null === $data['status']) {
                $object->setStatus(null);
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
            if (\array_key_exists('created_at', $data) && null !== $data['created_at']) {
                $object->setCreatedAt(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['created_at']));
                unset($data['created_at']);
            } elseif (\array_key_exists('created_at', $data) && null === $data['created_at']) {
                $object->setCreatedAt(null);
            }
            if (\array_key_exists('ordered_signers', $data) && null !== $data['ordered_signers']) {
                $object->setOrderedSigners($data['ordered_signers']);
                unset($data['ordered_signers']);
            } elseif (\array_key_exists('ordered_signers', $data) && null === $data['ordered_signers']) {
                $object->setOrderedSigners(null);
            }
            if (\array_key_exists('reminder_settings', $data) && null !== $data['reminder_settings']) {
                $object->setReminderSettings($this->denormalizer->denormalize($data['reminder_settings'], SignatureRequestInListReminderSettings::class, 'json', $context));
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
                $object->setExpirationDate(\DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['expiration_date']));
                unset($data['expiration_date']);
            } elseif (\array_key_exists('expiration_date', $data) && null === $data['expiration_date']) {
                $object->setExpirationDate(null);
            }
            if (\array_key_exists('source', $data) && null !== $data['source']) {
                $object->setSource($data['source']);
                unset($data['source']);
            } elseif (\array_key_exists('source', $data) && null === $data['source']) {
                $object->setSource(null);
            }
            if (\array_key_exists('signers', $data) && null !== $data['signers']) {
                $values = [];
                foreach ($data['signers'] as $value) {
                    $values[] = $this->denormalizer->denormalize($value, SignatureRequestInListSignersInner::class, 'json', $context);
                }
                $object->setSigners($values);
                unset($data['signers']);
            } elseif (\array_key_exists('signers', $data) && null === $data['signers']) {
                $object->setSigners(null);
            }
            if (\array_key_exists('approvers', $data) && null !== $data['approvers']) {
                $values_1 = [];
                foreach ($data['approvers'] as $value_1) {
                    $values_1[] = $this->denormalizer->denormalize($value_1, SignatureRequestInListApproversInner::class, 'json', $context);
                }
                $object->setApprovers($values_1);
                unset($data['approvers']);
            } elseif (\array_key_exists('approvers', $data) && null === $data['approvers']) {
                $object->setApprovers(null);
            }
            if (\array_key_exists('documents', $data) && null !== $data['documents']) {
                $values_2 = [];
                foreach ($data['documents'] as $value_2) {
                    $values_2[] = $this->denormalizer->denormalize($value_2, SignatureRequestInListDocumentsInner::class, 'json', $context);
                }
                $object->setDocuments($values_2);
                unset($data['documents']);
            } elseif (\array_key_exists('documents', $data) && null === $data['documents']) {
                $object->setDocuments(null);
            }
            if (\array_key_exists('sender', $data) && null !== $data['sender']) {
                $object->setSender($this->denormalizer->denormalize($data['sender'], SignatureRequestInListSender::class, 'json', $context));
                unset($data['sender']);
            } elseif (\array_key_exists('sender', $data) && null === $data['sender']) {
                $object->setSender(null);
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
            if (\array_key_exists('bulk_send_batch_id', $data) && null !== $data['bulk_send_batch_id']) {
                $object->setBulkSendBatchId($data['bulk_send_batch_id']);
                unset($data['bulk_send_batch_id']);
            } elseif (\array_key_exists('bulk_send_batch_id', $data) && null === $data['bulk_send_batch_id']) {
                $object->setBulkSendBatchId(null);
            }
            if (\array_key_exists('decline_information', $data) && null !== $data['decline_information']) {
                $object->setDeclineInformation($this->denormalizer->denormalize($data['decline_information'], SignatureRequestDeclineInformation::class, 'json', $context));
                unset($data['decline_information']);
            } elseif (\array_key_exists('decline_information', $data) && null === $data['decline_information']) {
                $object->setDeclineInformation(null);
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
         */
        public function normalize($object, $format = null, array $context = []): string|int|float|bool|\ArrayObject|array|null
        {
            $data = [];
            $data['id'] = $object->getId();
            $data['status'] = $object->getStatus();
            $data['name'] = $object->getName();
            $data['delivery_mode'] = $object->getDeliveryMode();
            $data['created_at'] = $object->getCreatedAt()?->format('Y-m-d\TH:i:sP');
            $data['ordered_signers'] = $object->getOrderedSigners();
            $data['reminder_settings'] = $this->normalizer->normalize($object->getReminderSettings(), 'json', $context);
            $data['timezone'] = $object->getTimezone();
            $data['email_custom_note'] = $object->getEmailCustomNote();
            $data['expiration_date'] = $object->getExpirationDate()?->format('Y-m-d\TH:i:sP');
            $data['source'] = $object->getSource();
            $values = [];
            foreach ($object->getSigners() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['signers'] = $values;
            if ($object->isInitialized('approvers') && null !== $object->getApprovers()) {
                $values_1 = [];
                foreach ($object->getApprovers() as $value_1) {
                    $values_1[] = $this->normalizer->normalize($value_1, 'json', $context);
                }
                $data['approvers'] = $values_1;
            }
            $values_2 = [];
            foreach ($object->getDocuments() as $value_2) {
                $values_2[] = $this->normalizer->normalize($value_2, 'json', $context);
            }
            $data['documents'] = $values_2;
            $data['sender'] = $this->normalizer->normalize($object->getSender(), 'json', $context);
            $data['external_id'] = $object->getExternalId();
            $data['branding_id'] = $object->getBrandingId();
            $data['custom_experience_id'] = $object->getCustomExperienceId();
            $data['signers_allowed_to_decline'] = $object->getSignersAllowedToDecline();
            if ($object->isInitialized('workspaceId') && null !== $object->getWorkspaceId()) {
                $data['workspace_id'] = $object->getWorkspaceId();
            }
            $data['audit_trail_locale'] = $object->getAuditTrailLocale();
            $data['email_notification'] = $this->normalizer->normalize($object->getEmailNotification(), 'json', $context);
            $data['bulk_send_batch_id'] = $object->getBulkSendBatchId();
            if ($object->isInitialized('declineInformation') && null !== $object->getDeclineInformation()) {
                $data['decline_information'] = $this->normalizer->normalize($object->getDeclineInformation(), 'json', $context);
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
            return [SignatureRequest::class => false];
        }
    }
}
