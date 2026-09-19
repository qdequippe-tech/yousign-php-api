<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Signer implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * @var string|null
     */
    protected $id;
    /**
     * @var SignerInfo|null
     */
    protected $info;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var list<FieldSignature>|list<FieldText>|list<FieldMention>|list<FieldCheckbox>|list<FieldRadioButtonGroup>|null
     */
    protected $fields;
    /**
     * @var string|null
     */
    protected $signatureLevel = 'electronic_signature';
    /**
     * Method to authenticate the Signers. Authentication via SMS one-time password (otp_sms) is unavailable for phone numbers in China.
     *
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var string|null
     */
    protected $signatureLink;
    /**
     * @var \DateTime|null
     */
    protected $signatureLinkExpirationDate;
    /**
     * @var string|null
     */
    protected $signatureImagePreview;
    /**
     * @var SignerRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * Custom Text.
     *
     * @var CustomText|null
     */
    protected $customText;
    /**
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * @var string|null
     */
    protected $identificationAttestationId;
    /**
     * @var SmsNotification|null
     */
    protected $smsNotification;
    /**
     * @var EmailNotification|null
     */
    protected $emailNotification;
    /**
     * @var bool|null
     */
    protected $preIdentityVerificationRequired;
    /**
     * @var string|null
     */
    protected $verifiedIdentityId;
    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     *
     * @var int|null
     */
    protected $recipientStageIndex;
    /**
     * List of Document IDs not visible to this Signer.
     *
     * @var list<string>|null
     */
    protected $excludedDocuments;
    /**
     * Allows you to make Signature Requests unavailable in the contexts specified in this setting.
     *
     * @var list<string>|null
     */
    protected $disabledSigningContexts = [];
    /**
     * Timestamp indicating when the Signer completed their signature. Returns null otherwise.
     *
     * @var \DateTime|null
     */
    protected $signedAt;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getInfo(): ?SignerInfo
    {
        return $this->info;
    }

    public function setInfo(?SignerInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * @return list<FieldSignature>|list<FieldText>|list<FieldMention>|list<FieldCheckbox>|list<FieldRadioButtonGroup>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param list<FieldSignature>|list<FieldText>|list<FieldMention>|list<FieldCheckbox>|list<FieldRadioButtonGroup>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    public function setSignatureLevel(?string $signatureLevel): self
    {
        $this->initialized['signatureLevel'] = true;
        $this->signatureLevel = $signatureLevel;

        return $this;
    }

    /**
     * Method to authenticate the Signers. Authentication via SMS one-time password (otp_sms) is unavailable for phone numbers in China.
     */
    public function getSignatureAuthenticationMode(): ?string
    {
        return $this->signatureAuthenticationMode;
    }

    /**
     * Method to authenticate the Signers. Authentication via SMS one-time password (otp_sms) is unavailable for phone numbers in China.
     */
    public function setSignatureAuthenticationMode(?string $signatureAuthenticationMode): self
    {
        $this->initialized['signatureAuthenticationMode'] = true;
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;

        return $this;
    }

    public function getSignatureLink(): ?string
    {
        return $this->signatureLink;
    }

    public function setSignatureLink(?string $signatureLink): self
    {
        $this->initialized['signatureLink'] = true;
        $this->signatureLink = $signatureLink;

        return $this;
    }

    public function getSignatureLinkExpirationDate(): ?\DateTime
    {
        return $this->signatureLinkExpirationDate;
    }

    public function setSignatureLinkExpirationDate(?\DateTime $signatureLinkExpirationDate): self
    {
        $this->initialized['signatureLinkExpirationDate'] = true;
        $this->signatureLinkExpirationDate = $signatureLinkExpirationDate;

        return $this;
    }

    public function getSignatureImagePreview(): ?string
    {
        return $this->signatureImagePreview;
    }

    public function setSignatureImagePreview(?string $signatureImagePreview): self
    {
        $this->initialized['signatureImagePreview'] = true;
        $this->signatureImagePreview = $signatureImagePreview;

        return $this;
    }

    public function getRedirectUrls(): ?SignerRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignerRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    /**
     * Custom Text.
     */
    public function getCustomText(): ?CustomText
    {
        return $this->customText;
    }

    /**
     * Custom Text.
     */
    public function setCustomText(?CustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }

    public function getIdentificationAttestationId(): ?string
    {
        return $this->identificationAttestationId;
    }

    public function setIdentificationAttestationId(?string $identificationAttestationId): self
    {
        $this->initialized['identificationAttestationId'] = true;
        $this->identificationAttestationId = $identificationAttestationId;

        return $this;
    }

    public function getSmsNotification(): ?SmsNotification
    {
        return $this->smsNotification;
    }

    public function setSmsNotification(?SmsNotification $smsNotification): self
    {
        $this->initialized['smsNotification'] = true;
        $this->smsNotification = $smsNotification;

        return $this;
    }

    public function getEmailNotification(): ?EmailNotification
    {
        return $this->emailNotification;
    }

    public function setEmailNotification(?EmailNotification $emailNotification): self
    {
        $this->initialized['emailNotification'] = true;
        $this->emailNotification = $emailNotification;

        return $this;
    }

    public function getPreIdentityVerificationRequired(): ?bool
    {
        return $this->preIdentityVerificationRequired;
    }

    public function setPreIdentityVerificationRequired(?bool $preIdentityVerificationRequired): self
    {
        $this->initialized['preIdentityVerificationRequired'] = true;
        $this->preIdentityVerificationRequired = $preIdentityVerificationRequired;

        return $this;
    }

    public function getVerifiedIdentityId(): ?string
    {
        return $this->verifiedIdentityId;
    }

    public function setVerifiedIdentityId(?string $verifiedIdentityId): self
    {
        $this->initialized['verifiedIdentityId'] = true;
        $this->verifiedIdentityId = $verifiedIdentityId;

        return $this;
    }

    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     */
    public function getRecipientStageIndex(): ?int
    {
        return $this->recipientStageIndex;
    }

    /**
     * Position of the recipient in the signing flow. Recipients with the same index are notified simultaneously.
     */
    public function setRecipientStageIndex(?int $recipientStageIndex): self
    {
        $this->initialized['recipientStageIndex'] = true;
        $this->recipientStageIndex = $recipientStageIndex;

        return $this;
    }

    /**
     * List of Document IDs not visible to this Signer.
     *
     * @return list<string>|null
     */
    public function getExcludedDocuments(): ?array
    {
        return $this->excludedDocuments;
    }

    /**
     * List of Document IDs not visible to this Signer.
     *
     * @param list<string>|null $excludedDocuments
     */
    public function setExcludedDocuments(?array $excludedDocuments): self
    {
        $this->initialized['excludedDocuments'] = true;
        $this->excludedDocuments = $excludedDocuments;

        return $this;
    }

    /**
     * Allows you to make Signature Requests unavailable in the contexts specified in this setting.
     *
     * @return list<string>|null
     */
    public function getDisabledSigningContexts(): ?array
    {
        return $this->disabledSigningContexts;
    }

    /**
     * Allows you to make Signature Requests unavailable in the contexts specified in this setting.
     *
     * @param list<string>|null $disabledSigningContexts
     */
    public function setDisabledSigningContexts(?array $disabledSigningContexts): self
    {
        $this->initialized['disabledSigningContexts'] = true;
        $this->disabledSigningContexts = $disabledSigningContexts;

        return $this;
    }

    /**
     * Timestamp indicating when the Signer completed their signature. Returns null otherwise.
     */
    public function getSignedAt(): ?\DateTime
    {
        return $this->signedAt;
    }

    /**
     * Timestamp indicating when the Signer completed their signature. Returns null otherwise.
     */
    public function setSignedAt(?\DateTime $signedAt): self
    {
        $this->initialized['signedAt'] = true;
        $this->signedAt = $signedAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'info' => ['info', 'getInfo', 'setInfo'], 'status' => ['status', 'getStatus', 'setStatus'], 'fields' => ['fields', 'getFields', 'setFields'], 'signatureLevel' => ['signature_level', 'getSignatureLevel', 'setSignatureLevel'], 'signatureAuthenticationMode' => ['signature_authentication_mode', 'getSignatureAuthenticationMode', 'setSignatureAuthenticationMode'], 'signatureLink' => ['signature_link', 'getSignatureLink', 'setSignatureLink'], 'signatureLinkExpirationDate' => ['signature_link_expiration_date', 'getSignatureLinkExpirationDate', 'setSignatureLinkExpirationDate'], 'signatureImagePreview' => ['signature_image_preview', 'getSignatureImagePreview', 'setSignatureImagePreview'], 'redirectUrls' => ['redirect_urls', 'getRedirectUrls', 'setRedirectUrls'], 'customText' => ['custom_text', 'getCustomText', 'setCustomText'], 'deliveryMode' => ['delivery_mode', 'getDeliveryMode', 'setDeliveryMode'], 'identificationAttestationId' => ['identification_attestation_id', 'getIdentificationAttestationId', 'setIdentificationAttestationId'], 'smsNotification' => ['sms_notification', 'getSmsNotification', 'setSmsNotification'], 'emailNotification' => ['email_notification', 'getEmailNotification', 'setEmailNotification'], 'preIdentityVerificationRequired' => ['pre_identity_verification_required', 'getPreIdentityVerificationRequired', 'setPreIdentityVerificationRequired'], 'verifiedIdentityId' => ['verified_identity_id', 'getVerifiedIdentityId', 'setVerifiedIdentityId'], 'recipientStageIndex' => ['recipient_stage_index', 'getRecipientStageIndex', 'setRecipientStageIndex'], 'excludedDocuments' => ['excluded_documents', 'getExcludedDocuments', 'setExcludedDocuments'], 'disabledSigningContexts' => ['disabled_signing_contexts', 'getDisabledSigningContexts', 'setDisabledSigningContexts'], 'signedAt' => ['signed_at', 'getSignedAt', 'setSignedAt']];
    }
}
