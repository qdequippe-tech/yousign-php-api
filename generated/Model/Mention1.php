<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Mention1 implements AdditionalPropertiesInterface
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
     * If not set, the width is automatically calculated with the read only text length.
     *
     * @var int|null
     */
    protected $width;
    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the read only text.
     *
     * @var int|null
     */
    protected $height;
    /**
     * Content of the Mention.
     * You can use dynamic tags when creating the Mention:
     * • %date% will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")
     * • %datetime% will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0").
     *
     * @var string|null
     */
    protected $mention;
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
     * If not set, the width is automatically calculated with the read only text length.
     */
    public function getWidth(): ?int
    {
        return $this->width;
    }

    /**
     * If not set, the width is automatically calculated with the read only text length.
     */
    public function setWidth(?int $width): self
    {
        $this->initialized['width'] = true;
        $this->width = $width;

        return $this;
    }

    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the read only text.
     */
    public function getHeight(): ?int
    {
        return $this->height;
    }

    /**
     * The height must be 24 or a multiple of 15 greater than 24. If height is not provided, it will be calculated depending on the number of newlines in the read only text.
     */
    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    /**
     * Content of the Mention.
     * You can use dynamic tags when creating the Mention:
     * • %date% will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")
     * • %datetime% will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0").
     */
    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * Content of the Mention.
     * You can use dynamic tags when creating the Mention:
     * • %date% will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")
     * • %datetime% will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0").
     */
    public function setMention(?string $mention): self
    {
        $this->initialized['mention'] = true;
        $this->mention = $mention;

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

    public function definedProperties(): array
    {
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'width' => ['width', 'getWidth', 'setWidth'], 'height' => ['height', 'getHeight', 'setHeight'], 'mention' => ['mention', 'getMention', 'setMention'], 'font' => ['font', 'getFont', 'setFont'], 'name' => ['name', 'getName', 'setName']];
    }
}
