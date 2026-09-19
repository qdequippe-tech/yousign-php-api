<?php

namespace Qdequippe\Yousign\Api\Model;

class FraudRiskAnalysisIndicatorsInner
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
     * Machine-readable identifier of the detected indicator.
     *
     * @var string|null
     */
    protected $indicator;
    /**
     * Type of the indicator.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Category the indicator belongs to.
     *
     * @var string|null
     */
    protected $category;
    /**
     * Human-readable title of the indicator.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Human-readable description of the indicator.
     *
     * @var string|null
     */
    protected $description;

    /**
     * Machine-readable identifier of the detected indicator.
     */
    public function getIndicator(): ?string
    {
        return $this->indicator;
    }

    /**
     * Machine-readable identifier of the detected indicator.
     */
    public function setIndicator(?string $indicator): self
    {
        $this->initialized['indicator'] = true;
        $this->indicator = $indicator;

        return $this;
    }

    /**
     * Type of the indicator.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the indicator.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Category the indicator belongs to.
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /**
     * Category the indicator belongs to.
     */
    public function setCategory(?string $category): self
    {
        $this->initialized['category'] = true;
        $this->category = $category;

        return $this;
    }

    /**
     * Human-readable title of the indicator.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Human-readable title of the indicator.
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

    /**
     * Human-readable description of the indicator.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Human-readable description of the indicator.
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }
}
