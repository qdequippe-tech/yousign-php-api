<?php

namespace Qdequippe\Yousign\Api\Model;

class FraudRiskAnalysis
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
     * Overall fraud risk level of the document. `null` when not yet determined.
     *
     * @var string|null
     */
    protected $riskLevel;
    /**
     * List of fraud indicators detected on the document.
     *
     * @var list<FraudRiskAnalysisIndicatorsInner>|null
     */
    protected $indicators;

    /**
     * Overall fraud risk level of the document. `null` when not yet determined.
     */
    public function getRiskLevel(): ?string
    {
        return $this->riskLevel;
    }

    /**
     * Overall fraud risk level of the document. `null` when not yet determined.
     */
    public function setRiskLevel(?string $riskLevel): self
    {
        $this->initialized['riskLevel'] = true;
        $this->riskLevel = $riskLevel;

        return $this;
    }

    /**
     * List of fraud indicators detected on the document.
     *
     * @return list<FraudRiskAnalysisIndicatorsInner>|null
     */
    public function getIndicators(): ?array
    {
        return $this->indicators;
    }

    /**
     * List of fraud indicators detected on the document.
     *
     * @param list<FraudRiskAnalysisIndicatorsInner>|null $indicators
     */
    public function setIndicators(?array $indicators): self
    {
        $this->initialized['indicators'] = true;
        $this->indicators = $indicators;

        return $this;
    }
}
