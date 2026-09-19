<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfDataPoliticallyExposedPerson implements AdditionalPropertiesInterface
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
     * Whether the person is currently politically exposed.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * @var list<WatchlistFullAllOfDataPoliticallyExposedPersonPositions>|null
     */
    protected $positions;

    /**
     * Whether the person is currently politically exposed.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Whether the person is currently politically exposed.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * @return list<WatchlistFullAllOfDataPoliticallyExposedPersonPositions>|null
     */
    public function getPositions(): ?array
    {
        return $this->positions;
    }

    /**
     * @param list<WatchlistFullAllOfDataPoliticallyExposedPersonPositions>|null $positions
     */
    public function setPositions(?array $positions): self
    {
        $this->initialized['positions'] = true;
        $this->positions = $positions;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['active' => ['active', 'getActive', 'setActive'], 'positions' => ['positions', 'getPositions', 'setPositions']];
    }
}
