<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Checkbox2 implements AdditionalPropertiesInterface
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
     * Identifier of the Document the checkbox Field is placed on.
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
     * The omission of size parameter is considered as deprecated. The size determines both the width and height of the checkbox.
     *
     * @var int|null
     */
    protected $size;
    /**
     * Whether ticking this checkbox is optional.
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Name of the checkbox Field.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Current checked state of the checkbox.
     *
     * @var bool|null
     */
    protected $checked;
    /**
     * Whether the checkbox is initially checked.
     *
     * @var bool|null
     */
    protected $defaultChecked;
    /**
     * If set to `true`, the checkbox cannot be modified by the signer.
     *
     * @var bool|null
     */
    protected $readOnly = false;

    /**
     * Identifier of the Document the checkbox Field is placed on.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Identifier of the Document the checkbox Field is placed on.
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
     * The omission of size parameter is considered as deprecated. The size determines both the width and height of the checkbox.
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * The omission of size parameter is considered as deprecated. The size determines both the width and height of the checkbox.
     */
    public function setSize(?int $size): self
    {
        $this->initialized['size'] = true;
        $this->size = $size;

        return $this;
    }

    /**
     * Whether ticking this checkbox is optional.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Whether ticking this checkbox is optional.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

        return $this;
    }

    /**
     * Name of the checkbox Field.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Name of the checkbox Field.
     */
    public function setName(?string $name): self
    {
        $this->initialized['name'] = true;
        $this->name = $name;

        return $this;
    }

    /**
     * Current checked state of the checkbox.
     */
    public function getChecked(): ?bool
    {
        return $this->checked;
    }

    /**
     * Current checked state of the checkbox.
     */
    public function setChecked(?bool $checked): self
    {
        $this->initialized['checked'] = true;
        $this->checked = $checked;

        return $this;
    }

    /**
     * Whether the checkbox is initially checked.
     */
    public function getDefaultChecked(): ?bool
    {
        return $this->defaultChecked;
    }

    /**
     * Whether the checkbox is initially checked.
     */
    public function setDefaultChecked(?bool $defaultChecked): self
    {
        $this->initialized['defaultChecked'] = true;
        $this->defaultChecked = $defaultChecked;

        return $this;
    }

    /**
     * If set to `true`, the checkbox cannot be modified by the signer.
     */
    public function getReadOnly(): ?bool
    {
        return $this->readOnly;
    }

    /**
     * If set to `true`, the checkbox cannot be modified by the signer.
     */
    public function setReadOnly(?bool $readOnly): self
    {
        $this->initialized['readOnly'] = true;
        $this->readOnly = $readOnly;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'size' => ['size', 'getSize', 'setSize'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'name' => ['name', 'getName', 'setName'], 'checked' => ['checked', 'getChecked', 'setChecked'], 'defaultChecked' => ['default_checked', 'getDefaultChecked', 'setDefaultChecked'], 'readOnly' => ['read_only', 'getReadOnly', 'setReadOnly']];
    }
}
