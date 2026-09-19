<?php

namespace Qdequippe\Yousign\Api\Model;

class InitiateFraudOnlyAnalysisType
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
     * Must be `"false"` for a fraud-only analysis.
     *
     * @var string|null
     */
    protected $extraction;
    /**
     * Must be `advanced` for a fraud-only analysis.
     *
     * @var string|null
     */
    protected $fraudLevel;

    /**
     * Must be `"false"` for a fraud-only analysis.
     */
    public function getExtraction(): ?string
    {
        return $this->extraction;
    }

    /**
     * Must be `"false"` for a fraud-only analysis.
     */
    public function setExtraction(?string $extraction): self
    {
        $this->initialized['extraction'] = true;
        $this->extraction = $extraction;

        return $this;
    }

    /**
     * Must be `advanced` for a fraud-only analysis.
     */
    public function getFraudLevel(): ?string
    {
        return $this->fraudLevel;
    }

    /**
     * Must be `advanced` for a fraud-only analysis.
     */
    public function setFraudLevel(?string $fraudLevel): self
    {
        $this->initialized['fraudLevel'] = true;
        $this->fraudLevel = $fraudLevel;

        return $this;
    }
}
