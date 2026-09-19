<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyCertificateExtractionLegalRepresentativesInner implements AdditionalPropertiesInterface
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
     * Type of the legal representative extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Function of the individual extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $function;
    /**
     * First name of the individual extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $firstName;
    /**
     * Last name of the individual extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $lastName;
    /**
     * Full name of the individual extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * Company name extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $companyName;
    /**
     * Company number extracted from the list of legal representatives in the document.
     *
     * @var string|null
     */
    protected $companyNumber;

    /**
     * Type of the legal representative extracted from the list of legal representatives in the document.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Type of the legal representative extracted from the list of legal representatives in the document.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Function of the individual extracted from the list of legal representatives in the document.
     */
    public function getFunction(): ?string
    {
        return $this->function;
    }

    /**
     * Function of the individual extracted from the list of legal representatives in the document.
     */
    public function setFunction(?string $function): self
    {
        $this->initialized['function'] = true;
        $this->function = $function;

        return $this;
    }

    /**
     * First name of the individual extracted from the list of legal representatives in the document.
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * First name of the individual extracted from the list of legal representatives in the document.
     */
    public function setFirstName(?string $firstName): self
    {
        $this->initialized['firstName'] = true;
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Last name of the individual extracted from the list of legal representatives in the document.
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * Last name of the individual extracted from the list of legal representatives in the document.
     */
    public function setLastName(?string $lastName): self
    {
        $this->initialized['lastName'] = true;
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Full name of the individual extracted from the list of legal representatives in the document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * Full name of the individual extracted from the list of legal representatives in the document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Company name extracted from the list of legal representatives in the document.
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * Company name extracted from the list of legal representatives in the document.
     */
    public function setCompanyName(?string $companyName): self
    {
        $this->initialized['companyName'] = true;
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Company number extracted from the list of legal representatives in the document.
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * Company number extracted from the list of legal representatives in the document.
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'function' => ['function', 'getFunction', 'setFunction'], 'firstName' => ['first_name', 'getFirstName', 'setFirstName'], 'lastName' => ['last_name', 'getLastName', 'setLastName'], 'fullName' => ['full_name', 'getFullName', 'setFullName'], 'companyName' => ['company_name', 'getCompanyName', 'setCompanyName'], 'companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber']];
    }
}
