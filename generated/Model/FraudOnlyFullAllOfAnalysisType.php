<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class FraudOnlyFullAllOfAnalysisType implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
    /**
     * @var array
     */
    protected $initialized = [];

    public function isInitialized($property): bool
    {
        return \array_key_exists($property, $this->initialized);
    }
    /**
     * Always `false` for a fraud-only analysis.
     *
     * @var bool|null
     */
    protected $extraction;
    /**
     * Always `advanced` for a fraud-only analysis.
     *
     * @var string|null
     */
    protected $fraudLevel;

    /**
     * Always `false` for a fraud-only analysis.
     */
    public function getExtraction(): ?bool
    {
        return $this->extraction;
    }

    /**
     * Always `false` for a fraud-only analysis.
     */
    public function setExtraction(?bool $extraction): self
    {
        $this->initialized['extraction'] = true;
        $this->extraction = $extraction;

        return $this;
    }

    /**
     * Always `advanced` for a fraud-only analysis.
     */
    public function getFraudLevel(): ?string
    {
        return $this->fraudLevel;
    }

    /**
     * Always `advanced` for a fraud-only analysis.
     */
    public function setFraudLevel(?string $fraudLevel): self
    {
        $this->initialized['fraudLevel'] = true;
        $this->fraudLevel = $fraudLevel;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['extraction' => ['extraction', 'getExtraction', 'setExtraction'], 'fraudLevel' => ['fraud_level', 'getFraudLevel', 'setFraudLevel']];
    }
}
