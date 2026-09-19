<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class EmailNotification1 implements AdditionalPropertiesInterface
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
     * @var list<string>|null
     */
    protected $disabled;

    /**
     * @return list<string>|null
     */
    public function getDisabled(): ?array
    {
        return $this->disabled;
    }

    /**
     * @param list<string>|null $disabled
     */
    public function setDisabled(?array $disabled): self
    {
        $this->initialized['disabled'] = true;
        $this->disabled = $disabled;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['disabled' => ['disabled', 'getDisabled', 'setDisabled']];
    }
}
