<?php

namespace Qdequippe\Yousign\Api\Model;

class InitialsArea extends \ArrayObject
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
     * Initials alignment on the document.
     *
     * @var string|null
     */
    protected $alignment;
    /**
     * y-axis position on the document.
     *
     * @var int|null
     */
    protected $y;

    /**
     * Initials alignment on the document.
     */
    public function getAlignment(): ?string
    {
        return $this->alignment;
    }

    /**
     * Initials alignment on the document.
     */
    public function setAlignment(?string $alignment): self
    {
        $this->initialized['alignment'] = true;
        $this->alignment = $alignment;

        return $this;
    }

    /**
     * y-axis position on the document.
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * y-axis position on the document.
     */
    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

        return $this;
    }
}
