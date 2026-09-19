<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class ResolveWorkflowSessionActionResource implements AdditionalPropertiesInterface
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
     * Unique ID of the resource used in the Workflow Session Action.
     *
     * @var string|null
     */
    protected $id;
    /**
     * The type of resource used in the Workflow Session Action.
     *
     * @var string|null
     */
    protected $type;

    /**
     * Unique ID of the resource used in the Workflow Session Action.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique ID of the resource used in the Workflow Session Action.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * The type of resource used in the Workflow Session Action.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * The type of resource used in the Workflow Session Action.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'type' => ['type', 'getType', 'setType']];
    }
}
