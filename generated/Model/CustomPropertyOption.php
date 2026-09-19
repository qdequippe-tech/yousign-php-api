<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomPropertyOption implements AdditionalPropertiesInterface
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
     * Unique identifier of the option.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Display text of the option.
     *
     * @var string|null
     */
    protected $value;
    /**
     * Whether this option is pre-selected on new SRs.
     *
     * @var bool|null
     */
    protected $isDefault;
    /**
     * Sort order.
     *
     * @var int|null
     */
    protected $position;

    /**
     * Unique identifier of the option.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the option.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Display text of the option.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Display text of the option.
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * Whether this option is pre-selected on new SRs.
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * Whether this option is pre-selected on new SRs.
     */
    public function setIsDefault(?bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Sort order.
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * Sort order.
     */
    public function setPosition(?int $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'value' => ['value', 'getValue', 'setValue'], 'isDefault' => ['is_default', 'getIsDefault', 'setIsDefault'], 'position' => ['position', 'getPosition', 'setPosition']];
    }
}
