<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataCompanyInformationActivities implements AdditionalPropertiesInterface
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
     * Activity code.
     *
     * @var string|null
     */
    protected $code;
    /**
     * Activity name.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Activity classification.
     *
     * @var string|null
     */
    protected $classification;

    /**
     * Activity code.
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Activity code.
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;

        return $this;
    }

    /**
     * Activity name.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Activity name.
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Activity classification.
     */
    public function getClassification(): ?string
    {
        return $this->classification;
    }

    /**
     * Activity classification.
     */
    public function setClassification(?string $classification): self
    {
        $this->initialized['classification'] = true;
        $this->classification = $classification;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['code' => ['code', 'getCode', 'setCode'], 'description' => ['description', 'getDescription', 'setDescription'], 'classification' => ['classification', 'getClassification', 'setClassification']];
    }
}
