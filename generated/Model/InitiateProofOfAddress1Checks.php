<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateProofOfAddress1Checks
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
     * Expected first name of the certificate holder to check against the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Expected last name of the certificate holder to check against the document.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Expected first name of the certificate holder to check against the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Expected first name of the certificate holder to check against the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Expected last name of the certificate holder to check against the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Expected last name of the certificate holder to check against the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }
}
