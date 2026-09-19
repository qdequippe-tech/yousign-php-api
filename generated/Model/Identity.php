<?php

namespace Qdequippe\Yousign\Api\Model;

class Identity
{
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * First name of the person. Several given names are separated with spaces
     * (`Stéphane Marc Gabriel`), never with commas.
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
     * First name of the person. Several given names are separated with spaces
     * (`Stéphane Marc Gabriel`), never with commas.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the person. Several given names are separated with spaces
     * (`Stéphane Marc Gabriel`), never with commas.
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
}
