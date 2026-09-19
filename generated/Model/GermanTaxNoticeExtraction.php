<?php

namespace Qdequippe\Yousign\Api\Model;

class GermanTaxNoticeExtraction
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
     * The holder full name of the first declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fullName1;
    /**
     * The holder full name of the second declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fullName2;
    /**
     * The tax identification number (IdNr) of the first declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fiscalNumber1;
    /**
     * The tax identification number (IdNr) of the second declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fiscalNumber2;
    /**
     * The tax notice issuance date extracted from the document.
     *
     * @var \DateTime|null
     */
    protected $issuanceDate;
    /**
     * Year of incomes (usually the year before document issuance) extracted from the document.
     *
     * @var int|null
     */
    protected $incomeYear;
    /**
     * The taxable income (zu versteuerndes Einkommen) extracted from the document.
     *
     * @var int|null
     */
    protected $referenceIncome;
    /**
     * The document type extracted from the document.
     *
     * @var string|null
     */
    protected $documentType;

    /**
     * The holder full name of the first declarant extracted from the document.
     */
    public function getFullName1(): ?string
    {
        return $this->fullName1;
    }

    /**
     * The holder full name of the first declarant extracted from the document.
     */
    public function setFullName1(?string $fullName1): self
    {
        $this->initialized['fullName1'] = true;
        $this->fullName1 = $fullName1;

        return $this;
    }

    /**
     * The holder full name of the second declarant extracted from the document.
     */
    public function getFullName2(): ?string
    {
        return $this->fullName2;
    }

    /**
     * The holder full name of the second declarant extracted from the document.
     */
    public function setFullName2(?string $fullName2): self
    {
        $this->initialized['fullName2'] = true;
        $this->fullName2 = $fullName2;

        return $this;
    }

    /**
     * The tax identification number (IdNr) of the first declarant extracted from the document.
     */
    public function getFiscalNumber1(): ?string
    {
        return $this->fiscalNumber1;
    }

    /**
     * The tax identification number (IdNr) of the first declarant extracted from the document.
     */
    public function setFiscalNumber1(?string $fiscalNumber1): self
    {
        $this->initialized['fiscalNumber1'] = true;
        $this->fiscalNumber1 = $fiscalNumber1;

        return $this;
    }

    /**
     * The tax identification number (IdNr) of the second declarant extracted from the document.
     */
    public function getFiscalNumber2(): ?string
    {
        return $this->fiscalNumber2;
    }

    /**
     * The tax identification number (IdNr) of the second declarant extracted from the document.
     */
    public function setFiscalNumber2(?string $fiscalNumber2): self
    {
        $this->initialized['fiscalNumber2'] = true;
        $this->fiscalNumber2 = $fiscalNumber2;

        return $this;
    }

    /**
     * The tax notice issuance date extracted from the document.
     */
    public function getIssuanceDate(): ?\DateTime
    {
        return $this->issuanceDate;
    }

    /**
     * The tax notice issuance date extracted from the document.
     */
    public function setIssuanceDate(?\DateTime $issuanceDate): self
    {
        $this->initialized['issuanceDate'] = true;
        $this->issuanceDate = $issuanceDate;

        return $this;
    }

    /**
     * Year of incomes (usually the year before document issuance) extracted from the document.
     */
    public function getIncomeYear(): ?int
    {
        return $this->incomeYear;
    }

    /**
     * Year of incomes (usually the year before document issuance) extracted from the document.
     */
    public function setIncomeYear(?int $incomeYear): self
    {
        $this->initialized['incomeYear'] = true;
        $this->incomeYear = $incomeYear;

        return $this;
    }

    /**
     * The taxable income (zu versteuerndes Einkommen) extracted from the document.
     */
    public function getReferenceIncome(): ?int
    {
        return $this->referenceIncome;
    }

    /**
     * The taxable income (zu versteuerndes Einkommen) extracted from the document.
     */
    public function setReferenceIncome(?int $referenceIncome): self
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
