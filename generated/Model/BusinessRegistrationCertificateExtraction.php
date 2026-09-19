<?php

namespace Qdequippe\Yousign\Api\Model;

class BusinessRegistrationCertificateExtraction
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
     * Issuance date extracted from the document.
     *
     * @var string|null
     */
    protected $issuanceDate;
    /**
     * @var BusinessRegistrationCertificateExtractionCompanyDescription|null
     */
    protected $companyDescription;
    /**
     * @var BusinessRegistrationCertificateExtractionBranchDescription|null
     */
    protected $branchDescription;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * Issuance date extracted from the document.
     */
    public function getIssuanceDate(): ?string
    {
        return $this->issuanceDate;
    }

    /**
     * Issuance date extracted from the document.
     */
    public function setIssuanceDate(?string $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    public function getCompanyDescription(): ?BusinessRegistrationCertificateExtractionCompanyDescription
    {
        return $this->companyDescription;
    }

    public function setCompanyDescription(?BusinessRegistrationCertificateExtractionCompanyDescription $companyDescription): self
    {
        $this->initialized['companyDescription'] = true;
        $this->companyDescription = $companyDescription;

        return $this;
    }

    public function getBranchDescription(): ?BusinessRegistrationCertificateExtractionBranchDescription
    {
        return $this->branchDescription;
    }

    public function setBranchDescription(?BusinessRegistrationCertificateExtractionBranchDescription $branchDescription): self
    {
        $this->initialized['branchDescription'] = true;
        $this->branchDescription = $branchDescription;

        return $this;
    }

    /**
     * Classification label extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * Classification label extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
