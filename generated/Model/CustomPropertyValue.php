<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomPropertyValue implements AdditionalPropertiesInterface
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
     * ID of the Custom Property.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Name of the Custom Property.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Type of the custom property.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Text value for text properties.
     *
     * @var string|null
     */
    protected $value;
    /**
     * Array of option ids for list properties.
     *
     * @var list<string>|null
     */
    protected $valueIds;
    /**
     * Array of option values for list properties.
     *
     * @var list<string>|null
     */
    protected $values;

    /**
     * ID of the Custom Property.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * ID of the Custom Property.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Name of the Custom Property.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Custom Property.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Type of the custom property.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the custom property.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Text value for text properties.
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Text value for text properties.
     */
    public function setValue(?string $value): self
    {
        $this->initialized['value'] = true;
        $this->value = $value;

        return $this;
    }

    /**
     * Array of option ids for list properties.
     *
     * @return list<string>|null
     */
    public function getValueIds(): ?array
    {
        return $this->valueIds;
    }

    /**
     * Array of option ids for list properties.
     *
     * @param list<string>|null $valueIds
     */
    public function setValueIds(?array $valueIds): self
    {
        $this->initialized['valueIds'] = true;
        $this->valueIds = $valueIds;

        return $this;
    }

    /**
     * Array of option values for list properties.
     *
     * @return list<string>|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * Array of option values for list properties.
     *
     * @param list<string>|null $values
     */
    public function setValues(?array $values): self
    {
        $this->initialized['values'] = true;
        $this->values = $values;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'name' => ['name', 'getName', 'setName'], 'type' => ['type', 'getType', 'setType'], 'value' => ['value', 'getValue', 'setValue'], 'valueIds' => ['value_ids', 'getValueIds', 'setValueIds'], 'values' => ['values', 'getValues', 'setValues']];
    }
}
