<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowSessionActionGroupsInnerActionsInnerPreviousAttemptsInner implements AdditionalPropertiesInterface
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

    public function definedProperties(): array
    {
        return ['resource' => ['resource', 'getResource', 'setResource']];
    }
}
