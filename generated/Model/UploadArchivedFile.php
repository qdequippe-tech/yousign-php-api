<?php

namespace Qdequippe\Yousign\Api\Model;

use Psr\Http\Message\StreamInterface;
use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UploadArchivedFile implements AdditionalPropertiesInterface
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
     * File to be uploaded.
     *
     * @var string|resource|StreamInterface|null
     */
    protected $file;
    /**
     * Workspace the archive is scoped to. Required for workspace-restricted API keys; when omitted with an organization-wide key, the organization default workspace is used.
     *
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
     *
     * @return string|resource|StreamInterface|null
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * File to be uploaded.
     *
     * @param string|resource|StreamInterface|null $file
     */
    public function setFile($file): self
    {
        $this->initialized['file'] = true;
        $this->file = $file;

        return $this;
    }

    /**
     * Workspace the archive is scoped to. Required for workspace-restricted API keys; when omitted with an organization-wide key, the organization default workspace is used.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * Workspace the archive is scoped to. Required for workspace-restricted API keys; when omitted with an organization-wide key, the organization default workspace is used.
     */
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

    public function definedProperties(): array
    {
        return ['file' => ['file', 'getFile', 'setFile'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId'], 'archiveY' => ['archive_y', 'getArchiveY', 'setArchiveY'], 'tags' => ['tags', 'getTags', 'setTags'], 'expiredAt' => ['expired_at', 'getExpiredAt', 'setExpiredAt']];
    }
}
