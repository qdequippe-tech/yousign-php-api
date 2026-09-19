<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Mention2 implements AdditionalPropertiesInterface
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
     * Identifier of the Document the mention Field is placed on.
     *
     * @var string|null
     */
    protected $documentId;
    /**
     * Field type discriminator.
     *
     * @var string|null
     */
    protected $type;
    /**
     * Page number where the Field is placed.
     *
     * @var int|null
     */
    protected $page;
    /**
     * Horizontal position (points from left).
     *
     * @var int|null
     */
    protected $x;
    /**
     * Vertical position (points from top).
     *
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
     * Text of the mention displayed on the Document.
     *
     * @var string|null
     */
    protected $mention;
    /**
     * Name of the Field.
     *
     * @var string|null
     */
    protected $name;

    /**
     * Identifier of the Document the mention Field is placed on.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Identifier of the Document the mention Field is placed on.
     */
    public function setDocumentId(?string $documentId): self
    {
        $this->initialized['documentId'] = true;
        $this->documentId = $documentId;

        return $this;
    }

    /**
     * Field type discriminator.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Field type discriminator.
     */
    public function setType(?string $type): self
    {
        $this->initialized['type'] = true;
        $this->type = $type;

        return $this;
    }

    /**
     * Page number where the Field is placed.
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * Page number where the Field is placed.
     */
    public function setPage(?int $page): self
    {
        $this->initialized['page'] = true;
        $this->page = $page;

        return $this;
    }

    /**
     * Horizontal position (points from left).
     */
    public function getX(): ?int
    {
        return $this->x;
    }

    /**
     * Horizontal position (points from left).
     */
    public function setX(?int $x): self
    {
        $this->initialized['x'] = true;
        $this->x = $x;

        return $this;
    }

    /**
     * Vertical position (points from top).
     */
    public function getY(): ?int
    {
        return $this->y;
    }

    /**
     * Vertical position (points from top).
     */
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

    /**
     * Text of the mention displayed on the Document.
     */
    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * Text of the mention displayed on the Document.
     */
    public function setMention(?string $mention): self
    {
        $this->initialized['mention'] = true;
        $this->mention = $mention;

        return $this;
    }

    /**
     * Name of the Field.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the Field.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'width' => ['width', 'getWidth', 'setWidth'], 'height' => ['height', 'getHeight', 'setHeight'], 'mention' => ['mention', 'getMention', 'setMention'], 'name' => ['name', 'getName', 'setName']];
    }
}
