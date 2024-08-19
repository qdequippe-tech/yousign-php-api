<?php

namespace Qdequippe\Yousign\Api\Model;

class UploadArchivedFile extends \ArrayObject
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
     * File to be uploaded.
     *
     * @var string|null
     */
    protected $file;
    /**
     * @var string|null
     */
    protected $workspaceId;
    /**
     * @var string|null
     */
    protected $archiveY;
    /**
     * Tags for the file.
     *
     * @var list<string>|null
     */
    protected $tags;
    /**
     * Expiration date of the file.
     *
     * @var string|null
     */
    protected $expiredAt;

    /**
     * File to be uploaded.
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * File to be uploaded.
     */
    public function setFile(?string $file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

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

    public function getArchiveY(): ?string
    {
        return $this->archiveY;
    }

    public function setArchiveY(?string $archiveY): self
    {
        $this->initialized['archiveY'] = true;
        $this->archiveY = $archiveY;

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

    /**
     * Expiration date of the file.
     */
    public function getExpiredAt(): ?string
    {
        return $this->expiredAt;
    }

    /**
     * Expiration date of the file.
     */
    public function setExpiredAt(?string $expiredAt): self
    {
        $this->initialized['expiredAt'] = true;
        $this->expiredAt = $expiredAt;

        return $this;
    }
}
