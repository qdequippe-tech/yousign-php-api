<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class EmbeddedSignerWithSignatureLink implements AdditionalPropertiesInterface
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
     * Unique identifier of the Signer.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Current status of the Signer.
     *
     * @var string|null
     */
    protected $status;
    /**
     * Signature link for the Signer; `null` when `delivery_mode` is `email`.
     *
     * @var string|null
     */
    protected $signatureLink;
    /**
     * Expiration timestamp of the signature link.
     *
     * @var \DateTime|null
     */
    protected $signatureLinkExpirationDate;

    /**
     * Unique identifier of the Signer.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the Signer.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Current status of the Signer.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Current status of the Signer.
     */
    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * Signature link for the Signer; `null` when `delivery_mode` is `email`.
     */
    public function getSignatureLink(): ?string
    {
        return $this->signatureLink;
    }

    /**
     * Signature link for the Signer; `null` when `delivery_mode` is `email`.
     */
    public function setSignatureLink(?string $signatureLink): self
    {
        $this->initialized['signatureLink'] = true;
        $this->signatureLink = $signatureLink;

        return $this;
    }

    /**
     * Expiration timestamp of the signature link.
     */
    public function getSignatureLinkExpirationDate(): ?\DateTime
    {
        return $this->signatureLinkExpirationDate;
    }

    /**
     * Expiration timestamp of the signature link.
     */
    public function setSignatureLinkExpirationDate(?\DateTime $signatureLinkExpirationDate): self
    {
        $this->initialized['signatureLinkExpirationDate'] = true;
        $this->signatureLinkExpirationDate = $signatureLinkExpirationDate;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'status' => ['status', 'getStatus', 'setStatus'], 'signatureLink' => ['signature_link', 'getSignatureLink', 'setSignatureLink'], 'signatureLinkExpirationDate' => ['signature_link_expiration_date', 'getSignatureLinkExpirationDate', 'setSignatureLinkExpirationDate']];
    }
}
