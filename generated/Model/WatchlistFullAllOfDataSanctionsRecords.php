<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfDataSanctionsRecords implements AdditionalPropertiesInterface
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
     * Description of the sanction.
     *
     * @var string|null
     */
    protected $description;
    /**
     * Authority that issued the sanction.
     *
     * @var string|null
     */
    protected $authority;
    /**
     * ISO country code where the sanction is applicable.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Whether the sanction is currently active.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * Date when the sanction started.
     *
     * @var string|null
     */
    protected $startedOn;
    /**
     * Date when the sanction ended − null if ongoing.
     *
     * @var string|null
     */
    protected $endedOn;
    /**
     * Sources of this information.
     *
     * @var list<WatchlistFullAllOfDataSanctionsSources>|null
     */
    protected $sources;

    /**
     * Description of the sanction.
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Description of the sanction.
     */
    public function setDescription(?string $description): self
    {
        $this->initialized['description'] = true;
        $this->description = $description;

        return $this;
    }

    /**
     * Authority that issued the sanction.
     */
    public function getAuthority(): ?string
    {
        return $this->authority;
    }

    /**
     * Authority that issued the sanction.
     */
    public function setAuthority(?string $authority): self
    {
        $this->initialized['authority'] = true;
        $this->authority = $authority;

        return $this;
    }

    /**
     * ISO country code where the sanction is applicable.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * ISO country code where the sanction is applicable.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Whether the sanction is currently active.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Whether the sanction is currently active.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * Date when the sanction started.
     */
    public function getStartedOn(): ?string
    {
        return $this->startedOn;
    }

    /**
     * Date when the sanction started.
     */
    public function setStartedOn(?string $startedOn): self
    {
        $this->initialized['startedOn'] = true;
        $this->startedOn = $startedOn;

        return $this;
    }

    /**
     * Date when the sanction ended − null if ongoing.
     */
    public function getEndedOn(): ?string
    {
        return $this->endedOn;
    }

    /**
     * Date when the sanction ended − null if ongoing.
     */
    public function setEndedOn(?string $endedOn): self
    {
        $this->initialized['endedOn'] = true;
        $this->endedOn = $endedOn;

        return $this;
    }

    /**
     * Sources of this information.
     *
     * @return list<WatchlistFullAllOfDataSanctionsSources>|null
     */
    public function getSources(): ?array
    {
        return $this->sources;
    }

    /**
     * Sources of this information.
     *
     * @param list<WatchlistFullAllOfDataSanctionsSources>|null $sources
     */
    public function setSources(?array $sources): self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['description' => ['description', 'getDescription', 'setDescription'], 'authority' => ['authority', 'getAuthority', 'setAuthority'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode'], 'active' => ['active', 'getActive', 'setActive'], 'startedOn' => ['started_on', 'getStartedOn', 'setStartedOn'], 'endedOn' => ['ended_on', 'getEndedOn', 'setEndedOn'], 'sources' => ['sources', 'getSources', 'setSources']];
    }
}
