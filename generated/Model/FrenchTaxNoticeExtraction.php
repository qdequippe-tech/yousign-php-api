<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchTaxNoticeExtraction
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
     * The holder full name extracted from the document.
     *
     * @var string|null
     */
    protected $fullName;
    /**
     * The fiscal number of the first declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fiscalNumber1;
    /**
     * The fiscal number of the second declarant extracted from the document.
     *
     * @var string|null
     */
    protected $fiscalNumber2;
    /**
     * The tax notice reference number extracted from the document.
     *
     * @var string|null
     */
    protected $taxNoticeReference;
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
     * The fiscal reference income extracted from the document.
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
     * The 2D document extracted from the document.
     *
     * @var FrenchTaxNoticeExtraction2dDoc|null
     */
    protected $n2dDoc;

    /**
     * The holder full name extracted from the document.
     */
    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    /**
     * The holder full name extracted from the document.
     */
    public function setFullName(?string $fullName): self
    {
        $this->initialized['fullName'] = true;
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * The fiscal number of the first declarant extracted from the document.
     */
    public function getFiscalNumber1(): ?string
    {
        return $this->fiscalNumber1;
    }

    /**
     * The fiscal number of the first declarant extracted from the document.
     */
    public function setFiscalNumber1(?string $fiscalNumber1): self
    {
        $this->initialized['fiscalNumber1'] = true;
        $this->fiscalNumber1 = $fiscalNumber1;

        return $this;
    }

    /**
     * The fiscal number of the second declarant extracted from the document.
     */
    public function getFiscalNumber2(): ?string
    {
        return $this->fiscalNumber2;
    }

    /**
     * The fiscal number of the second declarant extracted from the document.
     */
    public function setFiscalNumber2(?string $fiscalNumber2): self
    {
        $this->initialized['fiscalNumber2'] = true;
        $this->fiscalNumber2 = $fiscalNumber2;

        return $this;
    }

    /**
     * The tax notice reference number extracted from the document.
     */
    public function getTaxNoticeReference(): ?string
    {
        return $this->taxNoticeReference;
    }

    /**
     * The tax notice reference number extracted from the document.
     */
    public function setTaxNoticeReference(?string $taxNoticeReference): self
    {
        $this->initialized['taxNoticeReference'] = true;
        $this->taxNoticeReference = $taxNoticeReference;

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
     * The fiscal reference income extracted from the document.
     */
    public function getReferenceIncome(): ?int
    {
        return $this->referenceIncome;
    }

    /**
     * The fiscal reference income extracted from the document.
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

    /**
     * The 2D document extracted from the document.
     */
    public function get2dDoc(): ?FrenchTaxNoticeExtraction2dDoc
    {
        return $this->n2dDoc;
    }

    /**
     * The 2D document extracted from the document.
     */
    public function set2dDoc(?FrenchTaxNoticeExtraction2dDoc $n2dDoc): self
    {
        $this->initialized['n2dDoc'] = true;
        $this->n2dDoc = $n2dDoc;

        return $this;
    }
}
