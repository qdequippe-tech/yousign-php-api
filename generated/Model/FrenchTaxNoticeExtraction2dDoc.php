<?php

namespace Qdequippe\Yousign\Api\Model;

class FrenchTaxNoticeExtraction2dDoc
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
     * The holder full name of the first declarant extracted from the 2D document.
     *
     * @var string|null
     */
    protected $fullName1;
    /**
     * The fiscal number of the first declarant extracted from the 2D document.
     *
     * @var string|null
     */
    protected $fiscalNumber1;
    /**
     * The holder full name of the second declarant extracted from the 2D document.
     *
     * @var string|null
     */
    protected $fullName2;
    /**
     * The fiscal number of the second declarant extracted from the 2D document.
     *
     * @var string|null
     */
    protected $fiscalNumber2;
    /**
     * The tax notice reference number extracted from the 2D document.
     *
     * @var string|null
     */
    protected $taxNoticeReference;
    /**
     * Year of incomes (usually the year before document issuance) extracted from the 2D document.
     *
     * @var int|null
     */
    protected $incomeYear;
    /**
     * The fiscal reference income extracted from the 2D document.
     *
     * @var int|null
     */
    protected $referenceIncome;
    /**
     * Number of parts in the household extracted from the 2D document.
     *
     * @var int|null
     */
    protected $partsCount;

    /**
     * The holder full name of the first declarant extracted from the 2D document.
     */
    public function getFullName1(): ?string
    {
        return $this->fullName1;
    }

    /**
     * The holder full name of the first declarant extracted from the 2D document.
     */
    public function setFullName1(?string $fullName1): self
    {
        $this->initialized['fullName1'] = true;
        $this->fullName1 = $fullName1;

        return $this;
    }

    /**
     * The fiscal number of the first declarant extracted from the 2D document.
     */
    public function getFiscalNumber1(): ?string
    {
        return $this->fiscalNumber1;
    }

    /**
     * The fiscal number of the first declarant extracted from the 2D document.
     */
    public function setFiscalNumber1(?string $fiscalNumber1): self
    {
        $this->initialized['fiscalNumber1'] = true;
        $this->fiscalNumber1 = $fiscalNumber1;

        return $this;
    }

    /**
     * The holder full name of the second declarant extracted from the 2D document.
     */
    public function getFullName2(): ?string
    {
        return $this->fullName2;
    }

    /**
     * The holder full name of the second declarant extracted from the 2D document.
     */
    public function setFullName2(?string $fullName2): self
    {
        $this->initialized['fullName2'] = true;
        $this->fullName2 = $fullName2;

        return $this;
    }

    /**
     * The fiscal number of the second declarant extracted from the 2D document.
     */
    public function getFiscalNumber2(): ?string
    {
        return $this->fiscalNumber2;
    }

    /**
     * The fiscal number of the second declarant extracted from the 2D document.
     */
    public function setFiscalNumber2(?string $fiscalNumber2): self
    {
        $this->initialized['fiscalNumber2'] = true;
        $this->fiscalNumber2 = $fiscalNumber2;

        return $this;
    }

    /**
     * The tax notice reference number extracted from the 2D document.
     */
    public function getTaxNoticeReference(): ?string
    {
        return $this->taxNoticeReference;
    }

    /**
     * The tax notice reference number extracted from the 2D document.
     */
    public function setTaxNoticeReference(?string $taxNoticeReference): self
    {
        $this->initialized['taxNoticeReference'] = true;
        $this->taxNoticeReference = $taxNoticeReference;

        return $this;
    }

    /**
     * Year of incomes (usually the year before document issuance) extracted from the 2D document.
     */
    public function getIncomeYear(): ?int
    {
        return $this->incomeYear;
    }

    /**
     * Year of incomes (usually the year before document issuance) extracted from the 2D document.
     */
    public function setIncomeYear(?int $incomeYear): self
    {
        $this->initialized['incomeYear'] = true;
        $this->incomeYear = $incomeYear;

        return $this;
    }

    /**
     * The fiscal reference income extracted from the 2D document.
     */
    public function getReferenceIncome(): ?int
    {
        return $this->referenceIncome;
    }

    /**
     * The fiscal reference income extracted from the 2D document.
     */
    public function setReferenceIncome(?int $referenceIncome): self
    {
        $this->initialized['referenceIncome'] = true;
        $this->referenceIncome = $referenceIncome;

        return $this;
    }

    /**
     * Number of parts in the household extracted from the 2D document.
     */
    public function getPartsCount(): ?int
    {
        return $this->partsCount;
    }

    /**
     * Number of parts in the household extracted from the 2D document.
     */
    public function setPartsCount(?int $partsCount): self
    {
        $this->initialized['partsCount'] = true;
        $this->partsCount = $partsCount;

        return $this;
    }
}
