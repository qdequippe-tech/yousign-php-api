<?php

namespace Qdequippe\Yousign\Api\Model;

class ItalianTaxNoticeExtraction
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
     * The employer (sostituto d'imposta) name extracted from the document.
     *
     * @var string|null
     */
    protected $employerName;
    /**
     * The employer Codice Fiscale (11 digits) extracted from the document.
     *
     * @var string|null
     */
    protected $employerCodiceFiscale;
    /**
     * The certified employee/pensioner full name extracted from the document.
     *
     * @var string|null
     */
    protected $employeeFullName;
    /**
     * The certified employee/pensioner Codice Fiscale (16 characters) extracted from the document.
     *
     * @var string|null
     */
    protected $employeeCodiceFiscale;
    /**
     * The certification issuance date (firma del sostituto d'imposta) extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * The income reference year ("RELATIVA ALL'ANNO") extracted from the document.
     *
     * @var int|null
     */
    protected $incomeYear;
    /**
     * The reference income (first filled of Punti 1-5) extracted from the document.
     *
     * @var float|null
     */
    protected $referenceIncome;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The employer (sostituto d'imposta) name extracted from the document.
     */
    public function getEmployerName(): ?string
    {
        return $this->employerName;
    }

    /**
     * The employer (sostituto d'imposta) name extracted from the document.
     */
    public function setEmployerName(?string $employerName): self
    {
        $this->initialized['employerName'] = true;
        $this->employerName = $employerName;

        return $this;
    }

    /**
     * The employer Codice Fiscale (11 digits) extracted from the document.
     */
    public function getEmployerCodiceFiscale(): ?string
    {
        return $this->employerCodiceFiscale;
    }

    /**
     * The employer Codice Fiscale (11 digits) extracted from the document.
     */
    public function setEmployerCodiceFiscale(?string $employerCodiceFiscale): self
    {
        $this->initialized['employerCodiceFiscale'] = true;
        $this->employerCodiceFiscale = $employerCodiceFiscale;

        return $this;
    }

    /**
     * The certified employee/pensioner full name extracted from the document.
     */
    public function getEmployeeFullName(): ?string
    {
        return $this->employeeFullName;
    }

    /**
     * The certified employee/pensioner full name extracted from the document.
     */
    public function setEmployeeFullName(?string $employeeFullName): self
    {
        $this->initialized['employeeFullName'] = true;
        $this->employeeFullName = $employeeFullName;

        return $this;
    }

    /**
     * The certified employee/pensioner Codice Fiscale (16 characters) extracted from the document.
     */
    public function getEmployeeCodiceFiscale(): ?string
    {
        return $this->employeeCodiceFiscale;
    }

    /**
     * The certified employee/pensioner Codice Fiscale (16 characters) extracted from the document.
     */
    public function setEmployeeCodiceFiscale(?string $employeeCodiceFiscale): self
    {
        $this->initialized['employeeCodiceFiscale'] = true;
        $this->employeeCodiceFiscale = $employeeCodiceFiscale;

        return $this;
    }

    /**
     * The certification issuance date (firma del sostituto d'imposta) extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The certification issuance date (firma del sostituto d'imposta) extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * The income reference year ("RELATIVA ALL'ANNO") extracted from the document.
     */
    public function getIncomeYear(): ?int
    {
        return $this->incomeYear;
    }

    /**
     * The income reference year ("RELATIVA ALL'ANNO") extracted from the document.
     */
    public function setIncomeYear(?int $incomeYear): self
    {
        $this->initialized['incomeYear'] = true;
        $this->incomeYear = $incomeYear;

        return $this;
    }

    /**
     * The reference income (first filled of Punti 1-5) extracted from the document.
     */
    public function getReferenceIncome(): ?float
    {
        return $this->referenceIncome;
    }

    /**
     * The reference income (first filled of Punti 1-5) extracted from the document.
     */
    public function setReferenceIncome(?float $referenceIncome): self
    {
        $this->initialized['referenceIncome'] = true;
        $this->referenceIncome = $referenceIncome;

        return $this;
    }

    /**
     * The document type extracted from the document.
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * The document type extracted from the document.
     */
    public function setDocumentType(?string $documentType): self
    {
        $this->initialized['documentType'] = true;
        $this->documentType = $documentType;

        return $this;
    }
}
