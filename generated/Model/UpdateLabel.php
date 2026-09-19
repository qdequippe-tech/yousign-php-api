<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateLabel implements AdditionalPropertiesInterface
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
     * Name of the Label. Each Label name must be unique within the organization.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email, HTML and URL.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Name of the Label. Each Label name must be unique within the organization.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email, HTML and URL.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Label. Each Label name must be unique within the organization.\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email, HTML and URL.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName']];
    }
}
