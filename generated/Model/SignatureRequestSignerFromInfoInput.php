<?php

namespace Qdequippe\Yousign\Api\Model;

class SignatureRequestSignerFromInfoInput
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
     * Signer identity when creating from raw info.
     *
     * @var SignatureRequestSignerFromInfoInputInfo|null
     */
    protected $info;
    /**
     * Fields placed on Documents for this Signer.
     *
     * @var list<array<string, mixed>>|null
     */
    protected $fields;
    /**
     * Legal level of the electronic signature required from the Signer.
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
     * @var SignatureRequestSignerFromInfoInputRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var SignatureRequestSignerFromInfoInputCustomText|null
     */
    protected $customText;
    /**
     * Defines the way the Signer's Identity Documents will be uploaded for Verification. If set to `true`, `signature_level`should be equal to `advanced_electronic_signature` and `delivery_mode` set to `none`.
     *
     * @var bool|null
     */
    protected $preIdentityVerificationRequired;

    /**
     * Signer identity when creating from raw info.
     */
    public function getInfo(): ?SignatureRequestSignerFromInfoInputInfo
    {
        return $this->info;
    }

    /**
     * Signer identity when creating from raw info.
     */
    public function setInfo(?SignatureRequestSignerFromInfoInputInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    /**
     * Fields placed on Documents for this Signer.
     *
     * @return list<array<string, mixed>>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * Fields placed on Documents for this Signer.
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
     * Legal level of the electronic signature required from the Signer.
     */
    public function getSignatureLevel(): ?string
    {
        return $this->signatureLevel;
    }

    /**
     * Legal level of the electronic signature required from the Signer.
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

    public function getRedirectUrls(): ?SignatureRequestSignerFromInfoInputRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignatureRequestSignerFromInfoInputRedirectUrls $redirectUrls): self
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
     * Defines the way the Signer's Identity Documents will be uploaded for Verification. If set to `true`, `signature_level`should be equal to `advanced_electronic_signature` and `delivery_mode` set to `none`.
     */
    public function getPreIdentityVerificationRequired(): ?bool
    {
        return $this->preIdentityVerificationRequired;
    }

    /**
     * Defines the way the Signer's Identity Documents will be uploaded for Verification. If set to `true`, `signature_level`should be equal to `advanced_electronic_signature` and `delivery_mode` set to `none`.
     */
    public function setPreIdentityVerificationRequired(?bool $preIdentityVerificationRequired): self
    {
        $this->initialized['preIdentityVerificationRequired'] = true;
        $this->preIdentityVerificationRequired = $preIdentityVerificationRequired;

        return $this;
    }
}
