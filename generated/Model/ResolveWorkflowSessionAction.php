<?php

namespace Qdequippe\Yousign\Api\Model;

class ResolveWorkflowSessionAction
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
     * @var ResolveWorkflowSessionActionResource|null
     */
    protected $resource;
    /**
     * The reason why the Action is marked as resolved.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $reason;

    public function getResource(): ?ResolveWorkflowSessionActionResource
    {
        return $this->resource;
    }

    public function setResource(?ResolveWorkflowSessionActionResource $resource): self
    {
        $this->initialized['resource'] = true;
        $this->resource = $resource;

        return $this;
    }

    /**
     * The reason why the Action is marked as resolved.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * The reason why the Action is marked as resolved.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }
}
