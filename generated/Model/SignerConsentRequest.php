<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignerConsentRequest implements AdditionalPropertiesInterface
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
     * Ids of Signers to request a consent. Empty when every Signer attached to the consent has been deleted from the Signature Request.
     *
     * @var list<string>|null
     */
    protected $signerIds;
    /**
     * The Document id to which it is linked.
     *
     * @var string|null
     */
    protected $documentId;

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
     * Ids of Signers to request a consent. Empty when every Signer attached to the consent has been deleted from the Signature Request.
     *
     * @return list<string>|null
     */
    public function getSignerIds(): ?array
    {
        return $this->signerIds;
    }

    /**
     * Ids of Signers to request a consent. Empty when every Signer attached to the consent has been deleted from the Signature Request.
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
     * The Document id to which it is linked.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * The Document id to which it is linked.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'type' => ['type', 'getType', 'setType'], 'settings' => ['settings', 'getSettings', 'setSettings'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'signerIds' => ['signer_ids', 'getSignerIds', 'setSignerIds'], 'documentId' => ['document_id', 'getDocumentId', 'setDocumentId']];
    }
}
