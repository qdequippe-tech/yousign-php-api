<?php

namespace Qdequippe\Yousign\Api\Model;

class RNECertificateExtraction
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
     * Registered address extracted from the document.
     *
     * @var string|null
     */
    protected $registeredAddress;
    /**
     * Issuance date extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * List of legal representatives extracted from the document.
     *
     * @var list<CompanyCertificateExtractionLegalRepresentativesInner>|null
     */
    protected $legalRepresentatives;
    /**
     * Classification label extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

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
     * Registered address extracted from the document.
     */
    public function getRegisteredAddress(): ?string
    {
        return $this->registeredAddress;
    }

    /**
     * Registered address extracted from the document.
     */
    public function setRegisteredAddress(?string $registeredAddress): self
    {
        $this->initialized['registeredAddress'] = true;
        $this->registeredAddress = $registeredAddress;

        return $this;
    }

    /**
     * Issuance date extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * Issuance date extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * List of legal representatives extracted from the document.
     *
     * @return list<CompanyCertificateExtractionLegalRepresentativesInner>|null
     */
    public function getLegalRepresentatives(): ?array
    {
        return $this->legalRepresentatives;
    }

    /**
     * List of legal representatives extracted from the document.
     *
     * @param list<CompanyCertificateExtractionLegalRepresentativesInner>|null $legalRepresentatives
     */
    public function setLegalRepresentatives(?array $legalRepresentatives): self
    {
        $this->initialized['legalRepresentatives'] = true;
        $this->legalRepresentatives = $legalRepresentatives;

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
