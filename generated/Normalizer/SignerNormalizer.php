<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\CustomText;
use Qdequippe\Yousign\Api\Model\EmailNotification;
use Qdequippe\Yousign\Api\Model\FieldCheckbox;
use Qdequippe\Yousign\Api\Model\FieldMention;
use Qdequippe\Yousign\Api\Model\FieldRadioButtonGroup;
use Qdequippe\Yousign\Api\Model\FieldSignature;
use Qdequippe\Yousign\Api\Model\FieldText;
use Qdequippe\Yousign\Api\Model\Signer;
use Qdequippe\Yousign\Api\Model\SignerInfo;
use Qdequippe\Yousign\Api\Model\SignerRedirectUrls;
use Qdequippe\Yousign\Api\Model\SmsNotification;
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

class SignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Signer::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && Signer::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new Signer();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (isset($data['$ref']) && !isset($data['type']) && !isset($data['properties']) && !isset($data['allOf'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        if (\array_key_exists('pre_identity_verification_required', $data) && \is_int($data['pre_identity_verification_required'])) {
            $data['pre_identity_verification_required'] = (bool) $data['pre_identity_verification_required'];
        }
        if (\array_key_exists('id', $data) && null !== $data['id']) {
            $object->setId($data['id']);
            unset($data['id']);
        } elseif (\array_key_exists('id', $data) && null === $data['id']) {
            $object->setId(null);
            unset($data['id']);
        }
        if (\array_key_exists('info', $data) && null !== $data['info']) {
            $object->setInfo($this->denormalizer->denormalize($data['info'], SignerInfo::class, 'json', $context));
            unset($data['info']);
        } elseif (\array_key_exists('info', $data) && null === $data['info']) {
            $object->setInfo(null);
            unset($data['info']);
        }
        if (\array_key_exists('status', $data) && null !== $data['status']) {
            $object->setStatus($data['status']);
            unset($data['status']);
        } elseif (\array_key_exists('status', $data) && null === $data['status']) {
            $object->setStatus(null);
            unset($data['status']);
        }
        if (\array_key_exists('fields', $data) && null !== $data['fields']) {
            $values = [];
            foreach ($data['fields'] as $value) {
                $value_1 = $value;
                if (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'signature' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('reason', $value) && \array_key_exists('display', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldSignature::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'text' == $value['type']) && \array_key_exists('width', $value) && \array_key_exists('height', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('question', $value) && \array_key_exists('instruction', $value) && \array_key_exists('optional', $value) && \array_key_exists('answer', $value) && \array_key_exists('max_length', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldText::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'mention' == $value['type']) && \array_key_exists('height', $value) && \array_key_exists('width', $value) && \array_key_exists('page', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value) && \array_key_exists('mention', $value) && \array_key_exists('font', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldMention::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'checkbox' == $value['type']) && \array_key_exists('name', $value) && \array_key_exists('checked', $value) && \array_key_exists('page', $value) && \array_key_exists('optional', $value) && \array_key_exists('x', $value) && \array_key_exists('y', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldCheckbox::class, 'json', $context);
                } elseif (\is_array($value) && \array_key_exists('id', $value) && \array_key_exists('document_id', $value) && \array_key_exists('signer_id', $value) && (\array_key_exists('type', $value) && 'radio_group' == $value['type']) && \array_key_exists('page', $value) && \array_key_exists('optional', $value) && \array_key_exists('name', $value) && \array_key_exists('radios', $value)) {
                    $value_1 = $this->denormalizer->denormalize($value, FieldRadioButtonGroup::class, 'json', $context);
                }
                $values[] = $value_1;
            }
            $object->setFields($values);
            unset($data['fields']);
        } elseif (\array_key_exists('fields', $data) && null === $data['fields']) {
            $object->setFields(null);
            unset($data['fields']);
        }
        if (\array_key_exists('signature_level', $data) && null !== $data['signature_level']) {
            $object->setSignatureLevel($data['signature_level']);
            unset($data['signature_level']);
        } elseif (\array_key_exists('signature_level', $data) && null === $data['signature_level']) {
            $object->setSignatureLevel(null);
            unset($data['signature_level']);
        }
        if (\array_key_exists('signature_authentication_mode', $data) && null !== $data['signature_authentication_mode']) {
            $object->setSignatureAuthenticationMode($data['signature_authentication_mode']);
            unset($data['signature_authentication_mode']);
        } elseif (\array_key_exists('signature_authentication_mode', $data) && null === $data['signature_authentication_mode']) {
            $object->setSignatureAuthenticationMode(null);
            unset($data['signature_authentication_mode']);
        }
        if (\array_key_exists('signature_link', $data) && null !== $data['signature_link']) {
            $object->setSignatureLink($data['signature_link']);
            unset($data['signature_link']);
        } elseif (\array_key_exists('signature_link', $data) && null === $data['signature_link']) {
            $object->setSignatureLink(null);
            unset($data['signature_link']);
        }
        if (\array_key_exists('signature_link_expiration_date', $data) && null !== $data['signature_link_expiration_date']) {
            $date = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['signature_link_expiration_date']);
            if (false === $date) {
                throw new InvalidDateException($data['signature_link_expiration_date'], 'Y-m-d\TH:i:sP');
            }
            $object->setSignatureLinkExpirationDate($date);
            unset($data['signature_link_expiration_date']);
        } elseif (\array_key_exists('signature_link_expiration_date', $data) && null === $data['signature_link_expiration_date']) {
            $object->setSignatureLinkExpirationDate(null);
            unset($data['signature_link_expiration_date']);
        }
        if (\array_key_exists('signature_image_preview', $data) && null !== $data['signature_image_preview']) {
            $object->setSignatureImagePreview($data['signature_image_preview']);
            unset($data['signature_image_preview']);
        } elseif (\array_key_exists('signature_image_preview', $data) && null === $data['signature_image_preview']) {
            $object->setSignatureImagePreview(null);
            unset($data['signature_image_preview']);
        }
        if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
            $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], SignerRedirectUrls::class, 'json', $context));
            unset($data['redirect_urls']);
        } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
            $object->setRedirectUrls(null);
            unset($data['redirect_urls']);
        }
        if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
            $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], CustomText::class, 'json', $context));
            unset($data['custom_text']);
        } elseif (\array_key_exists('custom_text', $data) && null === $data['custom_text']) {
            $object->setCustomText(null);
            unset($data['custom_text']);
        }
        if (\array_key_exists('delivery_mode', $data) && null !== $data['delivery_mode']) {
            $object->setDeliveryMode($data['delivery_mode']);
            unset($data['delivery_mode']);
        } elseif (\array_key_exists('delivery_mode', $data) && null === $data['delivery_mode']) {
            $object->setDeliveryMode(null);
            unset($data['delivery_mode']);
        }
        if (\array_key_exists('identification_attestation_id', $data) && null !== $data['identification_attestation_id']) {
            $object->setIdentificationAttestationId($data['identification_attestation_id']);
            unset($data['identification_attestation_id']);
        } elseif (\array_key_exists('identification_attestation_id', $data) && null === $data['identification_attestation_id']) {
            $object->setIdentificationAttestationId(null);
            unset($data['identification_attestation_id']);
        }
        if (\array_key_exists('sms_notification', $data) && null !== $data['sms_notification']) {
            $object->setSmsNotification($this->denormalizer->denormalize($data['sms_notification'], SmsNotification::class, 'json', $context));
            unset($data['sms_notification']);
        } elseif (\array_key_exists('sms_notification', $data) && null === $data['sms_notification']) {
            $object->setSmsNotification(null);
            unset($data['sms_notification']);
        }
        if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
            $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], EmailNotification::class, 'json', $context));
            unset($data['email_notification']);
        } elseif (\array_key_exists('email_notification', $data) && null === $data['email_notification']) {
            $object->setEmailNotification(null);
            unset($data['email_notification']);
        }
        if (\array_key_exists('pre_identity_verification_required', $data) && null !== $data['pre_identity_verification_required']) {
            $object->setPreIdentityVerificationRequired($data['pre_identity_verification_required']);
            unset($data['pre_identity_verification_required']);
        } elseif (\array_key_exists('pre_identity_verification_required', $data) && null === $data['pre_identity_verification_required']) {
            $object->setPreIdentityVerificationRequired(null);
            unset($data['pre_identity_verification_required']);
        }
        if (\array_key_exists('verified_identity_id', $data) && null !== $data['verified_identity_id']) {
            $object->setVerifiedIdentityId($data['verified_identity_id']);
            unset($data['verified_identity_id']);
        } elseif (\array_key_exists('verified_identity_id', $data) && null === $data['verified_identity_id']) {
            $object->setVerifiedIdentityId(null);
            unset($data['verified_identity_id']);
        }
        if (\array_key_exists('recipient_stage_index', $data) && null !== $data['recipient_stage_index']) {
            $object->setRecipientStageIndex($data['recipient_stage_index']);
            unset($data['recipient_stage_index']);
        } elseif (\array_key_exists('recipient_stage_index', $data) && null === $data['recipient_stage_index']) {
            $object->setRecipientStageIndex(null);
            unset($data['recipient_stage_index']);
        }
        if (\array_key_exists('excluded_documents', $data) && null !== $data['excluded_documents']) {
            $values_1 = [];
            foreach ($data['excluded_documents'] as $value_2) {
                $values_1[] = $value_2;
            }
            $object->setExcludedDocuments($values_1);
            unset($data['excluded_documents']);
        } elseif (\array_key_exists('excluded_documents', $data) && null === $data['excluded_documents']) {
            $object->setExcludedDocuments(null);
            unset($data['excluded_documents']);
        }
        if (\array_key_exists('disabled_signing_contexts', $data) && null !== $data['disabled_signing_contexts']) {
            $values_2 = [];
            foreach ($data['disabled_signing_contexts'] as $value_3) {
                $values_2[] = $value_3;
            }
            $object->setDisabledSigningContexts($values_2);
            unset($data['disabled_signing_contexts']);
        } elseif (\array_key_exists('disabled_signing_contexts', $data) && null === $data['disabled_signing_contexts']) {
            $object->setDisabledSigningContexts(null);
            unset($data['disabled_signing_contexts']);
        }
        if (\array_key_exists('signed_at', $data) && null !== $data['signed_at']) {
            $date_1 = \DateTime::createFromFormat('Y-m-d\TH:i:sP', $data['signed_at']);
            if (false === $date_1) {
                throw new InvalidDateException($data['signed_at'], 'Y-m-d\TH:i:sP');
            }
            $object->setSignedAt($date_1);
            unset($data['signed_at']);
        } elseif (\array_key_exists('signed_at', $data) && null === $data['signed_at']) {
            $object->setSignedAt(null);
            unset($data['signed_at']);
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
        $dataArray['info'] = null === $data->getInfo() ? null : new JsonObject($this->normalizer->normalize($data->getInfo(), 'json', $context));
        $dataArray['status'] = $data->getStatus();
        $values = [];
        foreach ($data->getFields() as $value) {
            $value_1 = $value;
            if (\is_object($value)) {
                $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            } elseif (\is_object($value)) {
                $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            } elseif (\is_object($value)) {
                $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            } elseif (\is_object($value)) {
                $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            } elseif (\is_object($value)) {
                $value_1 = null === $value ? null : new JsonObject($this->normalizer->normalize($value, 'json', $context));
            }
            $values[] = $value_1;
        }
        $dataArray['fields'] = $values;
        $dataArray['signature_level'] = $data->getSignatureLevel();
        $dataArray['signature_authentication_mode'] = $data->getSignatureAuthenticationMode();
        $dataArray['signature_link'] = $data->getSignatureLink();
        $dataArray['signature_link_expiration_date'] = $data->getSignatureLinkExpirationDate()?->format('Y-m-d\TH:i:sP');
        $dataArray['signature_image_preview'] = $data->getSignatureImagePreview();
        $dataArray['redirect_urls'] = null === $data->getRedirectUrls() ? null : new JsonObject($this->normalizer->normalize($data->getRedirectUrls(), 'json', $context));
        $dataArray['custom_text'] = null === $data->getCustomText() ? null : new JsonObject($this->normalizer->normalize($data->getCustomText(), 'json', $context));
        $dataArray['delivery_mode'] = $data->getDeliveryMode();
        $dataArray['identification_attestation_id'] = $data->getIdentificationAttestationId();
        $dataArray['sms_notification'] = null === $data->getSmsNotification() ? null : new JsonObject($this->normalizer->normalize($data->getSmsNotification(), 'json', $context));
        $dataArray['email_notification'] = null === $data->getEmailNotification() ? null : new JsonObject($this->normalizer->normalize($data->getEmailNotification(), 'json', $context));
        $dataArray['pre_identity_verification_required'] = $data->getPreIdentityVerificationRequired();
        $dataArray['verified_identity_id'] = $data->getVerifiedIdentityId();
        $dataArray['recipient_stage_index'] = $data->getRecipientStageIndex();
        $values_1 = [];
        foreach ($data->getExcludedDocuments() as $value_2) {
            $values_1[] = $value_2;
        }
        $dataArray['excluded_documents'] = $values_1;
        $values_2 = [];
        foreach ($data->getDisabledSigningContexts() as $value_3) {
            $values_2[] = $value_3;
        }
        $dataArray['disabled_signing_contexts'] = $values_2;
        $dataArray['signed_at'] = $data->getSignedAt()?->format('Y-m-d\TH:i:sP');
        foreach ($data->additionalPropertyEntries() as $key => $value_4) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_4;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [Signer::class => false];
    }
}
