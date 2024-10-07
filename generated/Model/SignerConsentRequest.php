<?php

namespace Qdequippe\Yousign\Api\Model;

class SignerConsentRequest extends \ArrayObject
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
     * Unique identifier of the Signer Consent Request.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Type of the Signer Consent Request.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Settings relative to Signer Consent Request's type.
     *
     * @var SignerConsentRequestSettings|null
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
     * Unique identifier of the Signer Consent Request.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Signer Consent Request.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

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
    public function getSettings(): ?SignerConsentRequestSettings
    {
        return $this->settings;
    }

    /**
     * Settings relative to Signer Consent Request's type.
     */
    public function setSettings(?SignerConsentRequestSettings $settings): self
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
}
