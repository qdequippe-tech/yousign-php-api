<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Text1 implements AdditionalPropertiesInterface
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
    protected $signerId;
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
     * @var int|null
     */
    protected $maxLength;
    /**
     * If you don't want any question, you can give an empty string.
     *
     * @var string|null
     */
    protected $question;
    /**
     * @var string|null
     */
    protected $instruction;
    /**
     * @var bool|null
     */
    protected $optional = false;
    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set the font will not be changed, and if set to null the default font will be used.
     *
     * @var UpdateFieldFont|null
     */
    protected $font;
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

    public function getSignerId(): ?string
    {
        return $this->signerId;
    }

    public function setSignerId(?string $signerId): self
    {
        $this->initialized['signerId'] = true;
        $this->signerId = $signerId;

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

    public function getMaxLength(): ?int
    {
        return $this->maxLength;
    }

    public function setMaxLength(?int $maxLength): self
    {
        $this->initialized['maxLength'] = true;
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * If you don't want any question, you can give an empty string.
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * If you don't want any question, you can give an empty string.
     */
    public function setQuestion(?string $question): self
    {
        $this->initialized['question'] = true;
        $this->question = $question;

        return $this;
    }

    public function getInstruction(): ?string
    {
        return $this->instruction;
    }

    public function setInstruction(?string $instruction): self
    {
        $this->initialized['instruction'] = true;
        $this->instruction = $instruction;

        return $this;
    }

    public function getOptional(): ?bool
    {
        return $this->optional;
    }

    public function setOptional(?bool $optional): self
    {
        $this->initialized['optional'] = true;
        $this->optional = $optional;

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
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'width' => ['width', 'getWidth', 'setWidth'], 'height' => ['height', 'getHeight', 'setHeight'], 'maxLength' => ['max_length', 'getMaxLength', 'setMaxLength'], 'question' => ['question', 'getQuestion', 'setQuestion'], 'instruction' => ['instruction', 'getInstruction', 'setInstruction'], 'optional' => ['optional', 'getOptional', 'setOptional'], 'font' => ['font', 'getFont', 'setFont'], 'name' => ['name', 'getName', 'setName'], 'defaultValue' => ['default_value', 'getDefaultValue', 'setDefaultValue'], 'readOnly' => ['read_only', 'getReadOnly', 'setReadOnly']];
    }
}
