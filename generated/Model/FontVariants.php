<?php

namespace Qdequippe\Yousign\Api\Model;

class FontVariants extends \ArrayObject
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
     * @var bool|null
     */
    protected $italic = false;
    /**
     * @var bool|null
     */
    protected $bold = false;

    public function getItalic(): ?bool
    {
        return $this->italic;
    }

    public function setItalic(?bool $italic): self
    {
        $this->initialized['italic'] = true;
        $this->italic = $italic;

        return $this;
    }

    public function getBold(): ?bool
    {
        return $this->bold;
    }

    public function setBold(?bool $bold): self
    {
        $this->initialized['bold'] = true;
        $this->bold = $bold;

        return $this;
    }
}
