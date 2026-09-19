<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestPlaceholderSignerSubstituteFromUserIdInput
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
     * Placeholder label defined in the template to substitute.
     *
     * @var string|null
     */
    protected $label;
    /**
     * Create signer from an existing user.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * Legal level of the electronic signature required from the substitute Signer.
     *
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
     * @var SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var SignatureRequestSignerFromInfoInputCustomText|null
     */
    protected $customText;
    /**
     * Override the delivery mode of the Signature Request for this Signer.
     *
     * @var string|null
     */
    protected $deliveryMode;

    /**
     * Placeholder label defined in the template to substitute.
     */
    public function getLabel(): ?string
    {
        return $this->label;
    }

    /**
     * Placeholder label defined in the template to substitute.
     */
    public function setLabel(?string $label): self
    {
        $this->initialized['label'] = true;
        $this->label = $label;

        return $this;
    }

    /**
     * Create signer from an existing user.
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * Create signer from an existing user.
     */
    public function setUserId(?string $userId): self
    {
        $this->initialized['userId'] = true;
        $this->userId = $userId;

        return $this;
    }

    /**
     * Legal level of the electronic signature required from the substitute Signer.
     */
    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    /**
     * Legal level of the electronic signature required from the substitute Signer.
     */
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

    public function getRedirectUrls(): ?SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignatureRequestPlaceholderSignerSubstituteFromInfoInputRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?SignatureRequestSignerFromInfoInputCustomText
    {
        return $this->customText;
    }

    public function setCustomText(?SignatureRequestSignerFromInfoInputCustomText $customText): self
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
