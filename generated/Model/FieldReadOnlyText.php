<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class FieldReadOnlyText implements AdditionalPropertiesInterface
{
    use AdditionalAndPatternProperties;
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
    protected $id;
    /**
     * @var string|null
     */
    protected $documentId;
    /**
     * @var string|null
     */
    protected $type;
    /**
     * The height must be calculated using the formula: "height = number_of_lines \* font_size \* line_height", where the line height is always set to 1.5.
     *
     * @var int|null
     */
    protected $height;
    /**
     * If not set, the width is automatically calculated with the max_length value.
     *
     * @var int|null
     */
    protected $width;
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
     * This property holds the content displayed in the read-only text field.
     *
     * @var string|null
     */
    protected $text;
    /**
     * @var Font|null
     */
    protected $font;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->initialized['id'] = true;
        $this->id = $id;

        return $this;
    }

    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * The height must be calculated using the formula: "height = number_of_lines \* font_size \* line_height", where the line height is always set to 1.5.
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * The height must be calculated using the formula: "height = number_of_lines \* font_size \* line_height", where the line height is always set to 1.5.
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    /**
     * If not set, the width is automatically calculated with the max_length value.
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * If not set, the width is automatically calculated with the max_length value.
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;

        return $this;
    }

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
     * This property holds the content displayed in the read-only text field.
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * This property holds the content displayed in the read-only text field.
     */
    public function setText(?string $text): self
    {
        $this->initialized['text'] = true;
        $this->text = $text;

        return $this;
    }

    public function getFont(): ?Font
    {
        return $this->font;
    }

    public function setFont(?Font $font): self
    {
        $this->initialized['font'] = true;
        $this->font = $font;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['id' => ['id', 'getId', 'setId'], 'documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'height' => ['height', 'getHeight', 'setHeight'], 'width' => ['width', 'getWidth', 'setWidth'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'text' => ['text', 'getText', 'setText'], 'font' => ['font', 'getFont', 'setFont']];
    }
}
