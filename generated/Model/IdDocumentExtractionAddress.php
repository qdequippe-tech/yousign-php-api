<?php

namespace Qdequippe\Yousign\Api\Model;

class IdDocumentExtractionAddress
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
     * The full address extracted from the document.
     *
     * @var string|null
     */
    protected $fullAddress;
    /**
     * Whether the address was detected as handwritten on the document.
     *
     * @var bool|null
     */
    protected $handwritten;

    /**
     * The full address extracted from the document.
     */
    public function getFullAddress(): ?string
    {
        return $this->fullAddress;
    }

    /**
     * The full address extracted from the document.
     */
    public function setFullAddress(?string $fullAddress): self
    {
        $this->initialized['fullAddress'] = true;
        $this->fullAddress = $fullAddress;

        return $this;
    }

    /**
     * Whether the address was detected as handwritten on the document.
     */
    public function getHandwritten(): ?bool
    {
        return $this->handwritten;
    }

    /**
     * Whether the address was detected as handwritten on the document.
     */
    public function setHandwritten(?bool $handwritten): self
    {
        $this->initialized['handwritten'] = true;
        $this->handwritten = $handwritten;

        return $this;
    }
}
