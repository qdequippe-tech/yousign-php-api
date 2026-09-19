<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class FieldAnswer implements AdditionalPropertiesInterface
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
     * @var string|bool|null
     */
    protected $value;

    /**
     * @return string|bool|null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string|bool|null $value
     */
    public function setValue($value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['value' => ['value', 'getValue', 'setValue']];
    }
}
