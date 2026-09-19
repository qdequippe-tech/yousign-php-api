<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateVehicleRegistrationDocumentChecksVehicleOwner
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
     * Type of the vehicle owner.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Expected first name of the vehicle owner. Required for natural persons.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Expected last name of the vehicle owner. Required for natural persons.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Expected company name of the vehicle owner. Required when type is `legal_person`.
     *
     * @var string|null
     */
    protected $companyName;

    /**
     * Type of the vehicle owner.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the vehicle owner.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Expected first name of the vehicle owner. Required for natural persons.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * Expected first name of the vehicle owner. Required for natural persons.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Expected last name of the vehicle owner. Required for natural persons.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Expected last name of the vehicle owner. Required for natural persons.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Expected company name of the vehicle owner. Required when type is `legal_person`.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Expected company name of the vehicle owner. Required when type is `legal_person`.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }
}
