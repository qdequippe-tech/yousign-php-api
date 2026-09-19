<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class BusinessRegistrationCertificateExtractionCompanyDescription implements AdditionalPropertiesInterface
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
     * Indicates whether the company is active or not.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * Legal form extracted from the document.
     *
     * @var string|null
     */
    protected $legalForm;
    /**
     * Company name extracted from the document.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Company number extracted from the document.
     *
     * @var string|null
     */
    protected $companyNumber;
    /**
     * Headquarter company number extracted from the document.
     *
     * @var string|null
     */
    protected $headquarterCompanyNumber;
    /**
     * First name of the individual extracted from the document. Null if not a sole proprietor.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the individual extracted from the document. Null if not a sole proprietor.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Full name of the individual extracted from the document. Null if not a sole proprietor.
     *
     * @var string|null
     */
    protected $fullName;

    /**
     * Indicates whether the company is active or not.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Indicates whether the company is active or not.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    /**
     * Legal form extracted from the document.
     */
    public function getLegalForm(): ?string
    {
        return $this->legalForm;
    }

    /**
     * Legal form extracted from the document.
     */
    public function setLegalForm(?string $legalForm): self
    {
        $this->initialized['legalForm'] = true;
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Company name extracted from the document.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Company name extracted from the document.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Company number extracted from the document.
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * Company number extracted from the document.
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * Headquarter company number extracted from the document.
     */
    public function getHeadquarterCompanyNumber(): ?string
    {
        return $this->headquarterCompanyNumber;
    }

    /**
     * Headquarter company number extracted from the document.
     */
    public function setHeadquarterCompanyNumber(?string $headquarterCompanyNumber): self
    {
        $this->initialized['headquarterCompanyNumber'] = true;
        $this->headquarterCompanyNumber = $headquarterCompanyNumber;

        return $this;
    }

    /**
     * First name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Full name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name of the individual extracted from the document. Null if not a sole proprietor.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['active' => ['active', 'getActive', 'setActive'], 'legalForm' => ['legal_form', 'getLegalForm', 'setLegalForm'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName'], 'companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber'], 'headquarterCompanyNumber' => ['headquarter_company_number', 'getHeadquarterCompanyNumber', 'setHeadquarterCompanyNumber'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'fullName' => ['full_name', 'getFullName', 'setFullName']];
    }
}
