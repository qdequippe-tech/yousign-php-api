<?php

namespace Qdequippe\Yousign\Api\Model;

class FromExistingUser1 extends \ArrayObject
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
     * Create signer from an existing user.
     *
     * @var string|null
     */
    protected $userId;
    /**
     * @var list<array<string, mixed>>|null
     */
    protected $fields;
    /**
     * Insert just after the position of the specified signer id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * @var string|null
     */
    protected $signatureLevel;
    /**
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var FromScratch1RedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var FromScratch1CustomText|null
     */
    protected $customText;
    /**
     * Override the delivery mode of the Signature Request for this Signer.
     *
     * @var string|null
     */
    protected $deliveryMode;
    /**
     * @var string|null
     */
    protected $identificationAttestationId;
    /**
     * @var SmsNotification1|null
     */
    protected $smsNotification;
    /**
     * @var EmailNotification1|null
     */
    protected $emailNotification;

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
     * @return list<array<string, mixed>>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param list<array<string, mixed>>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

        return $this;
    }

    /**
     * Insert just after the position of the specified signer id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified signer id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

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

    public function getSignatureAuthenticationMode(): ?string
    {
        return $this->signatureAuthenticationMode;
    }

    public function setSignatureAuthenticationMode(?string $signatureAuthenticationMode): self
    {
        $this->initialized['signatureAuthenticationMode'] = true;
        $this->signatureAuthenticationMode = $signatureAuthenticationMode;

        return $this;
    }

    public function getRedirectUrls(): ?FromScratch1RedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?FromScratch1RedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?FromScratch1CustomText
    {
        return $this->customText;
    }

    public function setCustomText(?FromScratch1CustomText $customText): self
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
}
