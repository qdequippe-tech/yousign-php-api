<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowSessionActionGroupsInnerActionsInnerResolution implements AdditionalPropertiesInterface
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
     * The reason why the Action is marked as resolved.
     *
     * @var string|null
     */
    protected $reason;
    /**
     * @var \DateTime|null
     */
    protected $resolvedAt;

    /**
     * The reason why the Action is marked as resolved.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * The reason why the Action is marked as resolved.
     */
    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    public function getResolvedAt(): ?\DateTime
    {
        return $this->resolvedAt;
    }

    public function setResolvedAt(?\DateTime $resolvedAt): self
    {
        $this->initialized['resolvedAt'] = true;
        $this->resolvedAt = $resolvedAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['reason' => ['reason', 'getReason', 'setReason'], 'resolvedAt' => ['resolved_at', 'getResolvedAt', 'setResolvedAt']];
    }
}
