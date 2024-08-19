<?php

namespace Qdequippe\Yousign\Api\Model;

class ArchivedFile extends \ArrayObject
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
     * Sha256 checksum.
     *
     * @var string|null
     */
    protected $sha256;
    /**
     * @var string|null
     */
    protected $filename;
    /**
     * Creation date of the file.
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Expiration date of the file.
     *
     * @var \DateTime|null
     */
    protected $expiredAt;
    /**
     * @var string|null
     */
    protected $contentType;
    /**
     * @var int|null
     */
    protected $size;
    /**
     * Identifier that allows to save the file in an additional storage.
     *
     * @var string|null
     */
    protected $archiveYIdentifier;
    /**
     * Tags for the file.
     *
     * @var list<string>|null
     */
    protected $tags;
    /**
     * @var string|null
     */
    protected $workspaceId;

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

    /**
     * Creation date of the file.
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation date of the file.
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Expiration date of the file.
     */
    public function getExpiredAt(): ?\DateTime
    {
        return $this->expiredAt;
    }

    /**
     * Expiration date of the file.
     */
    public function setExpiredAt(?\DateTime $expiredAt): self
    {
        $this->initialized['expiredAt'] = true;
        $this->expiredAt = $expiredAt;

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

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Identifier that allows to save the file in an additional storage.
     */
    public function getArchiveYIdentifier(): ?string
    {
        return $this->archiveYIdentifier;
    }

    /**
     * Identifier that allows to save the file in an additional storage.
     */
    public function setArchiveYIdentifier(?string $archiveYIdentifier): self
    {
        $this->initialized['archiveYIdentifier'] = true;
        $this->archiveYIdentifier = $archiveYIdentifier;

        return $this;
    }

    /**
     * Tags for the file.
     *
     * @return list<string>|null
     */
    public function getTags(): ?array
    {
        return $this->tags;
    }

    /**
     * Tags for the file.
     *
     * @param list<string>|null $tags
     */
    public function setTags(?array $tags): self
    {
        $this->initialized['tags'] = true;
        $this->tags = $tags;

        return $this;
    }

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }
}
