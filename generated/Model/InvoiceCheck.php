<?php

namespace Qdequippe\Yousign\Api\Model;

class InvoiceCheck
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
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     *
     * @var DocumentAnalysisCheck|null
     */
    protected $buyerName;

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function getBuyerName(): ?DocumentAnalysisCheck
    {
        return $this->buyerName;
    }

    /**
     * Represents the result of checking if an extracted value matches an expected value with different levels of match (exact, close, or no match).
     */
    public function setBuyerName(?DocumentAnalysisCheck $buyerName): self
    {
        $this->initialized['buyerName'] = true;
        $this->buyerName = $buyerName;

        return $this;
    }
}
