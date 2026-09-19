<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateTaxNoticeChecks
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
     * Expected full name to check against the document.
     *
     * @var InitiateTaxNoticeChecksFullNameCheck|null
     */
    protected $fullNameCheck;
    /**
     * Expected income year to check against the document.
     *
     * @var InitiateTaxNoticeChecksIncomeYearCheck|null
     */
    protected $incomeYearCheck;

    /**
     * Expected full name to check against the document.
     */
    public function getFullNameCheck(): ?InitiateTaxNoticeChecksFullNameCheck
    {
        return $this->fullNameCheck;
    }

    /**
     * Expected full name to check against the document.
     */
    public function setFullNameCheck(?InitiateTaxNoticeChecksFullNameCheck $fullNameCheck): self
    {
        $this->initialized['fullNameCheck'] = true;
        $this->fullNameCheck = $fullNameCheck;

        return $this;
    }

    /**
     * Expected income year to check against the document.
     */
    public function getIncomeYearCheck(): ?InitiateTaxNoticeChecksIncomeYearCheck
    {
        return $this->incomeYearCheck;
    }

    /**
     * Expected income year to check against the document.
     */
    public function setIncomeYearCheck(?InitiateTaxNoticeChecksIncomeYearCheck $incomeYearCheck): self
    {
        $this->initialized['incomeYearCheck'] = true;
        $this->incomeYearCheck = $incomeYearCheck;

        return $this;
    }
}
