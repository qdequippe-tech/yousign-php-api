<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateWatchlistNaturalPerson implements AdditionalPropertiesInterface
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
     * First name of the person.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the person.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Date of birth of the person (YYYY-MM-DD).
     *
     * @var \DateTime|null
     */
    protected $bornOn;

    /**
     * First name of the person.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the person.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the person.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the person.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Date of birth of the person (YYYY-MM-DD).
     */
    public function getBornOn(): ?\DateTime
    {
        return $this->bornOn;
    }

    /**
     * Date of birth of the person (YYYY-MM-DD).
     */
    public function setBornOn(?\DateTime $bornOn): self
    {
        $this->initialized['bornOn'] = true;
        $this->bornOn = $bornOn;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'bornOn' => ['born_on', 'getBornOn', 'setBornOn']];
    }
}
