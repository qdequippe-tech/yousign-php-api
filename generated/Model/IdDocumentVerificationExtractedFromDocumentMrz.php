<?php

namespace Qdequippe\Yousign\Api\Model;

class IdDocumentVerificationExtractedFromDocumentMrz extends \ArrayObject
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
     * MRZ line 1.
     *
     * @var string|null
     */
    protected $line1;
    /**
     * MRZ line 2.
     *
     * @var string|null
     */
    protected $line2;
    /**
     * MRZ line 3.
     *
     * @var string|null
     */
    protected $line3;

    /**
     * MRZ line 1.
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * MRZ line 1.
     */
    public function setLine1(?string $line1): self
    {
        $this->initialized['line1'] = true;
        $this->line1 = $line1;

        return $this;
    }

    /**
     * MRZ line 2.
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * MRZ line 2.
     */
    public function setLine2(?string $line2): self
    {
        $this->initialized['line2'] = true;
        $this->line2 = $line2;

        return $this;
    }

    /**
     * MRZ line 3.
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * MRZ line 3.
     */
    public function setLine3(?string $line3): self
    {
        $this->initialized['line3'] = true;
        $this->line3 = $line3;

        return $this;
    }
}
