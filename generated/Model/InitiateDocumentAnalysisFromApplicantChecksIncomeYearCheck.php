<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck
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
     * The expected income year to check against the tax notice document.
     *
     * @var int|null
     */
    protected $incomeYear;

    /**
     * The expected income year to check against the tax notice document.
     */
    public function getIncomeYear(): ?int
    {
        return $this->incomeYear;
    }

    /**
     * The expected income year to check against the tax notice document.
     */
    public function setIncomeYear(?int $incomeYear): self
    {
        $this->initialized['incomeYear'] = true;
        $this->incomeYear = $incomeYear;

        return $this;
    }
}
