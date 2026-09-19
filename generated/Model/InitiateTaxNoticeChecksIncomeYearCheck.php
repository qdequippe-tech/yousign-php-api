<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateTaxNoticeChecksIncomeYearCheck
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
     * @var string|null
     */
    protected $incomeYear;

    /**
     * Expected income year to check against the document.
     */
    public function getIncomeYear(): ?string
    {
        return $this->incomeYear;
    }

    /**
     * Expected income year to check against the document.
     */
    public function setIncomeYear(?string $incomeYear): self
    {
        $this->initialized['incomeYear'] = true;
        $this->incomeYear = $incomeYear;

        return $this;
    }
}
