<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataCompanyInformationLegalForm implements AdditionalPropertiesInterface
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
     * Legal form code (ISO 20275).
     *
     * @var string|null
     */
    protected $code;
    /**
     * Local legal form name.
     *
     * @var string|null
     */
    protected $description;

    /**
     * Legal form code (ISO 20275).
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * Legal form code (ISO 20275).
     */
    public function setCode(?string $code): self
    {
        $this->initialized['code'] = true;
        $this->code = $code;

        return $this;
    }

    /**
     * Local legal form name.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Local legal form name.
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['code' => ['code', 'getCode', 'setCode'], 'description' => ['description', 'getDescription', 'setDescription']];
    }
}
