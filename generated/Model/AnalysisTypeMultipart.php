<?php

namespace Qdequippe\Yousign\Api\Model;

class AnalysisTypeMultipart
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
     * Whether to extract data from the document. Defaults to `"true"` when omitted.
     * Set to `"false"` to run a fraud-only analysis (no data extraction).
     *
     * @var string|null
     */
    protected $extraction = 'true';
    /**
     * Level of fraud detection to run. `null` (default) disables fraud detection.
     * Not supported for type `tax_notice`. Must be `advanced` when `extraction` is `"false"`.
     *
     * @var string|null
     */
    protected $fraudLevel;

    /**
     * Whether to extract data from the document. Defaults to `"true"` when omitted.
     * Set to `"false"` to run a fraud-only analysis (no data extraction).
     */
    public function getExtraction(): ?string
    {
        return $this->extraction;
    }

    /**
     * Whether to extract data from the document. Defaults to `"true"` when omitted.
     * Set to `"false"` to run a fraud-only analysis (no data extraction).
     */
    public function setExtraction(?string $extraction): self
    {
        $this->initialized['extraction'] = true;
        $this->extraction = $extraction;

        return $this;
    }

    /**
     * Level of fraud detection to run. `null` (default) disables fraud detection.
     * Not supported for type `tax_notice`. Must be `advanced` when `extraction` is `"false"`.
     */
    public function getFraudLevel(): ?string
    {
        return $this->fraudLevel;
    }

    /**
     * Level of fraud detection to run. `null` (default) disables fraud detection.
     * Not supported for type `tax_notice`. Must be `advanced` when `extraction` is `"false"`.
     */
    public function setFraudLevel(?string $fraudLevel): self
    {
        $this->initialized['fraudLevel'] = true;
        $this->fraudLevel = $fraudLevel;

        return $this;
    }
}
