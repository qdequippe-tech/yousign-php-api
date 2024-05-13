<?php

namespace Qdequippe\Yousign\Api\Model;

class Contact extends \ArrayObject
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
     * @var string|null
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $firstName;
    /**
     * @var string|null
     */
    protected $lastName;
    /**
     * @var string|null
     */
    protected $email;
    /**
     * @var string|null
     */
    protected $locale;
    /**
     * E.164 format.
     *
     * @var string|null
     */
    protected $phoneNumber;
    /**
     * @var string|null
     */
    protected $companyName;
    /**
     * @var string|null
     */
    protected $jobTitle;
    /**
     * @var string|null
     */
    protected $addressLine1;
    /**
     * @var string|null
     */
    protected $addressLine2;
    /**
     * @var string|null
     */
    protected $addressCity;
    /**
     * @var string|null
     */
    protected $addressPostalCode;
    /**
     * @var string|null
     */
    protected $addressCountry;
    /**
     * @var string|null
     */
    protected $workspaceId;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->initialized['email'] = true;
        $this->email = $email;

        return $this;
    }

    public function getLocale(): ?string
    {
        return $this->locale;
    }

    public function setLocale(?string $locale): self
    {
        $this->initialized['locale'] = true;
        $this->locale = $locale;

        return $this;
    }

    /**
     * E.164 format.
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * E.164 format.
     */
    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->initialized['phoneNumber'] = true;
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    public function setJobTitle(?string $jobTitle): self
    {
        $this->initialized['jobTitle'] = true;
        $this->jobTitle = $jobTitle;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): self
    {
        $this->initialized['addressLine1'] = true;
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): self
    {
        $this->initialized['addressLine2'] = true;
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    public function setAddressCity(?string $addressCity): self
    {
        $this->initialized['addressCity'] = true;
        $this->addressCity = $addressCity;

        return $this;
    }

    public function getAddressPostalCode(): ?string
    {
        return $this->addressPostalCode;
    }

    public function setAddressPostalCode(?string $addressPostalCode): self
    {
        $this->initialized['addressPostalCode'] = true;
        $this->addressPostalCode = $addressPostalCode;

        return $this;
    }

    public function getAddressCountry(): ?string
    {
        return $this->addressCountry;
    }

    public function setAddressCountry(?string $addressCountry): self
    {
        $this->initialized['addressCountry'] = true;
        $this->addressCountry = $addressCountry;

        return $this;
    }

    public function getWorkspaceId(): ?string
    {
        return $this->workspaceId;
    }

    public function setWorkspaceId(?string $workspaceId): self
    {
        $this->initialized['workspaceId'] = true;
        $this->workspaceId = $workspaceId;

        return $this;
    }
}
