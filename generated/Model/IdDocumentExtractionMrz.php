<?php

namespace Qdequippe\Yousign\Api\Model;

class IdDocumentExtractionMrz
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
     * The first line of the MRZ.
     *
     * @var string|null
     */
    protected $line1;
    /**
     * The second line of the MRZ.
     *
     * @var string|null
     */
    protected $line2;
    /**
     * The third line of the MRZ.
     *
     * @var string|null
     */
    protected $line3;

    /**
     * The first line of the MRZ.
     */
    public function getLine1(): ?string
    {
        return $this->line1;
    }

    /**
     * The first line of the MRZ.
     */
    public function setLine1(?string $line1): self
    {
        $this->initialized['line1'] = true;
        $this->line1 = $line1;

        return $this;
    }

    /**
     * The second line of the MRZ.
     */
    public function getLine2(): ?string
    {
        return $this->line2;
    }

    /**
     * The second line of the MRZ.
     */
    public function setLine2(?string $line2): self
    {
        $this->initialized['line2'] = true;
        $this->line2 = $line2;

        return $this;
    }

    /**
     * The third line of the MRZ.
     */
    public function getLine3(): ?string
    {
        return $this->line3;
    }

    /**
     * The third line of the MRZ.
     */
    public function setLine3(?string $line3): self
    {
        $this->initialized['line3'] = true;
        $this->line3 = $line3;

        return $this;
    }
}
