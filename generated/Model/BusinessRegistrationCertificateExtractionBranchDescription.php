<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BusinessRegistrationCertificateExtractionBranchDescription implements AdditionalPropertiesInterface
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
     * Address extracted from the document.
     *
     * @var string|null
     */
    protected $address;
    /**
     * City extracted from the document.
     *
     * @var string|null
     */
    protected $city;
    /**
     * Postal code extracted from the document.
     *
     * @var string|null
     */
    protected $postalCode;
    /**
     * Indicates whether the branch is active or not.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * Branch company number extracted from the document.
     *
     * @var string|null
     */
    protected $branchCompanyNumber;

    /**
     * Address extracted from the document.
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * Address extracted from the document.
     */
    public function setAddress(?string $address): self
    {
        $this->initialized['address'] = true;
        $this->address = $address;

        return $this;
    }

    /**
     * City extracted from the document.
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * City extracted from the document.
     */
    public function setCity(?string $city): self
    {
        $this->initialized['city'] = true;
        $this->city = $city;

        return $this;
    }

    /**
     * Postal code extracted from the document.
     */
    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    /**
     * Postal code extracted from the document.
     */
    public function setPostalCode(?string $postalCode): self
    {
        $this->initialized['postalCode'] = true;
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * Indicates whether the branch is active or not.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Indicates whether the branch is active or not.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * Branch company number extracted from the document.
     */
    public function getBranchCompanyNumber(): ?string
    {
        return $this->branchCompanyNumber;
    }

    /**
     * Branch company number extracted from the document.
     */
    public function setBranchCompanyNumber(?string $branchCompanyNumber): self
    {
        $this->initialized['branchCompanyNumber'] = true;
        $this->branchCompanyNumber = $branchCompanyNumber;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['address' => ['address', 'getAddress', 'setAddress'], 'city' => ['city', 'getCity', 'setCity'], 'postalCode' => ['postal_code', 'getPostalCode', 'setPostalCode'], 'active' => ['active', 'getActive', 'setActive'], 'branchCompanyNumber' => ['branch_company_number', 'getBranchCompanyNumber', 'setBranchCompanyNumber']];
    }
}
