<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class WatchlistFullAllOfData implements AdditionalPropertiesInterface
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
     * Information about politically exposed person status.
     *
     * @var WatchlistFullAllOfDataPoliticallyExposedPerson|null
     */
    protected $politicallyExposedPerson;
    /**
     * List of sanctions against the person.
     *
     * @var WatchlistFullAllOfDataSanctions|null
     */
    protected $sanctions;

    /**
     * Information about politically exposed person status.
     */
    public function getPoliticallyExposedPerson(): ?WatchlistFullAllOfDataPoliticallyExposedPerson
    {
        return $this->politicallyExposedPerson;
    }

    /**
     * Information about politically exposed person status.
     */
    public function setPoliticallyExposedPerson(?WatchlistFullAllOfDataPoliticallyExposedPerson $politicallyExposedPerson): self
    {
        $this->initialized['politicallyExposedPerson'] = true;
        $this->politicallyExposedPerson = $politicallyExposedPerson;

        return $this;
    }

    /**
     * List of sanctions against the person.
     */
    public function getSanctions(): ?WatchlistFullAllOfDataSanctions
    {
        return $this->sanctions;
    }

    /**
     * List of sanctions against the person.
     */
    public function setSanctions(?WatchlistFullAllOfDataSanctions $sanctions): self
    {
        $this->initialized['sanctions'] = true;
        $this->sanctions = $sanctions;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['politicallyExposedPerson' => ['politically_exposed_person', 'getPoliticallyExposedPerson', 'setPoliticallyExposedPerson'], 'sanctions' => ['sanctions', 'getSanctions', 'setSanctions']];
    }
}
