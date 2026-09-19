<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateProofOfAddressNaturalPerson
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
     * Provide the holder first name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "last_name".
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Provide the holder last name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "first_name".
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Provide the holder full address, exactly as it should appear on the proof of address document.
     *
     * @var InitiateProofOfAddressNaturalPersonAddress|null
     */
    protected $address;

    /**
     * Provide the holder first name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "last_name".
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Provide the holder first name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "last_name".
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Provide the holder last name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "first_name".
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Provide the holder last name, exactly as it should appear on the proof of address document.
     * Please match it exactly, with the same characters, same case.
     * One exception: if the document mentions an honorary title, please don't provide it as part of the name.
     * This field can not be submitted without field "first_name".
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Provide the holder full address, exactly as it should appear on the proof of address document.
     */
    public function getAddress(): ?InitiateProofOfAddressNaturalPersonAddress
    {
        return $this->address;
    }

    /**
     * Provide the holder full address, exactly as it should appear on the proof of address document.
     */
    public function setAddress(?InitiateProofOfAddressNaturalPersonAddress $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }
}
