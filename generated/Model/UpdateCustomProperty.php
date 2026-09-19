<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateCustomProperty
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Display name of the property.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Cannot be changed after creation. If provided and different from current type, request is rejected with 400.
     *
     * @var string|null
     */
    protected $type;
    /**
     * For list type only. Whether multiple options can be selected.
     *
     * @var bool|null
     */
    protected $multipleAnswerAllowed;
    /**
     * For text type only. Default text pre-filled on new SRs.
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * For list type only. Send the full array to replace all options.
     * - Include id for existing options to preserve them (rename/reorder).
     * - Omit id for new options.
     * - Options not present in the array are removed.
     *
     * @var list<CustomPropertyOptionUpdate>|null
     */
    protected $options;
    /**
     * List of Workspaces that define where the Custom Property is scoped. If the array is empty, the Custom Property is available to all Workspaces.
     *
     * @var list<string>|null
     */
    protected $workspaces;

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
     * Cannot be changed after creation. If provided and different from current type, request is rejected with 400.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Cannot be changed after creation. If provided and different from current type, request is rejected with 400.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * For list type only. Whether multiple options can be selected.
     */
    public function getMultipleAnswerAllowed(): ?bool
    {
        return $this->multipleAnswerAllowed;
    }

    /**
     * For list type only. Whether multiple options can be selected.
     */
    public function setMultipleAnswerAllowed(?bool $multipleAnswerAllowed): self
    {
        $this->initialized['multipleAnswerAllowed'] = true;
        $this->multipleAnswerAllowed = $multipleAnswerAllowed;

        return $this;
    }

    /**
     * For text type only. Default text pre-filled on new SRs.
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * For text type only. Default text pre-filled on new SRs.
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * For list type only. Send the full array to replace all options.
     * - Include id for existing options to preserve them (rename/reorder).
     * - Omit id for new options.
     * - Options not present in the array are removed.
     *
     * @return list<CustomPropertyOptionUpdate>|null
     */
    public function getOptions(): ?array
    {
        return $this->options;
    }

    /**
     * For list type only. Send the full array to replace all options.
     * - Include id for existing options to preserve them (rename/reorder).
     * - Omit id for new options.
     * - Options not present in the array are removed.
     *
     * @param list<CustomPropertyOptionUpdate>|null $options
     */
    public function setOptions(?array $options): self
    {
        $this->initialized['options'] = true;
        $this->options = $options;

        return $this;
    }

    /**
     * List of Workspaces that define where the Custom Property is scoped. If the array is empty, the Custom Property is available to all Workspaces.
     *
     * @return list<string>|null
     */
    public function getWorkspaces(): ?array
    {
        return $this->workspaces;
    }

    /**
     * List of Workspaces that define where the Custom Property is scoped. If the array is empty, the Custom Property is available to all Workspaces.
     *
     * @param list<string>|null $workspaces
     */
    public function setWorkspaces(?array $workspaces): self
    {
        $this->initialized['workspaces'] = true;
        $this->workspaces = $workspaces;

        return $this;
    }
}
