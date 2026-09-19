<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Document implements AdditionalPropertiesInterface
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
    /**
     * List of Approver IDs who cannot see this Document.
     *
     * @var list<string>|null
     */
    protected $excludedApprovers;
    /**
     * List of Signer IDs who cannot see this Document.
     *
     * @var list<string>|null
     */
    protected $excludedSigners;

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

    /**
     * List of Approver IDs who cannot see this Document.
     *
     * @return list<string>|null
     */
    public function getExcludedApprovers(): ?array
    {
        return $this->excludedApprovers;
    }

    /**
     * List of Approver IDs who cannot see this Document.
     *
     * @param list<string>|null $excludedApprovers
     */
    public function setExcludedApprovers(?array $excludedApprovers): self
    {
        $this->initialized['excludedApprovers'] = true;
        $this->excludedApprovers = $excludedApprovers;

        return $this;
    }

    /**
     * List of Signer IDs who cannot see this Document.
     *
     * @return list<string>|null
     */
    public function getExcludedSigners(): ?array
    {
        return $this->excludedSigners;
    }

    /**
     * List of Signer IDs who cannot see this Document.
     *
     * @param list<string>|null $excludedSigners
     */
    public function setExcludedSigners(?array $excludedSigners): self
    {
        $this->initialized['excludedSigners'] = true;
        $this->excludedSigners = $excludedSigners;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'filename' => ['filename', 'getFilename', 'setFilename'], 'nature' => ['nature', 'getNature', 'setNature'], 'contentType' => ['content_type', 'getContentType', 'setContentType'], 'sha256' => ['sha256', 'getSha256', 'setSha256'], 'isProtected' => ['is_protected', 'getIsProtected', 'setIsProtected'], 'isSigned' => ['is_signed', 'getIsSigned', 'setIsSigned'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'totalPages' => ['total_pages', 'getTotalPages', 'setTotalPages'], 'isLocked' => ['is_locked', 'getIsLocked', 'setIsLocked'], 'initials' => ['initials', 'getInitials', 'setInitials'], 'totalAnchors' => ['total_anchors', 'getTotalAnchors', 'setTotalAnchors'], 'excludedApprovers' => ['excluded_approvers', 'getExcludedApprovers', 'setExcludedApprovers'], 'excludedSigners' => ['excluded_signers', 'getExcludedSigners', 'setExcludedSigners']];
    }
}
