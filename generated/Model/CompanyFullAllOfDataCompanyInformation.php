<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfDataCompanyInformation implements AdditionalPropertiesInterface
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
     * Denomination of the company.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Trade name of the company.
     *
     * @var string|null
     */
    protected $tradeName;
    /**
     * The number of the company entity.
     *
     * @var string|null
     */
    protected $companyNumber;
    /**
     * Describes if a company has declined to make some of her data public (ie : legal representatives personal data), when true data might be missing from the response.
     *
     * @var bool|null
     */
    protected $partialData;
    /**
     * Provides the right document type to request for a given company based on its registry. ie: company_certificate, rne_certificate or business_registration_certificate. You can use those types when calling Document Analysis.
     *
     * @var list<string>|null
     */
    protected $requiredDocumentType;
    /**
     * @var CompanyFullAllOfDataCompanyInformationLegalForm|null
     */
    protected $legalForm;
    /**
     * Tax number of the company.
     *
     * @var string|null
     */
    protected $vatNumber;
    /**
     * @var list<CompanyFullAllOfDataCompanyInformationActivities>|null
     */
    protected $activities;
    /**
     * Company's creation date.
     *
     * @var \DateTime|null
     */
    protected $foundedOn;
    /**
     * Indicates the company's cessation date if company is inactive, otherwise null.
     *
     * @var \DateTime|null
     */
    protected $ceasedOn;
    /**
     * Indicates whether or not the company is still active.
     *
     * @var bool|null
     */
    protected $active;
    /**
     * @var CompanyFullAllOfDataCompanyInformationCommercialRegistration|null
     */
    protected $commercialRegistration;
    /**
     * True if the company has at least one employee.
     *
     * @var bool|null
     */
    protected $hasWorkforce;

    /**
     * Denomination of the company.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Denomination of the company.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Trade name of the company.
     */
    public function getTradeName(): ?string
    {
        return $this->tradeName;
    }

    /**
     * Trade name of the company.
     */
    public function setTradeName(?string $tradeName): self
    {
        $this->initialized['tradeName'] = true;
        $this->tradeName = $tradeName;

        return $this;
    }

    /**
     * The number of the company entity.
     */
    public function getCompanyNumber(): ?string
    {
        return $this->companyNumber;
    }

    /**
     * The number of the company entity.
     */
    public function setCompanyNumber(?string $companyNumber): self
    {
        $this->initialized['companyNumber'] = true;
        $this->companyNumber = $companyNumber;

        return $this;
    }

    /**
     * Describes if a company has declined to make some of her data public (ie : legal representatives personal data), when true data might be missing from the response.
     */
    public function getPartialData(): ?bool
    {
        return $this->partialData;
    }

    /**
     * Describes if a company has declined to make some of her data public (ie : legal representatives personal data), when true data might be missing from the response.
     */
    public function setPartialData(?bool $partialData): self
    {
        $this->initialized['partialData'] = true;
        $this->partialData = $partialData;

        return $this;
    }

    /**
     * Provides the right document type to request for a given company based on its registry. ie: company_certificate, rne_certificate or business_registration_certificate. You can use those types when calling Document Analysis.
     *
     * @return list<string>|null
     */
    public function getRequiredDocumentType(): ?array
    {
        return $this->requiredDocumentType;
    }

    /**
     * Provides the right document type to request for a given company based on its registry. ie: company_certificate, rne_certificate or business_registration_certificate. You can use those types when calling Document Analysis.
     *
     * @param list<string>|null $requiredDocumentType
     */
    public function setRequiredDocumentType(?array $requiredDocumentType): self
    {
        $this->initialized['requiredDocumentType'] = true;
        $this->requiredDocumentType = $requiredDocumentType;

        return $this;
    }

    public function getLegalForm(): ?CompanyFullAllOfDataCompanyInformationLegalForm
    {
        return $this->legalForm;
    }

    public function setLegalForm(?CompanyFullAllOfDataCompanyInformationLegalForm $legalForm): self
    {
        $this->initialized['legalForm'] = true;
        $this->legalForm = $legalForm;

        return $this;
    }

    /**
     * Tax number of the company.
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * Tax number of the company.
     */
    public function setVatNumber(?string $vatNumber): self
    {
        $this->initialized['vatNumber'] = true;
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * @return list<CompanyFullAllOfDataCompanyInformationActivities>|null
     */
    public function getActivities(): ?array
    {
        return $this->activities;
    }

    /**
     * @param list<CompanyFullAllOfDataCompanyInformationActivities>|null $activities
     */
    public function setActivities(?array $activities): self
    {
        $this->initialized['activities'] = true;
        $this->activities = $activities;

        return $this;
    }

    /**
     * Company's creation date.
     */
    public function getFoundedOn(): ?\DateTime
    {
        return $this->foundedOn;
    }

    /**
     * Company's creation date.
     */
    public function setFoundedOn(?\DateTime $foundedOn): self
    {
        $this->initialized['foundedOn'] = true;
        $this->foundedOn = $foundedOn;

        return $this;
    }

    /**
     * Indicates the company's cessation date if company is inactive, otherwise null.
     */
    public function getCeasedOn(): ?\DateTime
    {
        return $this->ceasedOn;
    }

    /**
     * Indicates the company's cessation date if company is inactive, otherwise null.
     */
    public function setCeasedOn(?\DateTime $ceasedOn): self
    {
        $this->initialized['ceasedOn'] = true;
        $this->ceasedOn = $ceasedOn;

        return $this;
    }

    /**
     * Indicates whether or not the company is still active.
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * Indicates whether or not the company is still active.
     */
    public function setActive(?bool $active): self
    {
        $this->initialized['active'] = true;
        $this->active = $active;

        return $this;
    }

    public function getCommercialRegistration(): ?CompanyFullAllOfDataCompanyInformationCommercialRegistration
    {
        return $this->commercialRegistration;
    }

    public function setCommercialRegistration(?CompanyFullAllOfDataCompanyInformationCommercialRegistration $commercialRegistration): self
    {
        $this->initialized['commercialRegistration'] = true;
        $this->commercialRegistration = $commercialRegistration;

        return $this;
    }

    /**
     * True if the company has at least one employee.
     */
    public function getHasWorkforce(): ?bool
    {
        return $this->hasWorkforce;
    }

    /**
     * True if the company has at least one employee.
     */
    public function setHasWorkforce(?bool $hasWorkforce): self
    {
        $this->initialized['hasWorkforce'] = true;
        $this->hasWorkforce = $hasWorkforce;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['name' => ['name', 'getName', 'setName'], 'tradeName' => ['trade_name', 'getTradeName', 'setTradeName'], 'companyNumber' => ['company_number', 'getCompanyNumber', 'setCompanyNumber'], 'partialData' => ['partial_data', 'getPartialData', 'setPartialData'], 'requiredDocumentType' => ['required_document_type', 'getRequiredDocumentType', 'setRequiredDocumentType'], 'legalForm' => ['legal_form', 'getLegalForm', 'setLegalForm'], 'vatNumber' => ['vat_number', 'getVatNumber', 'setVatNumber'], 'activities' => ['activities', 'getActivities', 'setActivities'], 'foundedOn' => ['founded_on', 'getFoundedOn', 'setFoundedOn'], 'ceasedOn' => ['ceased_on', 'getCeasedOn', 'setCeasedOn'], 'active' => ['active', 'getActive', 'setActive'], 'commercialRegistration' => ['commercial_registration', 'getCommercialRegistration', 'setCommercialRegistration'], 'hasWorkforce' => ['has_workforce', 'getHasWorkforce', 'setHasWorkforce']];
    }
}
