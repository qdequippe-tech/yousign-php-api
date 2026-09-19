<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateDocumentAnalysisFromApplicantChecks
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
     * Expected income year to check against the document.
     *
     * @var InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck|null
     */
    protected $incomeYearCheck;

    /**
     * Expected income year to check against the document.
     */
    public function getIncomeYearCheck(): ?InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck
    {
        return $this->incomeYearCheck;
    }

    /**
     * Expected income year to check against the document.
     */
    public function setIncomeYearCheck(?InitiateDocumentAnalysisFromApplicantChecksIncomeYearCheck $incomeYearCheck): self
    {
        $this->initialized['incomeYearCheck'] = true;
        $this->incomeYearCheck = $incomeYearCheck;

        return $this;
    }
}
