<?php

namespace Qdequippe\Yousign\Api\Model;

class Document extends \ArrayObject
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
    protected $filename;
    /**
     * @var string|null
     */
    protected $nature;
    /**
     * @var string|null
     */
    protected $contentType;
    /**
     * Sha256 checksum.
     *
     * @var string|null
     */
    protected $sha256;
    /**
     * @var bool|null
     */
    protected $isProtected;
    /**
     * @var bool|null
     */
    protected $isSigned;
    /**
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Number of pages for signable document.
     *
     * @var int|null
     */
    protected $totalPages;
    /**
     * If protected by password and not yet unlocked.
     *
     * @var bool|null
     */
    protected $isLocked;
    /**
     * @var DocumentInitials|null
     */
    protected $initials;
    /**
     * Number of parsed anchors from the document.
     *
     * @var int|null
     */
    protected $totalAnchors;

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

    public function getFilename(): ?string
    {
        return $this->filename;
    }

    public function setFilename(?string $filename): self
    {
        $this->initialized['filename'] = true;
        $this->filename = $filename;

        return $this;
    }

    public function getNature(): ?string
    {
        return $this->nature;
    }

    public function setNature(?string $nature): self
    {
        $this->initialized['nature'] = true;
        $this->nature = $nature;

        return $this;
    }

    public function getContentType(): ?string
    {
        return $this->contentType;
    }

    public function setContentType(?string $contentType): self
    {
        $this->initialized['contentType'] = true;
        $this->contentType = $contentType;

        return $this;
    }

    /**
     * Sha256 checksum.
     */
    public function getSha256(): ?string
    {
        return $this->sha256;
    }

    /**
     * Sha256 checksum.
     */
    public function setSha256(?string $sha256): self
    {
        $this->initialized['sha256'] = true;
        $this->sha256 = $sha256;

        return $this;
    }

    public function getIsProtected(): ?bool
    {
        return $this->isProtected;
    }

    public function setIsProtected(?bool $isProtected): self
    {
        $this->initialized['isProtected'] = true;
        $this->isProtected = $isProtected;

        return $this;
    }

    public function getIsSigned(): ?bool
    {
        return $this->isSigned;
    }

    public function setIsSigned(?bool $isSigned): self
    {
        $this->initialized['isSigned'] = true;
        $this->isSigned = $isSigned;

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

    /**
     * Number of pages for signable document.
     */
    public function getTotalPages(): ?int
    {
        return $this->totalPages;
    }

    /**
     * Number of pages for signable document.
     */
    public function setTotalPages(?int $totalPages): self
    {
        $this->initialized['totalPages'] = true;
        $this->totalPages = $totalPages;

        return $this;
    }

    /**
     * If protected by password and not yet unlocked.
     */
    public function getIsLocked(): ?bool
    {
        return $this->isLocked;
    }

    /**
     * If protected by password and not yet unlocked.
     */
    public function setIsLocked(?bool $isLocked): self
    {
        $this->initialized['isLocked'] = true;
        $this->isLocked = $isLocked;

        return $this;
    }

    public function getInitials(): ?DocumentInitials
    {
        return $this->initials;
    }

    public function setInitials(?DocumentInitials $initials): self
    {
        $this->initialized['initials'] = true;
        $this->initials = $initials;

        return $this;
    }

    /**
     * Number of parsed anchors from the document.
     */
    public function getTotalAnchors(): ?int
    {
        return $this->totalAnchors;
    }

    /**
     * Number of parsed anchors from the document.
     */
    public function setTotalAnchors(?int $totalAnchors): self
    {
        $this->initialized['totalAnchors'] = true;
        $this->totalAnchors = $totalAnchors;

        return $this;
    }
}
