<?php

namespace Qdequippe\Yousign\Api\Model;

class EmbeddedSignerWithSignatureLink extends \ArrayObject
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
     * @var string|null
     */
    protected $status;
    /**
     * @var string|null
     */
    protected $signatureLink;
    /**
     * @var \DateTime|null
     */
    protected $signatureLinkExpirationDate;

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
}
