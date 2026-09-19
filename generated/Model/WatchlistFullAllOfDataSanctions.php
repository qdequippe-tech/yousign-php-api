<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfDataSanctions implements AdditionalPropertiesInterface
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
     * Whether the person is currently sanctioned.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * @var list<WatchlistFullAllOfDataSanctionsRecords>|null
     */
    protected $records;

    /**
     * Whether the person is currently sanctioned.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Whether the person is currently sanctioned.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * @return list<WatchlistFullAllOfDataSanctionsRecords>|null
     */
    public function getRecords(): ?array
    {
        return $this->records;
    }

    /**
     * @param list<WatchlistFullAllOfDataSanctionsRecords>|null $records
     */
    public function setRecords(?array $records): self
    {
        $this->initialized['records'] = true;
        $this->records = $records;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['active' => ['active', 'getActive', 'setActive'], 'records' => ['records', 'getRecords', 'setRecords']];
    }
}
