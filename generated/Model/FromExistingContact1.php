<?php

namespace Qdequippe\Yousign\Api\Model;

class FromExistingContact1 extends \ArrayObject
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
     * Create signer from an existing contact.
     *
     * @var string|null
     */
    protected $contactId;
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
}
