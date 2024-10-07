<?php

namespace Qdequippe\Yousign\Api\Model;

class CreateSignerConsentRequest extends \ArrayObject
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
     * Type of the Signer Consent Request.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Settings relative to Signer Consent Request's type.
     *
     * @var CreateSignerConsentRequestSettings|null
     */
    protected $settings;
    /**
     * Define if the Signer Consent Request is optional for Signers.
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Ids of Signers to request a consent.
     *
     * @var list<string>|null
     */
    protected $signerIds;
    /**
     * Insert just after the position of the specified Signer Consent Request id.
     *
     * @var string|null
     */
    protected $insertAfterId;

    /**
     * Type of the Signer Consent Request.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the Signer Consent Request.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Settings relative to Signer Consent Request's type.
     */
    public function getSettings(): ?CreateSignerConsentRequestSettings
    {
        return $this->settings;
    }

    /**
     * Settings relative to Signer Consent Request's type.
     */
    public function setSettings(?CreateSignerConsentRequestSettings $settings): self
    {
        $this->initialized['settings'] = true;
        $this->settings = $settings;

        return $this;
    }

    /**
     * Define if the Signer Consent Request is optional for Signers.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Define if the Signer Consent Request is optional for Signers.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

        return $this;
    }

    /**
     * Ids of Signers to request a consent.
     *
     * @return list<string>|null
     */
    public function getSignerIds(): ?array
    {
        return $this->signerIds;
    }

    /**
     * Ids of Signers to request a consent.
     *
     * @param list<string>|null $signerIds
     */
    public function setSignerIds(?array $signerIds): self
    {
        $this->initialized['signerIds'] = true;
        $this->signerIds = $signerIds;

        return $this;
    }

    /**
     * Insert just after the position of the specified Signer Consent Request id.
     */
    public function getInsertAfterId(): ?string
    {
        return $this->insertAfterId;
    }

    /**
     * Insert just after the position of the specified Signer Consent Request id.
     */
    public function setInsertAfterId(?string $insertAfterId): self
    {
        $this->initialized['insertAfterId'] = true;
        $this->insertAfterId = $insertAfterId;

        return $this;
    }
}
