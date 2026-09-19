<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class NewSignerFromIdentityVerification implements AdditionalPropertiesInterface
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
     * Create a signer from an identity verification. The signature level must be set to `advanced_electronic_signature`.
     *
     * @var string|null
     */
    protected $verifiedIdentityId;
    /**
     * @var NewSignerFromIdentityVerificationInfo|null
     */
    protected $info;
    /**
     * Fields to assign to the Signer. Multiple Fields can be added simultaneously.
     *
     * @var list<array<string, mixed>>|null
     */
    protected $fields;
    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be a signer. `ordered_signers` must be enabled on the Signature Request.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     *
     * @var string|null
     */
    protected $groupWithId;
    /**
     * @var string|null
     */
    protected $signatureLevel;
    /**
     * Method to authenticate the Signers. Authentication via SMS one-time password (otp_sms) is unavailable for phone numbers in China.
     *
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var NewSignerFromScratchRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var NewSignerFromIdentityVerificationCustomText|null
     */
    protected $customText;
    /**
     * Override the delivery mode of the Signature Request for this Signer.
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * @var SmsNotification1|null
     */
    protected $smsNotification;
    /**
     * @var EmailNotification1|null
     */
    protected $emailNotification;
    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
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
     * Create a signer from an identity verification. The signature level must be set to `advanced_electronic_signature`.
     */
    public function getVerifiedIdentityId(): ?string
    {
        return $this->verifiedIdentityId;
    }

    /**
     * Create a signer from an identity verification. The signature level must be set to `advanced_electronic_signature`.
     */
    public function setVerifiedIdentityId(?string $verifiedIdentityId): self
    {
        $this->initialized['verifiedIdentityId'] = true;
        $this->verifiedIdentityId = $verifiedIdentityId;

        return $this;
    }

    public function getInfo(): ?NewSignerFromIdentityVerificationInfo
    {
        return $this->info;
    }

    public function setInfo(?NewSignerFromIdentityVerificationInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    /**
     * Fields to assign to the Signer. Multiple Fields can be added simultaneously.
     *
     * @return list<array<string, mixed>>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * Fields to assign to the Signer. Multiple Fields can be added simultaneously.
     *
     * @param list<array<string, mixed>>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be a signer. `ordered_signers` must be enabled on the Signature Request.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * ID of the recipient this one must follow in an ordered flow; they will only be asked to act after that recipient.
     * When `custom_recipient_order` is enabled, this can reference any approver or signer.
     * When `custom_recipient_order` is disabled, the referenced ID must be a signer. `ordered_signers` must be enabled on the Signature Request.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }

    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     */
    public function getGroupWithId(): ?string
    {
        return $this->groupWithId;
    }

    /**
     * ID of another recipient (Approver or Signer); both will be allowed to act in parallel in an ordered flow.
     * Only available when `custom_recipient_order` is enabled.
     */
    public function setGroupWithId(?string $groupWithId): self
    {
        $this->initialized['groupWithId'] = true;
        $this->groupWithId = $groupWithId;

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

    public function getRedirectUrls(): ?NewSignerFromScratchRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?NewSignerFromScratchRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?NewSignerFromIdentityVerificationCustomText
    {
        return $this->customText;
    }

    public function setCustomText(?NewSignerFromIdentityVerificationCustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    /**
     * Override the delivery mode of the Signature Request for this Signer.
     */
    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    /**
     * Override the delivery mode of the Signature Request for this Signer.
     */
    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }

    public function getSmsNotification(): ?SmsNotification1
    {
        return $this->smsNotification;
    }

    public function setSmsNotification(?SmsNotification1 $smsNotification): self
    {
        $this->initialized['smsNotification'] = true;
        $this->smsNotification = $smsNotification;

        return $this;
    }

    public function getEmailNotification(): ?EmailNotification1
    {
        return $this->emailNotification;
    }

    public function setEmailNotification(?EmailNotification1 $emailNotification): self
    {
        $this->initialized['emailNotification'] = true;
        $this->emailNotification = $emailNotification;

        return $this;
    }

    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
     *
     * @return list<string>|null
     */
    public function getExcludedDocuments(): ?array
    {
        return $this->excludedDocuments;
    }

    /**
     * List of Document IDs not visible to this Recipient. When omitted, the Recipient can see all Documents. Only available when the document_visibility feature is enabled on the organization.
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

    public function definedProperties(): array
    {
        return ['verifiedIdentityId' => ['verified_identity_id', 'getVerifiedIdentityId', 'setVerifiedIdentityId'], 'info' => ['info', 'getInfo', 'setInfo'], 'fields' => ['fields', 'getFields', 'setFields'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'groupWithId' => ['group_with_id', 'getGroupWithId', 'setGroupWithId'], 'signatureLevel' => ['signature_level', 'getSignatureLevel', 'setSignatureLevel'], 'signatureAuthenticationMode' => ['signature_authentication_mode', 'getSignatureAuthenticationMode', 'setSignatureAuthenticationMode'], 'redirectUrls' => ['redirect_urls', 'getRedirectUrls', 'setRedirectUrls'], 'customText' => ['custom_text', 'getCustomText', 'setCustomText'], 'deliveryMode' => ['delivery_mode', 'getDeliveryMode', 'setDeliveryMode'], 'smsNotification' => ['sms_notification', 'getSmsNotification', 'setSmsNotification'], 'emailNotification' => ['email_notification', 'getEmailNotification', 'setEmailNotification'], 'excludedDocuments' => ['excluded_documents', 'getExcludedDocuments', 'setExcludedDocuments'], 'disabledSigningContexts' => ['disabled_signing_contexts', 'getDisabledSigningContexts', 'setDisabledSigningContexts']];
    }
}
