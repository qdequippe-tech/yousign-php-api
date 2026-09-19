<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class Mention implements AdditionalPropertiesInterface
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
     * @var string|null
     */
    protected $type;
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
     * The height must be calculated using the formula: "height = number_of_lines \* font_size \* line_height", where the line height is always set to 1.5.
     *
     * @var int|null
     */
    protected $height;
    /**
     * Content of the Mention.\
     * You can use dynamic tags when creating the Mention:\
     * • `%date%` will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")\
     * • `%datetime%` will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0")\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email.
     *
     * @var string|null
     */
    protected $mention;
    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set or null, the default font will be used.
     *
     * @var CreateFieldFont|null
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
     * Content of the Mention.\
     * You can use dynamic tags when creating the Mention:\
     * • `%date%` will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")\
     * • `%datetime%` will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0")\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email.
     */
    public function getMention(): ?string
    {
        return $this->mention;
    }

    /**
     * Content of the Mention.\
     * You can use dynamic tags when creating the Mention:\
     * • `%date%` will display the current date when the Signer sign the Signature Request (eg. "24-03-2025")\
     * • `%datetime%` will display the current date and time when the Signer signs the Signature Request (eg. "24-03-2025 10:30 UTC+0")\
     * This property is a [Safe String](https://developers.youtrust.com/reference/oas-specification#safe-string) allowing email.
     */
    public function setMention(?string $mention): self
    {
        $this->initialized['mention'] = true;
        $this->mention = $mention;

        return $this;
    }

    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set or null, the default font will be used.
     */
    public function getFont(): ?CreateFieldFont
    {
        return $this->font;
    }

    /**
     * If set, **width** and **height** properties become required. Otherwise, if not set or null, the default font will be used.
     */
    public function setFont(?CreateFieldFont $font): self
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
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'width' => ['width', 'getWidth', 'setWidth'], 'height' => ['height', 'getHeight', 'setHeight'], 'mention' => ['mention', 'getMention', 'setMention'], 'font' => ['font', 'getFont', 'setFont'], 'name' => ['name', 'getName', 'setName']];
    }
}
