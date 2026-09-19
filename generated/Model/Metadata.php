<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Metadata implements AdditionalPropertiesInterface
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
     * @var array<string, string|float|bool>|null
     */
    protected $data;

    /**
     * @return array<string, string|float|bool>|null
     */
    public function getData(): ?iterable
    {
        return $this->data;
    }

    /**
     * @param array<string, string|float|bool>|null $data
     */
    public function setData(?iterable $data): self
    {
        $this->initialized['data'] = true;
        $this->data = $data;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['data' => ['data', 'getData', 'setData']];
    }
}
