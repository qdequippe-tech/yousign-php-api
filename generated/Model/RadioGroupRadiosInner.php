<?php

namespace Qdequippe\Yousign\Api\Model;

class RadioGroupRadiosInner extends \ArrayObject
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
     * Radio button's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * @var int|null
     */
    protected $x;
    /**
     * @var int|null
     */
    protected $y;
    /**
     * @var int|null
     */
    protected $size = 24;

    /**
     * Radio button's name.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Radio button's name.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(?int $x): self
    {
        $this->initialized['x'] = true;
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(?int $y): self
    {
        $this->initialized['y'] = true;
        $this->y = $y;

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
}
