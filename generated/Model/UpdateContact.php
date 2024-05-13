<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateContact extends \ArrayObject
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
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $jobTitle;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $addressLine1;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $addressLine2;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $addressCity;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $addressPostalCode;
    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     *
     * @var string|null
     */
    protected $addressCountry;
    /**
     * @var string|null
     */
    protected $workspaceId;

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

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setJobTitle(?string $jobTitle): self
    {
        $this->initialized['jobTitle'] = true;
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setAddressLine1(?string $addressLine1): self
    {
        $this->initialized['addressLine1'] = true;
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setAddressLine2(?string $addressLine2): self
    {
        $this->initialized['addressLine2'] = true;
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setAddressCity(?string $addressCity): self
    {
        $this->initialized['addressCity'] = true;
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getAddressPostalCode(): ?string
    {
        return $this->addressPostalCode;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function setAddressPostalCode(?string $addressPostalCode): self
    {
        $this->initialized['addressPostalCode'] = true;
        $this->addressPostalCode = $addressPostalCode;

        return $this;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
    public function getAddressCountry(): ?string
    {
        return $this->addressCountry;
    }

    /**
     * This property cannot start or end with whitespace, does not allow HTML tags, URL or email.
     */
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
