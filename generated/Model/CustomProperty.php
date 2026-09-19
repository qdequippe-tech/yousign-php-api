<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CustomProperty implements AdditionalPropertiesInterface
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
     * Unique identifier of the custom property.
     *
     * @var string|null
     */
    protected $id;
    /**
     * Display name of the property.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Field type.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Whether users must fill this property before sending the SR via the application (not enforced via API).
     *
     * @var bool|null
     */
    protected $required;
    /**
     * For list type only — whether multiple options can be selected. Null for text type.
     *
     * @var bool|null
     */
    protected $multipleAnswerAllowed;
    /**
     * List of workspace IDs where this property is applicable. Null means org-wide.
     *
     * @var list<string>|null
     */
    protected $workspaceIds;
    /**
     * For text type only — default text pre-filled on new signature requests. Null for list type.
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * For list type only: selectable options.
     * Null for text type.
     *
     * @var list<CustomPropertyOption>|null
     */
    protected $options;
    /**
     * Creation timestamp (ISO 8601).
     *
     * @var \DateTime|null
     */
    protected $createdAt;
    /**
     * Last update timestamp (ISO 8601).
     *
     * @var \DateTime|null
     */
    protected $updatedAt;

    /**
     * Unique identifier of the custom property.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Unique identifier of the custom property.
     */
    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    /**
     * Display name of the property.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Display name of the property.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Field type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Field type.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Whether users must fill this property before sending the SR via the application (not enforced via API).
     */
    public function getRequired(): ?bool
    {
        return $this->required;
    }

    /**
     * Whether users must fill this property before sending the SR via the application (not enforced via API).
     */
    public function setRequired(?bool $required): self
    {
        $this->initialized['required'] = true;
        $this->required = $required;

        return $this;
    }

    /**
     * For list type only — whether multiple options can be selected. Null for text type.
     */
    public function getMultipleAnswerAllowed(): ?bool
    {
        return $this->multipleAnswerAllowed;
    }

    /**
     * For list type only — whether multiple options can be selected. Null for text type.
     */
    public function setMultipleAnswerAllowed(?bool $multipleAnswerAllowed): self
    {
        $this->initialized['multipleAnswerAllowed'] = true;
        $this->multipleAnswerAllowed = $multipleAnswerAllowed;

        return $this;
    }

    /**
     * List of workspace IDs where this property is applicable. Null means org-wide.
     *
     * @return list<string>|null
     */
    public function getWorkspaceIds(): ?array
    {
        return $this->workspaceIds;
    }

    /**
     * List of workspace IDs where this property is applicable. Null means org-wide.
     *
     * @param list<string>|null $workspaceIds
     */
    public function setWorkspaceIds(?array $workspaceIds): self
    {
        $this->initialized['workspaceIds'] = true;
        $this->workspaceIds = $workspaceIds;

        return $this;
    }

    /**
     * For text type only — default text pre-filled on new signature requests. Null for list type.
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * For text type only — default text pre-filled on new signature requests. Null for list type.
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * For list type only: selectable options.
     * Null for text type.
     *
     * @return list<CustomPropertyOption>|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * For list type only: selectable options.
     * Null for text type.
     *
     * @param list<CustomPropertyOption>|null $options
     */
    public function setOptions(?array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * Creation timestamp (ISO 8601).
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * Creation timestamp (ISO 8601).
     */
    public function setCreatedAt(?\DateTime $createdAt): self
    {
        $this->initialized['createdAt'] = true;
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Last update timestamp (ISO 8601).
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * Last update timestamp (ISO 8601).
     */
    public function setUpdatedAt(?\DateTime $updatedAt): self
    {
        $this->initialized['updatedAt'] = true;
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'name' => ['name', 'getName', 'setName'], 'type' => ['type', 'getType', 'setType'], 'required' => ['required', 'getRequired', 'setRequired'], 'multipleAnswerAllowed' => ['multiple_answer_allowed', 'getMultipleAnswerAllowed', 'setMultipleAnswerAllowed'], 'workspaceIds' => ['workspace_ids', 'getWorkspaceIds', 'setWorkspaceIds'], 'defaultValue' => ['default_value', 'getDefaultValue', 'setDefaultValue'], 'options' => ['options', 'getOptions', 'setOptions'], 'createdAt' => ['created_at', 'getCreatedAt', 'setCreatedAt'], 'updatedAt' => ['updated_at', 'getUpdatedAt', 'setUpdatedAt']];
    }
}
