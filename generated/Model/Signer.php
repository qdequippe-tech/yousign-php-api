<?php

namespace Qdequippe\Yousign\Api\Model;

class Signer extends \ArrayObject
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
    protected $id;
    /**
     * @var SignerInfo|null
     */
    protected $info;
    /**
     * @var string|null
     */
    protected $status;
    /**
     * @var list<mixed>|null
     */
    protected $fields;
    /**
     * @var string|null
     */
    protected $signatureLevel = 'electronic_signature';
    /**
     * @var string|null
     */
    protected $signatureAuthenticationMode;
    /**
     * @var string|null
     */
    protected $signatureLink;
    /**
     * @var \DateTime|null
     */
    protected $signatureLinkExpirationDate;
    /**
     * @var string|null
     */
    protected $signatureImagePreview;
    /**
     * @var SignerRedirectUrls|null
     */
    protected $redirectUrls;
    /**
     * @var SignerCustomText|null
     */
    protected $customText;
    /**
     * @var string|null
     */
    protected $deliveryMode;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getInfo(): ?SignerInfo
    {
        return $this->info;
    }

    public function setInfo(?SignerInfo $info): self
    {
        $this->initialized['info'] = true;
        $this->info = $info;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->initialized['status'] = true;
        $this->status = $status;

        return $this;
    }

    /**
     * @return list<mixed>|null
     */
    public function getFields(): ?array
    {
        return $this->fields;
    }

    /**
     * @param list<mixed>|null $fields
     */
    public function setFields(?array $fields): self
    {
        $this->initialized['fields'] = true;
        $this->fields = $fields;

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

    public function getSignatureLink(): ?string
    {
        return $this->signatureLink;
    }

    public function setSignatureLink(?string $signatureLink): self
    {
        $this->initialized['signatureLink'] = true;
        $this->signatureLink = $signatureLink;

        return $this;
    }

    public function getSignatureLinkExpirationDate(): ?\DateTime
    {
        return $this->signatureLinkExpirationDate;
    }

    public function setSignatureLinkExpirationDate(?\DateTime $signatureLinkExpirationDate): self
    {
        $this->initialized['signatureLinkExpirationDate'] = true;
        $this->signatureLinkExpirationDate = $signatureLinkExpirationDate;

        return $this;
    }

    public function getSignatureImagePreview(): ?string
    {
        return $this->signatureImagePreview;
    }

    public function setSignatureImagePreview(?string $signatureImagePreview): self
    {
        $this->initialized['signatureImagePreview'] = true;
        $this->signatureImagePreview = $signatureImagePreview;

        return $this;
    }

    public function getRedirectUrls(): ?SignerRedirectUrls
    {
        return $this->redirectUrls;
    }

    public function setRedirectUrls(?SignerRedirectUrls $redirectUrls): self
    {
        $this->initialized['redirectUrls'] = true;
        $this->redirectUrls = $redirectUrls;

        return $this;
    }

    public function getCustomText(): ?SignerCustomText
    {
        return $this->customText;
    }

    public function setCustomText(?SignerCustomText $customText): self
    {
        $this->initialized['customText'] = true;
        $this->customText = $customText;

        return $this;
    }

    public function getDeliveryMode(): ?string
    {
        return $this->deliveryMode;
    }

    public function setDeliveryMode(?string $deliveryMode): self
    {
        $this->initialized['deliveryMode'] = true;
        $this->deliveryMode = $deliveryMode;

        return $this;
    }
}
