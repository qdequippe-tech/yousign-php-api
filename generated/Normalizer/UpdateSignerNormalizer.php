<?php

namespace Qdequippe\Yousign\Api\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use Qdequippe\Yousign\Api\Model\EmailNotification1;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchCustomText;
use Qdequippe\Yousign\Api\Model\NewSignerFromScratchRedirectUrls;
use Qdequippe\Yousign\Api\Model\UpdateSigner;
use Qdequippe\Yousign\Api\Model\UpdateSignerInfo;
use Qdequippe\Yousign\Api\Runtime\JsonObject;
use Qdequippe\Yousign\Api\Runtime\Normalizer\CheckArray;
use Qdequippe\Yousign\Api\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class UpdateSignerNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use CheckArray;
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use ValidatorTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return UpdateSigner::class === $type;
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return \is_object($data) && UpdateSigner::class === $data::class;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $object = new UpdateSigner();
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
        if (\array_key_exists('info', $data) && null !== $data['info']) {
            $object->setInfo($this->denormalizer->denormalize($data['info'], UpdateSignerInfo::class, 'json', $context));
            unset($data['info']);
        } elseif (\array_key_exists('info', $data) && null === $data['info']) {
            $object->setInfo(null);
            unset($data['info']);
        }
        if (\array_key_exists('insert_after_id', $data) && null !== $data['insert_after_id']) {
            $object->setInsertAfterId($data['insert_after_id']);
            unset($data['insert_after_id']);
        } elseif (\array_key_exists('insert_after_id', $data) && null === $data['insert_after_id']) {
            $object->setInsertAfterId(null);
            unset($data['insert_after_id']);
        }
        if (\array_key_exists('group_with_id', $data) && null !== $data['group_with_id']) {
            $object->setGroupWithId($data['group_with_id']);
            unset($data['group_with_id']);
        } elseif (\array_key_exists('group_with_id', $data) && null === $data['group_with_id']) {
            $object->setGroupWithId(null);
            unset($data['group_with_id']);
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
        if (\array_key_exists('redirect_urls', $data) && null !== $data['redirect_urls']) {
            $object->setRedirectUrls($this->denormalizer->denormalize($data['redirect_urls'], NewSignerFromScratchRedirectUrls::class, 'json', $context));
            unset($data['redirect_urls']);
        } elseif (\array_key_exists('redirect_urls', $data) && null === $data['redirect_urls']) {
            $object->setRedirectUrls(null);
            unset($data['redirect_urls']);
        }
        if (\array_key_exists('custom_text', $data) && null !== $data['custom_text']) {
            $object->setCustomText($this->denormalizer->denormalize($data['custom_text'], NewSignerFromScratchCustomText::class, 'json', $context));
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
        if (\array_key_exists('email_notification', $data) && null !== $data['email_notification']) {
            $object->setEmailNotification($this->denormalizer->denormalize($data['email_notification'], EmailNotification1::class, 'json', $context));
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
        if (\array_key_exists('excluded_documents', $data) && null !== $data['excluded_documents']) {
            $values = [];
            foreach ($data['excluded_documents'] as $value) {
                $values[] = $value;
            }
            $object->setExcludedDocuments($values);
            unset($data['excluded_documents']);
        } elseif (\array_key_exists('excluded_documents', $data) && null === $data['excluded_documents']) {
            $object->setExcludedDocuments(null);
            unset($data['excluded_documents']);
        }
        if (\array_key_exists('disabled_signing_contexts', $data) && null !== $data['disabled_signing_contexts']) {
            $values_1 = [];
            foreach ($data['disabled_signing_contexts'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setDisabledSigningContexts($values_1);
            unset($data['disabled_signing_contexts']);
        } elseif (\array_key_exists('disabled_signing_contexts', $data) && null === $data['disabled_signing_contexts']) {
            $object->setDisabledSigningContexts(null);
            unset($data['disabled_signing_contexts']);
        }
        foreach ($data as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $object[$key] = $value_2;
            }
        }

        return $object;
    }

    public function normalize(mixed $data, ?string $format = null, array $context = []): array|string|int|float|bool|\ArrayObject|null
    {
        $dataArray = [];
        if ($data->isInitialized('info') && null !== $data->getInfo()) {
            $dataArray['info'] = null === $data->getInfo() ? null : new JsonObject($this->normalizer->normalize($data->getInfo(), 'json', $context));
        }
        if ($data->isInitialized('insertAfterId') && null !== $data->getInsertAfterId()) {
            $dataArray['insert_after_id'] = $data->getInsertAfterId();
        }
        if ($data->isInitialized('groupWithId') && null !== $data->getGroupWithId()) {
            $dataArray['group_with_id'] = $data->getGroupWithId();
        }
        if ($data->isInitialized('signatureLevel') && null !== $data->getSignatureLevel()) {
            $dataArray['signature_level'] = $data->getSignatureLevel();
        }
        if ($data->isInitialized('signatureAuthenticationMode') && null !== $data->getSignatureAuthenticationMode()) {
            $dataArray['signature_authentication_mode'] = $data->getSignatureAuthenticationMode();
        }
        if ($data->isInitialized('redirectUrls') && null !== $data->getRedirectUrls()) {
            $dataArray['redirect_urls'] = null === $data->getRedirectUrls() ? null : new JsonObject($this->normalizer->normalize($data->getRedirectUrls(), 'json', $context));
        }
        if ($data->isInitialized('customText') && null !== $data->getCustomText()) {
            $dataArray['custom_text'] = null === $data->getCustomText() ? null : new JsonObject($this->normalizer->normalize($data->getCustomText(), 'json', $context));
        }
        if ($data->isInitialized('deliveryMode') && null !== $data->getDeliveryMode()) {
            $dataArray['delivery_mode'] = $data->getDeliveryMode();
        }
        if ($data->isInitialized('identificationAttestationId') && null !== $data->getIdentificationAttestationId()) {
            $dataArray['identification_attestation_id'] = $data->getIdentificationAttestationId();
        }
        if ($data->isInitialized('emailNotification') && null !== $data->getEmailNotification()) {
            $dataArray['email_notification'] = null === $data->getEmailNotification() ? null : new JsonObject($this->normalizer->normalize($data->getEmailNotification(), 'json', $context));
        }
        if ($data->isInitialized('preIdentityVerificationRequired') && null !== $data->getPreIdentityVerificationRequired()) {
            $dataArray['pre_identity_verification_required'] = $data->getPreIdentityVerificationRequired();
        }
        if ($data->isInitialized('excludedDocuments') && null !== $data->getExcludedDocuments()) {
            $values = [];
            foreach ($data->getExcludedDocuments() as $value) {
                $values[] = $value;
            }
            $dataArray['excluded_documents'] = $values;
        }
        if ($data->isInitialized('disabledSigningContexts') && null !== $data->getDisabledSigningContexts()) {
            $values_1 = [];
            foreach ($data->getDisabledSigningContexts() as $value_1) {
                $values_1[] = $value_1;
            }
            $dataArray['disabled_signing_contexts'] = $values_1;
        }
        foreach ($data->additionalPropertyEntries() as $key => $value_2) {
            if (preg_match('/.*/', (string) $key)) {
                $dataArray[$key] = $value_2;
            }
        }

        return $dataArray;
    }

    public function getSupportedTypes(?string $format = null): array
    {
        return [UpdateSigner::class => false];
    }
}
