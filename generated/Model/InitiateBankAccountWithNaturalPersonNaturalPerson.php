<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateBankAccountWithNaturalPersonNaturalPerson
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
     * Please provide the holder first name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Please provide the holder last name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     *
     * @var string|null
     */
    protected $lastName;

    /**
     * Please provide the holder first name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Please provide the holder first name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Please provide the holder last name, exactly as it appears on the bank account document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }
}
