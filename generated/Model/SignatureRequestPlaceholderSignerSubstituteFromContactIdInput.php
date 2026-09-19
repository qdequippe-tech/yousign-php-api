<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestPlaceholderSignerSubstituteFromContactIdInput
{
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
    protected $label;
    /**
     * Create signer from an existing contact.
     *
     * @var string|null
     */
    protected $contactId;
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
     * @var SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomText|null
     */
    protected $customText;
    /**
     * Override the delivery mode of the Signature Request for this Signer.
     *
     * @var string|null
     */
    protected $deliveryMode;

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * Create signer from an existing contact.
     */
    public function getContactId(): ?string
    {
        return $this->contactId;
    }

    /**
     * Create signer from an existing contact.
     */
    public function setContactId(?string $contactId): self
    {
        $this->initialized['contactId'] = true;
        $this->contactId = $contactId;

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

    public function getRedirectUrls(): ?SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignatureRequestPlaceholderSignerSubstituteFromContactIdInputRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomText
    {
        return $this->customText;
    }

    public function setCustomText(?SignatureRequestPlaceholderSignerSubstituteFromContactIdInputCustomText $customText): self
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
}
