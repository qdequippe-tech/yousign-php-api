<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WorkflowTemplateActionGroupsInner implements AdditionalPropertiesInterface
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
     * Type of the Action Group.
     *
     * @var string|null
     */
    protected $type;

    /**
     * Type of the Action Group.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the Action Group.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType']];
    }
}
