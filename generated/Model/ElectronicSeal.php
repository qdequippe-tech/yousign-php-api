<?php

namespace Qdequippe\Yousign\Api\Model;

class ElectronicSeal extends \ArrayObject
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
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * @var string|null
     */
    protected $documentId;
    /**
     * @var bool|null
     */
    protected $timestamp;
    /**
     * @var string|null
     */
    protected $imageId;
    /**
     * Store a custom id that will be added to webhooks.
     *
     * @var string|null
     */
    protected $externalId;
    /**
     * @var string|null
     */
    protected $signatureLevel;

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

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    public function getTimestamp(): ?bool
    {
        return $this->timestamp;
    }

    public function setTimestamp(?bool $timestamp): self
    {
        $this->initialized['timestamp'] = true;
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getImageId(): ?string
    {
        return $this->imageId;
    }

    public function setImageId(?string $imageId): self
    {
        $this->initialized['imageId'] = true;
        $this->imageId = $imageId;

        return $this;
    }

    /**
     * Store a custom id that will be added to webhooks.
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * Store a custom id that will be added to webhooks.
     */
    public function setExternalId(?string $externalId): self
    {
        $this->initialized['externalId'] = true;
        $this->externalId = $externalId;

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
}
