<?php

namespace Qdequippe\Yousign\Api\Model;

use Qdequippe\Yousign\Api\Runtime\AdditionalAndPatternProperties;
use Qdequippe\Yousign\Api\Runtime\AdditionalPropertiesInterface;

class CreateElectronicSealFieldSealPayload implements AdditionalPropertiesInterface
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
    protected $type;
    /**
     * @var int|null
     */
    protected $height;
    /**
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
     * @var string|null
     */
    protected $reason;
    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @var list<CreateElectronicSealFieldSealPayloadCaptionsInner>|null
     */
    protected $captions;

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

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->initialized['height'] = true;
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?int
    {
        return $this->width;
    }

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

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): self
    {
        $this->initialized['reason'] = true;
        $this->reason = $reason;

        return $this;
    }

    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @return list<CreateElectronicSealFieldSealPayloadCaptionsInner>|null
     */
    public function getCaptions(): ?array
    {
        return $this->captions;
    }

    /**
     * Optional captions to display on the seal image. Limited to one caption per field.
     *
     * @param list<CreateElectronicSealFieldSealPayloadCaptionsInner>|null $captions
     */
    public function setCaptions(?array $captions): self
    {
        $this->initialized['captions'] = true;
        $this->captions = $captions;

        return $this;
    }

    public function definedProperties(): array
    {
        return ['type' => ['type', 'getType', 'setType'], 'height' => ['height', 'getHeight', 'setHeight'], 'width' => ['width', 'getWidth', 'setWidth'], 'page' => ['page', 'getPage', 'setPage'], 'x' => ['x', 'getX', 'setX'], 'y' => ['y', 'getY', 'setY'], 'reason' => ['reason', 'getReason', 'setReason'], 'captions' => ['captions', 'getCaptions', 'setCaptions']];
    }
}
