<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class SignerName implements AdditionalPropertiesInterface
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
    /**
     * Format used to display the signer's name.
     *
     * @var string|null
     */
    protected $nameFormat = 'full_name';

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

    /**
     * Format used to display the signer's name.
     */
    public function getNameFormat(): ?string
    {
        return $this->nameFormat;
    }

    /**
     * Format used to display the signer's name.
     */
    public function setNameFormat(?string $nameFormat): self
    {
        $this->initialized['nameFormat'] = true;
        $this->nameFormat = $nameFormat;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['signerId' => ['signer_id', 'getSignerId', 'setSignerId'], 'type' => ['type', 'getType', 'setType'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'font' => ['font', 'getFont', 'setFont'], 'name' => ['name', 'getName', 'setName'], 'nameFormat' => ['name_format', 'getNameFormat', 'setNameFormat']];
    }
}
