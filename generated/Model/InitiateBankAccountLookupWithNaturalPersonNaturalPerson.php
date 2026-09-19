<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class InitiateBankAccountLookupWithNaturalPersonNaturalPerson implements AdditionalPropertiesInterface
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
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the person.
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * First name of the person.
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the person.
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the person.
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the person.
     * The combined length of `first_name` and `last_name` must be less than 140 characters.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName']];
    }
}
