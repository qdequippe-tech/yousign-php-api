<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomPropertyOptionInput implements AdditionalPropertiesInterface
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
     * Display text of the option.
     *
     * @var string|null
     */
    protected $value;
    /**
     * Whether this option is pre-selected on new SRs.
     * Multiple defaults allowed if multiple_answer_allowed is true.
     *
     * @var bool|null
     */
    protected $isDefault = false;
    /**
     * Sort order (0-based). If omitted, values are ordered as provided.
     *
     * @var int|null
     */
    protected $position;

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
     * Multiple defaults allowed if multiple_answer_allowed is true.
     */
    public function getIsDefault(): ?bool
    {
        return $this->isDefault;
    }

    /**
     * Whether this option is pre-selected on new SRs.
     * Multiple defaults allowed if multiple_answer_allowed is true.
     */
    public function setIsDefault(?bool $isDefault): self
    {
        $this->initialized['isDefault'] = true;
        $this->isDefault = $isDefault;

        return $this;
    }

    /**
     * Sort order (0-based). If omitted, values are ordered as provided.
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * Sort order (0-based). If omitted, values are ordered as provided.
     */
    public function setPosition(?int $position): self
    {
        $this->initialized['position'] = true;
        $this->position = $position;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['value' => ['value', 'getValue', 'setValue'], 'isDefault' => ['is_default', 'getIsDefault', 'setIsDefault'], 'position' => ['position', 'getPosition', 'setPosition']];
    }
}
