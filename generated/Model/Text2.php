<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Text2 implements AdditionalPropertiesInterface
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
     * Identifier of the Document the text Field is placed on.
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
     * If not set, the width is automatically calculated with the max_length value.
     *
     * @var int|null
     */
    protected $width;
    /**
     * The height must be 24 or a multiple of 15 greater than 24.
     *
     * @var int|null
     */
    protected $height;
    /**
     * Maximum number of characters the Signer can enter.
     *
     * @var int|null
     */
    protected $maxLength;
    /**
     * Question/label shown to the Signer for this text Field.
     *
     * @var string|null
     */
    protected $question;
    /**
     * Additional instruction shown to the Signer.
     *
     * @var string|null
     */
    protected $instruction;
    /**
     * Whether filling this Field is optional.
     *
     * @var bool|null
     */
    protected $optional;
    /**
     * Name of the Field.
     *
     * @var string|null
     */
    protected $name;
    /**
     * If a default value is provided, the Field will be pre-filled with this value. The Signer can modify it before signing unless the Field is set to `read-only`.
     *
     * @var string|null
     */
    protected $defaultValue;
    /**
     * If set to `true`, the Signer cannot modify the Field and the default value (if provided) will remain unchanged.
     *
     * @var bool|null
     */
    protected $readOnly = false;

    /**
     * Identifier of the Document the text Field is placed on.
     */
    public function getDocumentId(): ?string
    {
        return $this->documentId;
    }

    /**
     * Identifier of the Document the text Field is placed on.
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

    /**
     * The height must be 24 or a multiple of 15 greater than 24.
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * The height must be 24 or a multiple of 15 greater than 24.
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    /**
     * Maximum number of characters the Signer can enter.
     */
    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }

    /**
     * Maximum number of characters the Signer can enter.
     */
    public function setMaxLength(?int $maxLength): self
    {
        $this->initialized['maxLength'] = true;
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * Question/label shown to the Signer for this text Field.
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * Question/label shown to the Signer for this text Field.
     */
    public function setQuestion(?string $question): self
    {
        $this->initialized['question'] = true;
        $this->question = $question;

        return $this;
    }

    /**
     * Additional instruction shown to the Signer.
     */
    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    /**
     * Additional instruction shown to the Signer.
     */
    public function setInstruction(?string $instruction): self
    {
        $this->initialized['instruction'] = true;
        $this->instruction = $instruction;

        return $this;
    }

    /**
     * Whether filling this Field is optional.
     */
    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    /**
     * Whether filling this Field is optional.
     */
    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

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

    /**
     * If a default value is provided, the Field will be pre-filled with this value. The Signer can modify it before signing unless the Field is set to `read-only`.
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    /**
     * If a default value is provided, the Field will be pre-filled with this value. The Signer can modify it before signing unless the Field is set to `read-only`.
     */
    public function setDefaultValue(?string $defaultValue): self
    {
        $this->initialized['defaultValue'] = true;
        $this->defaultValue = $defaultValue;

        return $this;
    }

    /**
     * If set to `true`, the Signer cannot modify the Field and the default value (if provided) will remain unchanged.
     */
    public function getReadOnly(): ?bool
    {
        return $this->readOnly;
    }

    /**
     * If set to `true`, the Signer cannot modify the Field and the default value (if provided) will remain unchanged.
     */
    public function setReadOnly(?bool $readOnly): self
    {
        $this->initialized['readOnly'] = true;
        $this->readOnly = $readOnly;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['documentId' => ['document_id', 'getDocumentId', 'setDocumentId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'width' => ['width', 'getWidth', 'setWidth'], 'height' => ['height', 'getHeight', 'setHeight'], 'maxLength' => ['max_length', 'getMaxLength', 'setMaxLength'], 'question' => ['question', 'getQuestion', 'setQuestion'], 'instruction' => ['instruction', 'getInstruction', 'setInstruction'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'name' => ['name', 'getName', 'setName'], 'defaultValue' => ['default_value', 'getDefaultValue', 'setDefaultValue'], 'readOnly' => ['read_only', 'getReadOnly', 'setReadOnly']];
    }
}
