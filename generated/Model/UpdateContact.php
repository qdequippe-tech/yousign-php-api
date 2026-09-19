<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class UpdateContact implements AdditionalPropertiesInterface
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
     * Locale settings used for communication.
     *
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
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $jobTitle;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $addressLine1;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $addressLine2;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $addressCity;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     *
     * @var string|null
     */
    protected $addressPostalCode;
    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
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

    /**
     * Locale settings used for communication.
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * Locale settings used for communication.
     */
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

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getJobTitle(): ?string
    {
        return $this->jobTitle;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setJobTitle(?string $jobTitle): self
    {
        $this->initialized['jobTitle'] = true;
        $this->jobTitle = $jobTitle;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setAddressLine1(?string $addressLine1): self
    {
        $this->initialized['addressLine1'] = true;
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setAddressLine2(?string $addressLine2): self
    {
        $this->initialized['addressLine2'] = true;
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setAddressCity(?string $addressCity): self
    {
        $this->initialized['addressCity'] = true;
        $this->addressCity = $addressCity;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getAddressPostalCode(): ?string
    {
        return $this->addressPostalCode;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function setAddressPostalCode(?string $addressPostalCode): self
    {
        $this->initialized['addressPostalCode'] = true;
        $this->addressPostalCode = $addressPostalCode;

        return $this;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
     */
    public function getAddressCountry(): ?string
    {
        return $this->addressCountry;
    }

    /**
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string).
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

    public function definedProperties(): array
    {
        return ['firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'email' => ['email', 'getEmail', 'setEmail'], 'locale' => ['locale', 'getLocale', 'setLocale'], 'phoneNumber' => ['phone_number', 'getPhoneNumber', 'setPhoneNumber'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName'], 'jobTitle' => ['job_title', 'getJobTitle', 'setJobTitle'], 'addressLine1' => ['address_line_1', 'getAddressLine1', 'setAddressLine1'], 'addressLine2' => ['address_line_2', 'getAddressLine2', 'setAddressLine2'], 'addressCity' => ['address_city', 'getAddressCity', 'setAddressCity'], 'addressPostalCode' => ['address_postal_code', 'getAddressPostalCode', 'setAddressPostalCode'], 'addressCountry' => ['address_country', 'getAddressCountry', 'setAddressCountry'], 'workspaceId' => ['workspace_id', 'getWorkspaceId', 'setWorkspaceId']];
    }
}
