<?php

namespace Qdequippe\Yousign\Api\Model;

class UpdateFieldFont extends \ArrayObject
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
     * @var string|null
     */
    protected $family;
    /**
     * @var string|null
     */
    protected $color = '#000000';
    /**
     * @var int|null
     */
    protected $size = 12;
    /**
     * @var FontVariants|null
     */
    protected $variants;

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(?string $family): self
    {
        $this->initialized['family'] = true;
        $this->family = $family;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->initialized['color'] = true;
        $this->color = $color;

        return $this;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    public function getVariants(): ?FontVariants
    {
        return $this->variants;
    }

    public function setVariants(?FontVariants $variants): self
    {
        $this->initialized['variants'] = true;
        $this->variants = $variants;

        return $this;
    }
}
