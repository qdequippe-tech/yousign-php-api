<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateSignerConsentRequest implements AdditionalPropertiesInterface
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
     * Insert just after the position of the specified Signer Consent Request id.
     *
     * @var string|null
     */
    protected $insertAfterId;
    /**
     * Link the Signer Consent Request to a given Document by its id.
     *
     * @var string|null
     */
    protected $documentId;

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

    /**
     * Link the Signer Consent Request to a given Document by its id.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Link the Signer Consent Request to a given Document by its id.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['settings' => ['settings', 'getSettings', 'setSettings'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'insertAfterId' => ['insert_after_id', 'getInsertAfterId', 'setInsertAfterId'], 'documentId' => ['document_id', 'getDocumentId', 'setDocumentId']];
    }
}
