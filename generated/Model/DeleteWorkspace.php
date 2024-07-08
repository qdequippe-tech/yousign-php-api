<?php

namespace Qdequippe\Yousign\Api\Model;

class DeleteWorkspace extends \ArrayObject
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
     * The target workspace where resources are migrated in.
     *
     * @var string|null
     */
    protected $workspaceId;

    /**
     * The target workspace where resources are migrated in.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * The target workspace where resources are migrated in.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }
}
