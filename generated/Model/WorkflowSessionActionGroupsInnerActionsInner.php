<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowSessionActionGroupsInnerActionsInner implements AdditionalPropertiesInterface
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
     * The resource associated with this Action.
     *
     * @var WorkflowSessionActionResource|null
     */
    protected $resource;
    /**
     * The resource associated with this Action.
     *
     * @var WorkflowSessionActionGroupsInnerActionsInnerResolution|null
     */
    protected $resolution;
    /**
     * List of previous attempts for this action. Each one contains a resource with its associated details.
     *
     * @var list<WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner>|null
     */
    protected $previousAttempts;

    /**
     * The resource associated with this Action.
     */
    public function getResource(): ?WorkflowSessionActionResource
    {
        return $this->resource;
    }

    /**
     * The resource associated with this Action.
     */
    public function setResource(?WorkflowSessionActionResource $resource): self
    {
        $this->initialized['resource'] = true;
        $this->resource = $resource;

        return $this;
    }

    /**
     * The resource associated with this Action.
     */
    public function getResolution(): ?WorkflowSessionActionGroupsInnerActionsInnerResolution
    {
        return $this->resolution;
    }

    /**
     * The resource associated with this Action.
     */
    public function setResolution(?WorkflowSessionActionGroupsInnerActionsInnerResolution $resolution): self
    {
        $this->initialized['resolution'] = true;
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * List of previous attempts for this action. Each one contains a resource with its associated details.
     *
     * @return list<WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner>|null
     */
    public function getPreviousAttempts(): ?array
    {
        return $this->previousAttempts;
    }

    /**
     * List of previous attempts for this action. Each one contains a resource with its associated details.
     *
     * @param list<WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner>|null $previousAttempts
     */
    public function setPreviousAttempts(?array $previousAttempts): self
    {
        $this->initialized['previousAttempts'] = true;
        $this->previousAttempts = $previousAttempts;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['resource' => ['resource', 'getResource', 'setResource'], 'resolution' => ['resolution', 'getResolution', 'setResolution'], 'previousAttempts' => ['previous_attempts', 'getPreviousAttempts', 'setPreviousAttempts']];
    }
}
