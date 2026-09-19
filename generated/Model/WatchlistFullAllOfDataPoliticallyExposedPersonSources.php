<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfDataPoliticallyExposedPersonSources implements AdditionalPropertiesInterface
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
     * Name of the source.
     *
     * @var string|null
     */
    protected $name;
    /**
     * URL of the source.
     *
     * @var string|null
     */
    protected $url;

    /**
     * Name of the source.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the source.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * URL of the source.
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * URL of the source.
     */
    public function setUrl(?string $url): self
    {
        $this->initialized['url'] = true;
        $this->url = $url;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'url' => ['url', 'getUrl', 'setUrl']];
    }
}
