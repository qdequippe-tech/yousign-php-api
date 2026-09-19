<?php

namespace Qdequippe\Yousign\Api\Model;

class TaxNoticeCheckIncomeYear
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
     * The extracted value from the document.
     *
     * @var int|null
     */
    protected $extracted;
    /**
     * The expected value for the check.
     *
     * @var int|null
     */
    protected $expected;
    /**
     * Level of match between extracted and expected value.
     *
     * @var string|null
     */
    protected $matchLevel;

    /**
     * The extracted value from the document.
     */
    public function getExtracted(): ?int
    {
        return $this->extracted;
    }

    /**
     * The extracted value from the document.
     */
    public function setExtracted(?int $extracted): self
    {
        $this->initialized['extracted'] = true;
        $this->extracted = $extracted;

        return $this;
    }

    /**
     * The expected value for the check.
     */
    public function getExpected(): ?int
    {
        return $this->expected;
    }

    /**
     * The expected value for the check.
     */
    public function setExpected(?int $expected): self
    {
        $this->initialized['expected'] = true;
        $this->expected = $expected;

        return $this;
    }

    /**
     * Level of match between extracted and expected value.
     */
    public function getMatchLevel(): ?string
    {
        return $this->matchLevel;
    }

    /**
     * Level of match between extracted and expected value.
     */
    public function setMatchLevel(?string $matchLevel): self
    {
        $this->initialized['matchLevel'] = true;
        $this->matchLevel = $matchLevel;

        return $this;
    }
}
