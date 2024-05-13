<?php

namespace Qdequippe\Yousign\Api\Model;

class ReadOnlyText1 extends \ArrayObject
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
     * @var int|null
     */
    protected $page;
    /**
     * @var int|null
     */
    protected $x;
    /**
     * @var int|null
     */
    protected $y;
    /**
     * If not set, the width is automatically calculated with the mention length.
     *
     * @var int|null
     */
    protected $width;
    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the mention.
     *
     * @var int|null
     */
    protected $height;
    /**
     * @var string|null
     */
    protected $text;
    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set the font will not be changed, and if set to null the default font will be used.
     *
     * @var UpdateFieldFont|null
     */
    protected $font;

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

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
     * If not set, the width is automatically calculated with the mention length.
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * If not set, the width is automatically calculated with the mention length.
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;

        return $this;
    }

    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the mention.
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the mention.
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }

    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set the font will not be changed, and if set to null the default font will be used.
     */
    public function getFont(): ?UpdateFieldFont
    {
        return $this->font;
    }

    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set the font will not be changed, and if set to null the default font will be used.
     */
    public function setFont(?UpdateFieldFont $font): self
    {
        $this->initialized['font'] = true;
        $this->font = $font;

        return $this;
    }
}
