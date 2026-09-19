<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfDataPoliticallyExposedPersonPositions implements AdditionalPropertiesInterface
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
     * Title of the political position.
     *
     * @var string|null
     */
    protected $title;
    /**
     * Whether the person is currently politically exposed.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * ISO country code where the position is held.
     *
     * @var string|null
     */
    protected $countryCode;
    /**
     * Date when the position started.
     *
     * @var string|null
     */
    protected $startedOn;
    /**
     * Date when the position ended − null if ongoing.
     *
     * @var string|null
     */
    protected $endedOn;
    /**
     * Sources of this information.
     *
     * @var list<WatchlistFullAllOfDataPoliticallyExposedPersonSources>|null
     */
    protected $sources;

    /**
     * Title of the political position.
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Title of the political position.
     */
    public function setTitle(?string $title): self
    {
        $this->initialized['title'] = true;
        $this->title = $title;

        return $this;
    }

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
     * ISO country code where the position is held.
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * ISO country code where the position is held.
     */
    public function setCountryCode(?string $countryCode): self
    {
        $this->initialized['countryCode'] = true;
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Date when the position started.
     */
    public function getStartedOn(): ?string
    {
        return $this->startedOn;
    }

    /**
     * Date when the position started.
     */
    public function setStartedOn(?string $startedOn): self
    {
        $this->initialized['startedOn'] = true;
        $this->startedOn = $startedOn;

        return $this;
    }

    /**
     * Date when the position ended − null if ongoing.
     */
    public function getEndedOn(): ?string
    {
        return $this->endedOn;
    }

    /**
     * Date when the position ended − null if ongoing.
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
     * @return list<WatchlistFullAllOfDataPoliticallyExposedPersonSources>|null
     */
    public function getSources(): ?array
    {
        return $this->sources;
    }

    /**
     * Sources of this information.
     *
     * @param list<WatchlistFullAllOfDataPoliticallyExposedPersonSources>|null $sources
     */
    public function setSources(?array $sources): self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['title' => ['title', 'getTitle', 'setTitle'], 'active' => ['active', 'getActive', 'setActive'], 'countryCode' => ['country_code', 'getCountryCode', 'setCountryCode'], 'startedOn' => ['started_on', 'getStartedOn', 'setStartedOn'], 'endedOn' => ['ended_on', 'getEndedOn', 'setEndedOn'], 'sources' => ['sources', 'getSources', 'setSources']];
    }
}
