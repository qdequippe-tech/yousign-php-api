<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CompanyFullAllOfData implements AdditionalPropertiesInterface
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
     * @var CompanyFullAllOfDataExtractedFromDocument|null
     */
    protected $extractedFromDocument;
    /**
     * @var CompanyFullAllOfDataCompanyInformation|null
     */
    protected $companyInformation;
    /**
     * @var CompanyFullAllOfDataHeadquarter|null
     */
    protected $headquarter;
    /**
     * @var list<CompanyFullAllOfDataLegalRepresentatives>|null
     */
    protected $legalRepresentatives;
    /**
     * The company's ultimate beneficial owners, as declared in the local beneficial ownership register. Only available for French companies, and only if your organization subscribed to the corresponding add-on. Empty otherwise, and empty while the verification is still pending or once its data has been anonymized.
     *
     * @var list<CompanyFullAllOfDataBeneficialOwners>|null
     */
    protected $beneficialOwners;

    public function getExtractedFromDocument(): ?CompanyFullAllOfDataExtractedFromDocument
    {
        return $this->extractedFromDocument;
    }

    public function setExtractedFromDocument(?CompanyFullAllOfDataExtractedFromDocument $extractedFromDocument): self
    {
        $this->initialized['extractedFromDocument'] = true;
        $this->extractedFromDocument = $extractedFromDocument;

        return $this;
    }

    public function getCompanyInformation(): ?CompanyFullAllOfDataCompanyInformation
    {
        return $this->companyInformation;
    }

    public function setCompanyInformation(?CompanyFullAllOfDataCompanyInformation $companyInformation): self
    {
        $this->initialized['companyInformation'] = true;
        $this->companyInformation = $companyInformation;

        return $this;
    }

    public function getHeadquarter(): ?CompanyFullAllOfDataHeadquarter
    {
        return $this->headquarter;
    }

    public function setHeadquarter(?CompanyFullAllOfDataHeadquarter $headquarter): self
    {
        $this->initialized['headquarter'] = true;
        $this->headquarter = $headquarter;

        return $this;
    }

    /**
     * @return list<CompanyFullAllOfDataLegalRepresentatives>|null
     */
    public function getLegalRepresentatives(): ?array
    {
        return $this->legalRepresentatives;
    }

    /**
     * @param list<CompanyFullAllOfDataLegalRepresentatives>|null $legalRepresentatives
     */
    public function setLegalRepresentatives(?array $legalRepresentatives): self
    {
        $this->initialized['legalRepresentatives'] = true;
        $this->legalRepresentatives = $legalRepresentatives;

        return $this;
    }

    /**
     * The company's ultimate beneficial owners, as declared in the local beneficial ownership register. Only available for French companies, and only if your organization subscribed to the corresponding add-on. Empty otherwise, and empty while the verification is still pending or once its data has been anonymized.
     *
     * @return list<CompanyFullAllOfDataBeneficialOwners>|null
     */
    public function getBeneficialOwners(): ?array
    {
        return $this->beneficialOwners;
    }

    /**
     * The company's ultimate beneficial owners, as declared in the local beneficial ownership register. Only available for French companies, and only if your organization subscribed to the corresponding add-on. Empty otherwise, and empty while the verification is still pending or once its data has been anonymized.
     *
     * @param list<CompanyFullAllOfDataBeneficialOwners>|null $beneficialOwners
     */
    public function setBeneficialOwners(?array $beneficialOwners): self
    {
        $this->initialized['beneficialOwners'] = true;
        $this->beneficialOwners = $beneficialOwners;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['extractedFromDocument' => ['extracted_from_document', 'getExtractedFromDocument', 'setExtractedFromDocument'], 'companyInformation' => ['company_information', 'getCompanyInformation', 'setCompanyInformation'], 'headquarter' => ['headquarter', 'getHeadquarter', 'setHeadquarter'], 'legalRepresentatives' => ['legal_representatives', 'getLegalRepresentatives', 'setLegalRepresentatives'], 'beneficialOwners' => ['beneficial_owners', 'getBeneficialOwners', 'setBeneficialOwners']];
    }
}
