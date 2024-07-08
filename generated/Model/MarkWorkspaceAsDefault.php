<?php

namespace Qdequippe\Yousign\Api\Model;

class MarkWorkspaceAsDefault extends \ArrayObject
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
     * The workspace you want to mark as the default one.
     *
     * @var string|null
     */
    protected $workspaceId;

    /**
     * The workspace you want to mark as the default one.
     */
    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    /**
     * The workspace you want to mark as the default one.
     */
    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }
}
