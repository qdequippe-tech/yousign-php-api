<?php

namespace Qdequippe\Yousign\Api\Model;

class FieldRadioButtonGroupRadiosInner extends \ArrayObject
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
     * The size determines both the width and height of the radio button.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Signer has checked the radio button.
     *
     * @var bool|null
     */
    protected $checked;

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

    /**
     * The size determines both the width and height of the radio button.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * The size determines both the width and height of the radio button.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Signer has checked the radio button.
     */
    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    /**
     * Signer has checked the radio button.
     */
    public function setChecked(?bool $checked): self
    {
        $this->initialized['checked'] = true;
        $this->checked = $checked;

        return $this;
    }
}
